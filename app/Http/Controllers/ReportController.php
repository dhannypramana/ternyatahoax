<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Support\Str;
use App\Models\CategoryHoax;
use Illuminate\Http\Request;
use App\Helpers\SlugFormatter;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user() == null) {
            return redirect('/login')->with('info', 'Silahkan lakukan login terlebih dahulu');
        }

        if (auth()->user()->email_verified_at == null) {
            return redirect('/email/verify')->with('info', 'Silahkan lakukan verifikasi email terlebih dahulu');
        }

        return view('user.lapor', [
            'active' => 'home',
        ]);
    }

    public function store(Request $request)
    {
        if (auth()->user() == null) {
            return redirect('/login')->with('info', 'Silahkan lakukan login terlebih dahulu');
        }

        if (auth()->user()->email_verified_at == null) {
            return redirect('/email/verify')->with('info', 'Silahkan lakukan verifikasi email terlebih dahulu');
        }

        $user_id = auth()->user()->id;
        $slug = Str::slug($request->title);
        $excerpt = SlugFormatter::generateExcerpt($request->body);

        $request->validate([
            'title' => 'required|min:5',
            'body' => 'required|min:5',
            'link' => 'required|min:5',
            'image' => 'file|image|mimes:jpg,jpeg,png|unique:reports',
        ]);

        $imgName = "";

        if ($request->has('image')) {
            $extension      = $request->file('image')->extension();
            $imgName        = time() . date('dmyHis') . rand() . '.' . $extension;

            Storage::putFileAs('images', $request->file('image'), $imgName);
        }

        Report::create([
            'title' => $request->title,
            'body' => $request->body,
            'link' => $request->link,
            'slug' => $slug,
            'image' => $imgName,
            'user_id' => $user_id,
            'excerpt' => $excerpt,
        ]);

        $request->session()->flash('successAdd', 'Terima kasih atas feedback kamu, laporan kamu akan segera di review');
        return redirect('/activity-log/' . auth()->user()->username);
    }

    public function unreviewed()
    {
        return view('admin.unreviewed', [
            'active' => 'unreviewed',
            'reports' => Report::where('isReviewed', 0)->latest()->paginate(5)
        ]);
    }

    public function detailUnreviewed(Report $report)
    {
        return view('admin.detail-unreviewed', [
            'active' => 'unreviewed',
            'report' => $report
        ]);
    }

    public function deleteUnreviewedReport(Report $report)
    {
        $report->delete();
        Storage::delete(asset('/storage/images/' . $report->image)); //Delete not working
        return back()->with('success', 'Sukses hapus data laporan yang belum di review');
    }

    public function reviewed()
    {
        return view('admin.reviewed', [
            'active' => 'reviewed',
            'reports' => Report::where('isReviewed', 1)->latest()->paginate(5)
        ]);
    }

    public function setReviewHoax(Report $report, Request $request)
    {
        $report->update([
            'isReviewed' => 1,
            'status_report' => 0,
            'categoryhoax_id' => $request->category
        ]);

        return redirect('/admin/dashboard/unreviewed')->with('success', 'Sukses mereview laporan silahkan cek di bagian reviewed reports');
    }

    public function setCategoryHoax(Report $report)
    {
        return view('admin.set-category', [
            'active' => 'unreviewed',
            'report' => $report
        ]);
    }

    public function setReviewFact(Report $report)
    {
        $report->update([
            'isReviewed' => 1,
            'status_report' => 1
        ]);

        return redirect('/admin/dashboard/unreviewed')->with('success', 'Sukses mereview laporan silahkan cek di bagian reviewed reports');
    }

    public function detailReviewed(Report $report)
    {
        return view('admin.detail-reviewed', [
            'active' => 'reviewed',
            'report' => $report
        ]);
    }

    public function category()
    {
        return view('admin.category', [
            'active' => 'category',
            'categories' => CategoryHoax::get()
        ]);
    }
}
