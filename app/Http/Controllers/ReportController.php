<?php

namespace App\Http\Controllers;

use App\Models\Report;
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
        return view('user.lapor', [
            'active' => 'null'
        ]);
    }

    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $slug = SlugFormatter::generateSlug($request->title);
        
        
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'link' => 'required',
            'image' => 'file|image|mimes:jpg,jpeg,png',
        ]);

        if($request->has('image')){
            $extension      = $request->file('image')->extension();
            $imgName        = time() . date('dmyHis') . rand() . '.' . $extension;

            Storage::putFileAs('images', $request->file('image'), $imgName);
        }
        
        Report::create([
            'title' => $request->title,
            'body' => $request->body,
            'link' => $request->link,
            'slug' => $slug,
            'user_id' => $user_id,
            'image' => $imgName,
        ]);

        $request->session()->flash('successAdd', 'Sukses lapor');
        return redirect('/lapor');
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

    public function setReviewHoax(Report $report)
    {
        $report->update([
            'isReviewed' => 1,
            'status_report' => 0
        ]);

        return redirect('/admin/dashboard/unreviewed')->with('success', 'Sukses mereview laporan silahkan cek di bagian reviewed reports');
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

}
