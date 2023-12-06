<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Session;
use App\Models\SessionDays;
use App\Models\Student;
use App\Models\StudentSessions;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AttendanceController extends Controller
{
    public string $folderPath = "Admin.attendance.";

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessionsIDS = SessionDays::where('day', date('l'))->pluck('session_id')->ToArray();
        $sessions = Session::whereIn('id', $sessionsIDS)->get();
        return view('Admin.attendance.index', compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (\request()->ajax()) {
            $studentsIDs = StudentSessions::query()->where('session_id', $id)->pluck('student_id')->ToArray();
            $students = Student::query()->whereIn('id',$studentsIDs)->get();
            return DataTables::of($students)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    return
                        '
                        <div class="row mt-3">
                            <div class="col mb-4">
                                <input name="status[' . $row->id . ']" class="form-check-input"  data-validation="required" required type="radio" value="1"> حضر
                                <input  name="status[' . $row->id . ']" class="form-check-input"   data-validation="required" required type="radio" value="0"> لم يحضر
                            </div>
                                <input type="hidden"  name="students_id[' . $row->id . ']" value="' . $row->id . '">
                        </div>
                         ';
                })
                ->rawColumns(['status'])
                ->toJson();
        } else {
            return view($this->folderPath . 'students', compact('id'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
