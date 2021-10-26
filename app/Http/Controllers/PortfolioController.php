<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;
use Illuminate\Support\Facades\validator;


class PortfolioController extends Controller
{
    function home()
    {
        return view('portfolio.home');
    }
    function index(){
        return view('portfolio.index');
    }
    function about(){
        return view('portfolio.about');
    }
    function contact(){
        return view('portfolio.contact');
    }
    function portfolio(){
        return view('portfolio.portfolio');
    }
    public function contactSub(Request $request){
        // $request->validate([
        //     'name'=>'required',
        //     'email'=>'required',
        //     'phone'=>'required',
        //     'message'=>'required|max:200|min:50',
        //     'image'=> 'required|mimes:jpg'
        // ]);
        $name= $request->name;
        $phone= $request->phone;
        $email= $request->email;
        $message= $request->message;

        validator::make($request->all(), [
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'message'=>'required|max:200',
            'image'=>'required'], [

            'name.required'=> 'الاسم مطلوب',
            'phone.required'=> 'الرقم مطلوب',
            'email.required'=> 'الايميل مطلوب',
            'message.required'=> 'الرسالة مطلوبة',
            'image.required'=> 'الملف مطلوب'
        ])->validate();

        $imgName= $request->file('image')->getClientOriginalName();
        $ex= $request->file('image')->getClientOriginalExtension();
        $imgName= 'pic_' . time() . '_' . rand() . '.' . $ex;
        $request->file('image')-> move(public_path('Uploads'), $imgName);
        $data= $request->except('_token');
        // return view ('portfolio.contact', compact('name','phone', 'email', 'message'));
        dd($data);
    }
}
