<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Banner;
use App\Models\Category;
use App\Models\ProductCategory;
use App\Models\ProductAttributeAssoc;
use App\Models\ProductImage;
use App\Models\Product;
use App\Models\ContactUs;
use App\Models\Coupon;
use App\Models\Cms;


use Illuminate\Support\Facades\Hash;

class JwtController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api',['except'=>['login','register','contact','banner','category','product','coupon','show','productdetails','cms','cmsById']]);
    }
    public function register(Request $request){
        $validator=Validator::make($request->all(),[
            'firstname'=>'required|min:2|alpha',
            'lastname'=>'required|min:2|alpha',
            'email'=>'required|unique:users|email',
            'password'=>'required|min:6|max:12',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        else {
            $user=User::create([
                'firstname'=>$request->firstname,
                'lastname'=>$request->lastname,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'status'=>$request->status ?? '1',
                'role_id' => $request->role ?? '5',
            ]);
            return response()->json([
                'message'=>1,
                'user'=>$user
            ],201);
        }
    }
    public function login(Request $request){
        $validator=Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required|min:6|max:12',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        else {
            $user=User::where('email',$request->email)->first();
            if ($user->status ==1) {
                if(!$token=auth()->guard('api')->attempt($validator->validated())){
                return response()->json(['token' => $token,'error'=>1 ,'message' => 'Login unsuccessful.', 'status' => 0],400);
            }
        }
           else {
                 return response()->json(['token' => '','error'=>0, 'message' => 'User is inactive.', 'status' => 0]);
                }
        }
        return response()->json(['token' => $token,'error'=>0 ,'message' => 'Login successfully.', 'status' => 1, 'email'=>$request->email],200);
          
    }
    public function contact(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>'required|min:2|max:10|alpha',
            'email'=>'required|unique:contact_us|email',
            'mobile'=>'required|numeric|unique:contact_us',
            'message'=>'required|min:10|max:255',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        else {
            $contact=ContactUs::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'mobile'=>$request->mobile,
                'message'=>$request->message,
            ]);
            return response()->json([
                'error'=>1,
                'contact'=>$contact
            ]);
        }
    }
    public function banner()
    {
        $banner = Banner::all();
        foreach($banner as $ban){
            $listbanner[]=[
                'caption'=>$ban->caption,
                'image'=> asset('uploads/'.$ban->image)
              ];
          }
 
        return response()->json(['banner' => $listbanner]);
    }
    public function cms()
    {
        $cms = Cms::all();
        foreach($cms as $c){
            $listcms[]=[
                'id'=>$c->id,
                'title'=>$c->title,
                'body'=>$c->body,
                'image'=> asset('uploads/'.$c->image)
              ];
          }
 
        return response()->json(['cms' => $listcms]);
    }
    public function cmsById($id)
    {
        $list = [];
        $cms=Cms::find($id);
            $list[] = [
                'id' => $cms->id,
                'title' => $cms->title,
                'body' => $cms->body,
                'image'=>asset('uploads/'.$cms->image),
            ];
        return response()->json(['cmsbyid' => $list]);
    }
    public function product()
    {
        $list=[];
        $listimage=[];
        $product = Product::all();
        foreach($product as $prod){
          foreach($prod->ProductImage as $image){
                $listimage[]=[
                    'image'=> asset('uploads/'.$image->images)
                  ];
          }       
            $list[]=[
                'name'=>$prod->pname,
                'pid'=>$prod->id,
                'category'=>$prod->ProductCategory,
                'attributes'=>$prod->ProductAttributeAssoc,
                'images'=>$listimage,
            ];
            $listimage=[];
        }
    
        return response()->json(['product' => $list]);
    }
    public function productdetails($id){
           $list = [];
           $product=Product::join('product_attribute_assocs','product_attribute_assocs.products_id','=','products.id')->where('products.id',$id)->get();
           foreach ($product as $prod) {
            foreach($prod->ProductImage as $image){
                $listimage[]=[
                    'image'=> asset('uploads/'.$image->images)
                  ];
          }
            $list[] = [
                'name' => $prod->pname,
                'pid' => $prod->id,
                'price'=>$prod->price,
                'quantity'=>$prod->quantity,
                'features'=>$prod->features,
                //   'attributes'=>$prod->ProductAttributeAssoc,
                'images'=>$listimage,
            ];
            $listimage = [];
        }

        return response()->json(['products'=>$list]);
    }
    public function category()
    {
        $category = Category::all();
        foreach($category as $cat){
            $listcat[]=[
                'id'=>$cat->id,
                'name'=>$cat->name,
                'description'=>$cat->description,
              ];
          }
 
        return response()->json(['category' => $listcat]);
    }
    public function show($id)
    {
        $list = [];
        $product = Product::join('product_categories','products.id','=','product_categories.products_id')->where('product_categories.categories_id',$id)->get();
        foreach ($product as $prod) {
            foreach($prod->ProductImage as $image){
                $listimage[]=[
                    'image'=> asset('uploads/'.$image->images)
                  ];
          }
            $list[] = [
                'name' => $prod->pname,
                'pid' => $prod->id,
                'category'=>$prod->ProductCategory,
                'attributes'=>$prod->ProductAttributeAssoc,
                'images'=>$listimage,
            ];
            $listimage = [];
        }

        return response()->json(['categorybyid' => $list]);
    }
    public function coupon()
    {
        $coupon = Coupon::all();
        return response()->json(['coupon' => $coupon]);
    }
   
    public function respondWithToken($token){
        return response()->json([
            'access_token'=>$token,
            'token_type'=>'bearer',
            'expires_in'=>auth()->guard('api')->factory()->getTTL()*60
        ]);
    }
    public function profile(){
       $profile=auth('api')->user();
        return response()->json(['profile'=>$profile]);
    }
    public function updateProfile(Request $request){
        $validator=Validator::make($request->all(),[
            'firstname'=>'required|min:2|alpha',
            'lastname'=>'required|min:2|alpha',
            'email'=>'required|unique:users|email',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        else {
            $user=User::find($request->user()->id);
                $user->firstname=$request->firstname;
                $user->lastname=$request->lastname;
                $user->email=$request->email;
                $user->update();
            return response()->json([
                'message'=>"profile updated successfully",
                'updatedprofile'=>$user
            ]);
        }
         return response()->json(['status'=>1,'updatedprofile'=>$user]);
     }

     public function changePassword(Request $request){
        $validator=Validator::make($request->all(),[
            'old_password'=>'required|min:6|max:12',
            'new_password'=>'required|min:6|max:12',
            'confirm_password'=>'required|min:6|max:12|same:new_password',

        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        else {
            $user=$request->user();
            if(Hash::check($request->old_password,$user->password)){
               $user->update([
                   'password'=>Hash::make($request->new_password)
               ]);
               return response()->json([
                'message'=>"password successfully updated",
                'status'=>1
                ],200);
            }
           else{
                return response()->json([
                    'message'=>"old password does not match",
                ],400);
           }
        }
        return response()->json([
            'message'=>"password successfully updated",
            'status'=>1
        ]);
    }
    public function refresh(){
        return $this->responseWithToken(auth()->guard('api')->refresh());
    }
 public function logout(){
        auth()->logout();
        return response()->json(["message"=>"User Logout Successfully"]);
    }
}
