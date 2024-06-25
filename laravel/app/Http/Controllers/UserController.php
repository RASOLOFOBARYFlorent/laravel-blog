<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Company;
use App\Models\Feedback;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    //
    public function register(){
        $validate=request()->validate([
            'name'=>'required|min:2',
            'email'=>'required|email',
            'password'=>'required'
        ]);
        
        User::create([
            'name'=>request('name'),
            'email'=>request('email'),
            'role'=>"user",
            'image'=>'',
            'password'=>Hash::make(request('password')),
        ]);

        return redirect()->route('index');
        
    }
    public function login(){
        $validate=request()->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(auth()->attempt($validate)){
            request()->session()->regenerateToken();
            if(auth()->user()->role=="user"){
                return redirect()->route('index');
            }else{
                return redirect()->route('index.admin');
            }
        }else{
            return redirect()->route('login');
        }
    }


    public function profile($id){
        $cartsnumbers=Cart::where('user_id',auth()->user()->id)->get()->count();
        return view("compte",['cartsnumbers'=>$cartsnumbers]);
    }

    public function logout(){
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Auth::logout();
        return redirect()->route('index');
    }

    public function admin(){
        $dayinthismonth=cal_days_in_month(CAL_GREGORIAN,date('m'),date('Y'));
        
        $userinthismonth=User::where('created_at','<',date("Y-m-$dayinthismonth"))
            ->where('role','user')
            ->get()->count();
        $latestuser=User::orderBy('created_at','DESC')
            ->limit(5)
            ->get();
        return view("admin.index",['users'=>$latestuser,'usersinthismoth'=>$userinthismonth]);
    }

    public function adminuser(){
        $users=User::where('role','user')->get();
        return view('admin.user',['users'=>$users]);
    }

    
    public function admincompany(){
        $companies=Company::all();
        return view('admin.company',['companies'=>$companies]);
    }
    public function adminproducts(){
        $products=Product::all();
        return view('admin.product',['products'=>$products]);
    }


    public function admintransaction(){
        return view('admin.transaction');
    } 

    public function adminprofile(){
        return view('admin.compte');
    }


    public function deleteuser($id){
        $user=User::where('id',$id)->get()->first();
        $user->delete();
        return redirect()->route('admin.users');
    }




    
    //feedback 
    public function feedback($id){
        $url=session('_previous');

        
        
        $val=request()->validate([
            'email'=>'required',
            'idea'=>'required',
        ]);
       Feedback::create([
           'email'=>$val['email'],
           'message'=>$val['idea'],
       ]);
       return   back();
    }
}
