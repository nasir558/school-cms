<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function StudentClassView()
    {
        $data['allData'] = StudentClass::all();
        return view('backend.setup.student_class.view_class', $data);
    }

    public function StudentClassAdd()
    {
        return view('backend.setup.student_class.class_add');
    }

    public function StudentClassStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:student_classes,name|max:300'
        ]);

        $data = new StudentClass();

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Class Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.class.view')->with($notification);
    }

    public function StudentClassEdit($id)
    {
        $editData = StudentClass::find($id);
        return view('backend.setup.student_class.class_edit', compact('editData'));
    }

    public function StudentClassUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:student_classes,name|max:300'
        ]);

        $data = StudentClass::find($id);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Class Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('student.class.view')->with($notification);
    }

    public function StudentClassDelete($id)
    {
        $user = StudentClass::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Class Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->route('student.class.view')->with($notification);
    }
}
