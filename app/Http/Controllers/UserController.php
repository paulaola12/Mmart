<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Carts;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create(){
      return view('registeration');
    }

    public function register(Request $request){
        // dd($request->all());
        $form = $request -> validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required|min:6'
        ]);
        $form['password'] = bcrypt($form['password']);
       $user = User::create($form);
       auth() -> login($user);
       return redirect('/')->with('message', 'user created successfully');
    }

    // Log in views 
    public function login(){
        return view('log-in');
    }

    // authenticate user
    public function authenticate(Request $request){
        // dd($request->all());
        $formField = $request -> validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
        
        if(auth() -> attempt($formField)){
            $request -> session() -> regenerate();

            return redirect('/')->with('message', 'user Logged in successfully');
        }

          return redirect('/')->with('message', 'invalid details');

    }

    //verify
    public function addToCart(Request $request, $id){
        // dd($request->all());
        if(Auth::id()){
            $user = auth()->user();
            $product = Products::find($id);

            $cart = new Carts;

            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->product_name = $product->product_name;
            $cart->price = $product->price;
            $cart->image = $product->picture;
            $cart->quantity = $request->quantity;
            $cart -> save();

            return redirect('/')->with('message','User Created Succesfully');
        }
        else
        {
            return redirect('login');
        }
    }
}

