<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamsStudents extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'exam_id', 'student_degree'];
}
