<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facedes\Redriect;
session_start();
use Illuminate\Support\Facades\Auth;
use App\AdminModel;

class AdminController extends Controller
{
    public function index(){
        return view("admin.dashboard");
    }

    public function login(){
        return view("admin.login");
    }

    public function register(){
        return view("admin.register");
    }

    public function dashboard(Request $request){
        $admin_email =$request->admin_email;
        $admin_password = md5($request->admin_password);
        $result = AdminModel::where("admin_email", $admin_email)->where("admin_password", $admin_password)->first();
        if ($result) {
            Session::put("admin_name", $result -> admin_name);
            Session::put("admin_id", $result -> admin_id);
            return redirect("/admin");
        } else {
            Session::put("message_err", "Bạn đã nhập sai, vui lòng nhập lại");
            return redirect("/login");
        }
    }

    public function logout(){
        Session::put("admin_name", null);
        Session::put("admin_id", null);
        return view("admin.login");
    }
}
