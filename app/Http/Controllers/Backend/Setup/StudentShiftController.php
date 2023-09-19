<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function StudentShiftView()
    {
        $allData = StudentShift::all();
        return view('backend.setup.student_shift.view_shift', compact('allData'));
    }

    public function StudentShiftAdd()
    {
        return view('backend.setup.student_shift.shift_add');
    }

    public function StudentShiftStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:student_shifts,name|max:300'
        ]);

        $data = new StudentShift();

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Shift Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.shift.view')->with($notification);
    }

    public function StudentShiftEdit($id)
    {
        $editData = StudentShift::find($id);
        return view('backend.setup.student_shift.shift_edit', compact('editData'));
    }

    public function StudentShiftUpdate(Request $request, $id)
    {
        $data = StudentShift::find($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:student_shifts,name,'.$data->id.'|max:300'
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Shift Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('student.shift.view')->with($notification);
    }

    public function StudentShiftDelete($id)
    {
        $user = StudentShift::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Shift Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->route('student.shift.view')->with($notification);
    }
}
