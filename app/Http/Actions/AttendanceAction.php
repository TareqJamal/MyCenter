<?php

namespace App\Http\Actions;

use App\Models\Attendance;
use App\Models\Student;

class AttendanceAction extends MainAction
{
    public function __construct()
    {
        $this->model = new Attendance();
    }


}
