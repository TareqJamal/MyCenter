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

    public function attendace()
    {
        return $this->hasOne(Attendance::class, 'student_id')->whereDate('created_at', date('Y-m-d'));
    }

    public function moneyStatus()
    {
        return $this->hasOne(Money::class, 'student_id')->whereMonth('created_at', '=', now()->month);
    }

    public function getCountAttendance()
    {
        return $this->hasMany(Attendance::class, 'student_id')->where('status', '=', 0);
    }

    public function getCountAttendanceMonthly()
    {
        return $this->hasMany(Attendance::class, 'student_id')->where('status', '=', 0)->whereMonth('created_at', '=', now()->month);
    }


}
