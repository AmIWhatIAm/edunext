<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    // refer to schema enum
    public static function subjects()
    {
        return [
            'Mathematics',
            'Physics',
            'Chemistry',
            'Biology',
            'History',
            'Geography',
            'Literature',
            'Economics',
        ];
    }

    // Specify the primary key if it's not 'id'
    protected $fillable = [
        'lecturer_id',
        'name',
        'subject',
        'time_to_complete',
        'file_upload',
        'description',
    ];
}