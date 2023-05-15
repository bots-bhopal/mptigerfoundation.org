<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;

    protected $table = 'downloads';

    protected $fillable = [
        'user_id',
        'original_filename',
        'filename',
        'file_size',
    ];

    public function downloadCategories()
    {
        return $this->belongsToMany('App\Models\DownloadCategory')->withTimestamps();
    }
}
