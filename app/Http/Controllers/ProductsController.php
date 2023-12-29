<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Carts;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    // public function index(){
    //     // return view('index',[
    //     // 'products' => Products::latest()->filter(request(['search']))->paginate(12)

    //     // ]);
    //     $products = Products::latest()->filter(request(['search']))->paginate(12);
    
    //     $user =auth()->user();

    //    $cartCount = Carts::where('phone', $user->phone)->count();

    // return view('index', [
    //     'products' => $products,
    //     'cartCount' => $cartCount,
    // ]);

    // }

    public function index(){
        $products = Products::latest()->filter(request(['search']))->paginate(12);
        
        $user = auth()->user();
    
        if ($user !== null) {
        
            $cartCount = Carts::where('phone', $user->phone)->count();
        } else {
            $cartCount = 0; 
        }
    
        return view('index', [
            'products' => $products,
            'cartCount' => $cartCount,
        ]);
    }
    

    public function show(Products $id){
        // dd($id);
        return view('show', [
            'products' => $id
        ]);
    }

    public function register(){
        return view('create');
    }

    public function create(Request $request){
        // dd($request->all());
    $formField = $request->validate([
        'product_name' => 'required',
        'categorys_id' => 'required',
        'price' => 'required|numeric',
        'description' => 'required',
        'picture' => 'required'
    ]);
       if($request->hasFile('picture')){
        $formField['picture'] = $request ->file('picture')->store('image', 'public');
       }

       Products::create($formField);

       return redirect('/')->with('message', 'User crweated succeassfully');

    }

    public function cart(){
        $user = auth()->user();
        $cart= Carts::where('phone', $user->phone)->get();
        $count= Carts::where('phone', $user->phone)->count();
       return view('cart',[
        'cart' => $cart,
        'count'=>$count
       ]) ;
    }

    public function checkout(){
        $user = auth()->user();
        $cart = Carts::where('phone', $user->phone)->get();
        return view('checkout',[
           'cart' => $cart
        ]);
    }

    public function pay(Request $request){
        // dd($request->all());
        $request = $request -> reference;
        $secret_key = env('PAYSTACK_SECRET_KEY');
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/:reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer $secret_key",
            "Cache-Control: no-cache",
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

       $reponse = json_decode($response);

       if($response -> data ->status == "success"){
        $data = new Payments;
        $data ->payment_id = $reference;
        $data->fullname = $response->data->customer['first_name'] ?? null;
        $data->lastname = $response->data->customer['lastname'] ?? null;
        $data ->product_name = "Purchased Product";
        $data ->quantity = "Quantity selected users";
        $data ->amount = $response -> data -> amount;
        $data ->payment_status  = "completed";
        $data ->save();

            
            return "payment is successful";
        } else {
                return "payment is unsuccessful";
        }
        
        
    }
}






