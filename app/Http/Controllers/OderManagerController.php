<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryModel;
use App\BrandModel;
use App\ProductModel;
use App\DetailOderModel;
use App\CustomerModel;
use App\OderModel;
use App\StatusModel;
use Session;

class OderManagerController extends Controller
{
    //Quan ly khach hang
    public function allCustomer()
    {
        $allCustomer = CustomerModel::all();
        return view('admin.oder.customer', ['all_customer' => $allCustomer]);
    }

    public function viewCustomer($id_customer)
    {
        $detailCustomer = CustomerModel::find($id_customer);
        return view('admin.oder.view_customer', ['detailCustomer' => $detailCustomer]);
    }


    //Quan ly don hang
    public function viewOder()
    {
        $allOder = OderModel::all();
        $statusAll = StatusModel::all();
        return view('admin.oder.oder', ['all_oder' => $allOder,'statusAll'=>$statusAll]);
    }

    public function updateStatusOder(Request $request, $id_oder)
    {
        OderModel::where("id", $id_oder)->update(['status'=>$request->oder_status]);
        return redirect('admin/view-oder');
    }

    public function viewDetailOder($id_oder)
    {
        $oder = OderModel::find($id_oder);
        $detailOder = DetailOderModel::where("oder_id", $id_oder)->get();
        $statusAll = StatusModel::all();
        return view('admin.oder.detail_oder', [
            'oder' => $oder,
            'detailOder'=>$detailOder,
            'statusAll'=>$statusAll
        ]);
    }

}
