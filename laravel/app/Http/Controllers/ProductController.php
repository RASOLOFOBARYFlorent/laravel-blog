<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Company;
use App\Models\Loveproduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function index(){
        $cartsnumbers=Cart::where('user_id',auth()->user()->id)->get()->count();
        $product=Product::all();
        return view('index',['products'=>$product,'cartsnumbers'=>$cartsnumbers]);
    }

    
    public function cart(){

        return view('panier');
    }


    public function createproducts(){
        $val=request()->validate([
            'name'=>'required',
            'price'=>'required',
            'stock'=>'required',
            'photo'=>'required',

        ]);

        $path= Storage::disk('public')->put('imageproduct',request()->file('photo'));

        Product::create([
            'name'=>request('name'),     
            'price'=>request('price'),     
            'image'=>$path,     
            'infos'=>request('stock'),  
        ]);
        return redirect()->route('admin.products');
    }


    public function deleteproduct($id){
        $product=Product::where('id',$id)->get()->first();
        Storage::disk('public')->delete($product->image);
        $product->delete();
        return redirect()->route('admin.products');

    }



    public function cartofoneperson($id){

        $cartsnumbers=Cart::where('user_id',auth()->user()->id)->get()->count();
      
        $carts=Cart::where('user_id',$id)->get();
        $product_id=[];
        foreach($carts as $idp){
            $product_id[]=$idp->product_id;
        }

        $nmpro=count($product_id);
        $thepro=[];
        for($i=0;$i<$nmpro;$i++){
            $thepro[]=Product::where('id',$product_id[$i])->get();
        }

       
        return view('panier',["carts"=>$thepro,'cartsnumbers'=>$cartsnumbers]);
    }

    public function removefromcart($id){
        $cart=Cart::where('user_id',auth()->user()->id)
                ->where('product_id',$id)->get()->first();
    
        $cart->delete();
        return redirect()->route('cart',auth()->user()->id);
    }


    public function love($id){
        $check=DB::table('loveproducts')
            ->where('user_id',auth()->user()->id)
            ->where('product_id',$id)
            ->get();

        if(@$check[0]==null){
            Loveproduct::create([
                'user_id'=>auth()->user()->id,
                'product_id'=>$id,
            ]);
            return redirect()->route('index');
        }else{
            return redirect()->route('index');
        }
     
    }

    public function addtocart($id){
        $check=DB::table('carts')
            ->where('user_id',auth()->user()->id)
            ->where('product_id',$id)
            ->get();

        if(@$check[0]==null){
            Cart::create([
                'user_id'=>auth()->user()->id,
                'product_id'=>$id,
            ]);
            return redirect()->route('index');
        }else{
            return redirect()->route('index');
        }
    }





    //Company controller



    public function createcompany(){
        $val=request()->validate([
            'name'=>'required',
            'owner'=>'required',
            'phone'=>'required',
            'place'=>'required',

        ]);


        Company::create([
            'name'=>request('name'),     
            'owner'=>request('owner'),     
            'ownerphone'=>request('phone'),     
            'place'=>request('place'),  
        ]);
        return redirect()->route('admin.company');
    }


    public function deletecompany($id){
        $company=Company::where('id',$id)->get()->first();
        $company->delete();
        return redirect()->route('admin.company');

    }

























}
