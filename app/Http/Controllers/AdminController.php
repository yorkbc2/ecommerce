<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

function checkAdminSession () {

	$sess = session()->get("admin");

	if($sess) {

		if(isset($sess->id) AND isset($sess->login)) {
			return true;
		}
		else {
			return false;
		}
 
	}
	else {
		return false;
	}

}

class AdminController extends Controller
{
    public function view_login () {

    	if(checkAdminSession()) {
    		return redirect("/admin/index");
    	}
    	else {

    		return view("static.admin.login");

    	}

    }

    public function logout () {
    	session()->forget("admin");

    	return redirect("/admin/login");
    }

    public function post_login ( Request $request ) {
    	$login = $request->admin_login;
    	$password = $request->admin_password;

    	$admin = DB::table("admins")
    		->where("login", "=", $login)
    		->first();

    	if($admin) {
    		if(isset($admin->password)) {

    			if(Hash::check($password, $admin->password)) {

    				session()->put("admin", $admin);

    				return redirect("/admin/index");

    			}
    			else {

    				return view("static.admin.login", ["error_message" => "Пароль введен неправильно!"]);

    			}

    		}	
    		else {

    			return view("static.admin.login", ["error_message" => "Логин введен неправильно!"]);

    		}
    	}
    	else {

    		return view("static.admin.login", ["error_message" => "Логин введен неправильно!"]);

    	}

    }

    public function view_index () {
    	$admin = session()->get("admin");

    	if(isset($_GET["page"])) {
    		return view("static.admin.pages.".$_GET["page"], ["admin" => $admin]);
    	}
    	else {
    		return view("static.admin.pages.index" , ["admin" => $admin]);
    	}
    }
}

