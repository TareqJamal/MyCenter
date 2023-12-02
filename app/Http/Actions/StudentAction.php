<?php

namespace App\Http\Actions;

use App\Models\Student;
use App\Models\StudentSessions;

class StudentAction extends MainAction
{
    public function __construct()
    {
        $this->model = new Student();
    }

    public function storeStudent($data, $sessionsIDS)
    {
        $student = $this->store($data);
        foreach ($sessionsIDS as $sessionID) {
            StudentSessions::create([
                'student_id' => $student->id,
                'session_id' => $sessionID
            ]);
        }
    }
    public function updateStudent($id , $data , $sessionsIDS)
    {
        $this->find($id)->update($data);
        StudentSessions::where('student_id',$id)->delete();
        foreach ($sessionsIDS as $sessionID) {
            StudentSessions::create([
                'student_id' => $id,
                'session_id' => $sessionID
            ]);
        }
    }

    public function getSessions($id)
    {
        $student = $this->find($id);
        return $student->sessions->pluck('id')->ToArray();
    }


}
