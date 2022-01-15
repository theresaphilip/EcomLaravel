<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
class RoleController extends Controller
{
    //
    public function index(){
        $roles = Role::all();
        return view('admin.pages.showroles', ['role' => $roles]);
    }
    // //public function index()
    // {
    //     //
    //     return view('admin.pages.showroles');
    // }
}
