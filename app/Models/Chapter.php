<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    // Specify the primary key if it's not 'id'
    protected $fillable = [
        'name',
        'subject',
        'time_to_complete',
        'file_upload',
        'description',
    ];
}