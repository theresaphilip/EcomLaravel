<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::with('Role')->paginate(8);
        return view('admin.pages.showuser',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all();
        return view('admin.pages.adduser',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $validate=$req->validate([
            'firstname'=>'required|min:2|alpha',
            'lastname'=>'required|min:2|alpha',
            'email'=>'required|unique:users|email',
            'password'=>'required|min:6|max:12',
            'cpassword'=>'required|min:6|max:12|required_with:password|same:password',
            'status'=>'required',
         
        ]);
        if($validate){
            User::create([
                'firstname'=>$req->firstname,
                'lastname'=>$req->lastname,
                'email'=>$req->email,
                'password'=>Hash::make($req->password),
                'status'=>$req->status,
                'role_id' => $req->role ?? '5',
            
            ]);
            return redirect('users');
        }
        else{
            return back()->with('error','All fields are required');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles=Role::all();
        $users=User::where('id',$id)->first();
        return view('admin.pages.updateuser',compact('users','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $validate=$req->validate([
            'firstname'=>'required|min:2|alpha',
            'lastname'=>'required|min:2|alpha',
            'email'=>'required|email',
            'status'=>'required',
         
        ]);
        if($validate){
            User::where('id',$id)->update([
                'firstname'=>$req->firstname,
                'lastname'=>$req->lastname,
                'email'=>$req->email,
                'status'=>$req->status,
                'role_id' => $req->role,
            
            ]);
            return redirect('users');
        }
        else{
            return back()->with('error','All fields are required');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userdata=User::find($id);
        if($userdata->delete()){
            return response()->json(['msg'=>"user deleted"]);
        }
        else{
            return response()->json(['msg'=>"user could not be deleted"]);
        }
    
    }
}
