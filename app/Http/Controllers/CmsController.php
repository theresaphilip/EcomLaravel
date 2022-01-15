<?php

namespace App\Http\Controllers;
use App\Models\Cms;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cmss= Cms::latest()->paginate(2);
        return view('admin.pages.showcms',compact('cmss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.addcms');
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
            'title'=>'required|min:5|max:150',
            'body'=>'required|min:6|max:255',
            'image'=>'required|mimes:jpg,png,jpeg',
        ]);
    if($validate){
       $title=$req->title;
       $body=$req->body;
       $file=$req->file('image');
       $dest=public_path('/uploads');
       $fname="Image-".rand()."-".time().".".$file->extension();
       if($file->move($dest,$fname))
       {
           Cms::create([
            'title'=>$title,
            'body'=>$body,
            'image'=>$fname,

           ]);
            return redirect("cms");
        }
        else{
               $path=public_path()."uploads/".$fname;
               unlink($path);
               return back()->with('error','cms could not added');
           }
       }
       else {
           return back()->with('error','Uploading Error');
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
        $cms=Cms::where('id',$id)->first();
        return view('admin.pages.updatecms',compact('cms'));
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
            'title'=>'required|min:5|max:150',
           
            'image'=>'required|mimes:jpg,png,jpeg',
        ]);
    if($validate){
        $title=$req->title;
        $body=$req->body;
       $file=$req->file('image');
       $dest=public_path('/uploads');
       $fname="Image-".rand()."-".time().".".$file->extension();
       if($file->move($dest,$fname))
       {
           Cms::where('id',$id)->update([
            'title'=>$title,
            'body'=>$body,
            'image'=>$fname,

           ]);
            return redirect("cms");
        }
        else{
               $path=public_path()."uploads/".$fname;
               unlink($path);
               return back()->with('error','cms could not added');
           }
       }
       else {
           return back()->with('error','Uploading Error');
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
        $cmsdata=Cms::find($id);
        $imagepath=$cmsdata->image;
        unlink('uploads/'.$imagepath);
        $cmsdata->delete();
    }
}
