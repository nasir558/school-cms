<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function FeeCategoryView()
    {
        $allData = FeeCategory::all();
        return view('backend.setup.fee_category.view_fee_category', compact('allData'));
    }

    public function FeeCategoryAdd()
    {
        return view('backend.setup.fee_category.fee_category_add');
    }

    public function FeeCategoryStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:fee_categories,name|max:300'
        ]);

        $data = new FeeCategory();

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Fee Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('feeCategory.view')->with($notification);
    }

    public function FeeCategoryEdit($id)
    {
        $editData = FeeCategory::find($id);
        return view('backend.setup.fee_category.fee_category_edit', compact('editData'));
    }

    public function FeeCategoryUpdate(Request $request, $id)
    {
        $data = FeeCategory::find($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:fee_categories,name,'.$data->id.'|max:300'
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Fee Category Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('feeCategory.view')->with($notification);
    }

    public function FeeCategoryDelete($id)
    {
        $user = FeeCategory::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Fee Category Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->route('feeCategory.view')->with($notification);
    }
}
