<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Customer;
use App\Mail\sendMail;



class MainController extends Controller
{
    
    public function __construct(){
        $this->middleware('IsLogged');
    }

    function index(){
        return view('dashboard');
    }

    function lists(){
        $data = Customer::orderby('id', 'DESC')->get();
        return view('customerList',['data'=>$data]);
    }

    function add_customer(Request $request){
        // $request->validate([
        //     'firstName' => 'required | string',
        //     'lastName' => 'required | string',
        //     'email' => 'required | email | unique:customers',
        //     'image' => 'mimes:jpg,png,jpeg'
        // ]);
        // $customer = new Customer();
        // $customer->f_name = $request->firstName;
        // $customer->l_name = $request->lastName;
        // $customer->email = $request->email;

        // if($request->hasfile('image')){
        //    $path = 'uploads/';
        //    $newImage = time().'.'.$request->file('image')->getClientOriginalExtension();
        //    $upload = $request->image->move(public_path($path), $newImage);
        //    if($upload){
        //        $customer->img_path = $path . $newImage;
        //    }
        // } else {
        //     $customer->img_path = 'default_image/default.png';
        // }
       // $customer->save();
        return response()->json($request->firstname);
        //return redirect()->route('index')->with('success','A new customer has been successfully created');
    }


    function edit_customer($id){
        $cust = Customer::get()->where('id','=',$id);
        return view('edit',['data'=>$cust]);

    }

    function update_customer(Request $request, $id){
        $request->validate([
            'firstName' => 'required| string| min:2',
            'lastName' => 'required| string| min:2',
            'email'    => "required| email"
        ]);
        $cust = new Customer();
        $cust ->where('id', $id)->update([
            'f_name' => $request->firstName,
            'l_name' => $request->lastName,
            'email'  => $request->email
        ]);
        return redirect()->route('list')->with('success', 'Details have been updated');
    }

    function delete_customer($id){
        $data = Customer::where('id','=',$id)->first();
        if($data->img_path === 'default_image/default.png'){
            Customer::where('id',$id)->delete();
        }   else{
            $img_file = trim($data->img_path, 'uploads/');
            unlink(public_path('uploads/'.$img_file));
            Customer::where('id',$id)->delete();
        }

        return back()->with('success', 'customer has been deleted');
    }

    function change_profile(Request $request, $id){
        $data = Customer::where('id',$id)->first();
        $request->validate([
            'image' => 'required |mimes:png,jpg,jpeg'
        ]);
        
        if($request->file('image')){
            $path = 'uploads/';
            $newImage = time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path($path),$newImage);
            if($data->img_path != 'default_image/default.png'){
                unlink(public_path($data->img_path));
            }
            Customer::where('id',$id)->update([
                'img_path' => $path.$newImage
            ]);
        }

        return back()->with('success','Profile image has been updated');
        
    }

    // open mail form
    
    function mailform($id){
        $data = Customer::where('id',$id)->get('email')->first();
        $email = $data->email;
        return view('mail',['email'=>$email]);
       
    }

    //  Send mail to admin
    function send_mail(Request $request){
        $request->validate([
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $input = $request->all();
        Mail::to('shiwanbk@gmail.com')->send(new sendMail($input));
        return redirect()->back()->with(['success' => 'Email sent']);

    }

    function logout(Request $request){
        $request->session()->forget('loggedUser');
        return redirect()->route('login')->with('success', 'You are logged out');
    }

    
}
