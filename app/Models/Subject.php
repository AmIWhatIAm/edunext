<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    // Specify table name
    // Specify the table name if it's not pluralized
    protected $table = 'test'; 

    // Specify the primary key if it's not 'id'
    protected $fillable = [
        'name',
        'category',
        'time_to_complete',
        'file_upload',
        'description',
    ];
}
