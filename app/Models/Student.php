<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'phone', 'parent_phone', 'address', 'grade_id'];

    public function grades()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function sessions()
    {
        return $this->belongsToMany(Session::class, 'sessions_students');
    }

    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'exams_students');
    }

    public function attedance()
    {
        $this->belongsToMany(Session::class, 'attendance');
    }
}
