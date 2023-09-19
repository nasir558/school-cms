<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function StudentYearView()
    {
        $allData = StudentYear::all();
        return view('backend.setup.student_year.view_year', compact('allData'));
    }

    public function StudentYearAdd()
    {
        return view('backend.setup.student_year.year_add');
    }

    public function StudentYearStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:student_years,name|numeric|max:3000'
        ]);

        $data = new StudentYear();

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Year Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.year.view')->with($notification);
    }

    public function StudentYearEdit($id)
    {
        $editData = StudentYear::find($id);
        return view('backend.setup.student_year.year_edit', compact('editData'));
    }

    public function StudentYearUpdate(Request $request, $id)
    {
        $data = StudentYear::find($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:student_years,name,'.$data->id.'|numeric|max:3000'
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Year Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('student.year.view')->with($notification);
    }

    public function StudentYearDelete($id)
    {
        $user = StudentYear::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Year Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->route('student.year.view')->with($notification);
    }
}
