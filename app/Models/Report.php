<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Report extends Model
{
    use HasFactory, HasApiTokens;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'body',
        'image',
        'link',
        'slug',
        'isReviewed',
        'status_report',
        'user_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categoryhoax()
    {
        return $this->hasOne(CategoryHoax::class);
    }
}
