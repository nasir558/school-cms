<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use App\Models\FeeCategoryAmount;

class FeeAmountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function FeeCategoryAmountView()
    {
        //$data['allData'] = FeeCategoryAmount::all();
        $data['allData'] = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.fee_category_amount.fee_category_amount_view', $data);
    }

    public function FeeCategoryAmountAdd()
    {
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_category_amount.fee_category_amount_add', $data);
    }

    public function FeeCategoryAmountStore(Request $request)
    {
        $countClass = count($request->class_id);
        if ($countClass != Null) {
            for ($i = 0; $i < $countClass; $i++) {
                $fee_amount = new FeeCategoryAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }
        }
        $notification = array(
            'message' => 'Fee Amount Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('feeAmount.view')->with($notification);
    }

    public function FeeCategoryAmountEdit($fee_category_id)
    {
        $data['editData'] = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_category_amount.fee_category_amount_edit', $data);
    }

    public function FeeCategoryAmountUpdate(Request $request, $fee_category_id)
    {
        if ($request->class_id == NULL) {
            $notification = array(
                'message' => 'Please select any class item',
                'alert-type' => 'error'
            );

            return redirect()->route('feeAmount.edit', $fee_category_id)->with($notification);
        } else {
            $countClass = count($request->class_id);
            FeeCategoryAmount::where('fee_category_id', $fee_category_id)->delete();
            for ($i = 0; $i < $countClass; $i++) {
                $fee_amount = new FeeCategoryAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }
            $notification = array(
                'message' => 'Fee Amount Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('feeAmount.view')->with($notification);
        }
    }

    public function FeeCategoryAmountDetails($fee_category_id)
    {
        $data['detailsData'] = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        return view('backend.setup.fee_category_amount.fee_category_amount_details', $data);
    }
}
