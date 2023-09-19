<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function StudentGroupView()
    {
        $allData = StudentGroup::all();
        return view('backend.setup.student_group.view_group', compact('allData'));
    }

    public function StudentGroupAdd()
    {
        return view('backend.setup.student_group.group_add');
    }

    public function StudentGroupStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name|max:300'
        ]);

        $data = new StudentGroup();

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Group Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.group.view')->with($notification);
    }

    public function StudentGroupEdit($id)
    {
        $editData = StudentGroup::find($id);
        return view('backend.setup.student_group.group_edit', compact('editData'));
    }

    public function StudentGroupUpdate(Request $request, $id)
    {
        $data = StudentGroup::find($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name,'.$data->id.'|max:300'
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Group Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('student.group.view')->with($notification);
    }

    public function StudentGroupDelete($id)
    {
        $user = StudentGroup::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Group Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->route('student.group.view')->with($notification);
    }
}
