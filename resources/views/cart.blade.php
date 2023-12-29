@extends('layout.content')
<x-navbar />
@section('contents')
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    #summary {
      background-color: #f6f6f6;
    }
  </style>
</head>

<body class="bg-gray-100">
  <div class="container mx-auto mt-10">
    <div class="flex shadow-md my-10">
      <div class="w-3/4 bg-white px-10 py-10">
        <div class="flex justify-between border-b pb-8">
          <h1 class="font-semibold text-2xl">Shopping Cart</h1>
          <h2 class="font-semibold text-2xl">{{ $count }} Items</h2>
        </div>
        <div class="flex mt-10 mb-5">
          <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Product Details</h3>
          <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Quantity</h3>
          <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Price</h3>
          <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Total</h3>
        </div>
        @php
          $totalValue = 0;
          $shipping = 2000;
          $totalPackage = 0;
        @endphp
        @foreach ($cart as $cart )
        <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
          <div class="flex w-2/5"> <!-- product -->
            <div class="w-20">
              <img class="h-24" src="{{ $cart->image ? asset('storage/' . $cart->image) : asset('image/reworked2.jpg') }}" alt="">
            </div>
            <div class="flex flex-col justify-between ml-4 flex-grow">
              <span class="font-bold text-sm">{{ $cart->product_name }}</span>
              <span class="text-red-500 text-xs">{{ $cart->product_name }}</span>
              <a href="#" class="font-semibold hover:text-red-500 text-gray-500 text-xs">Remove</a>
            </div>
          </div>
          <div class="flex justify-center w-1/5">
            

            <input class="mx-2 border text-center w-8" type="text" value="{{ $cart->quantity }}">

        
          </div>
          <span class="text-center w-1/5 font-semibold text-sm">&#8358;{{ number_format($cart->price)}}</span>
          @php
            $itemValue = $cart->price * $cart->quantity;
            $totalValue += $itemValue;
          @endphp
          <span class="text-center w-1/5 font-semibold text-sm">&#8358;{{ number_format($itemValue) }}</span>
        </div> 
        @endforeach
      


        <a href="#" class="flex font-semibold text-indigo-600 text-sm mt-10">
      
          <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512"><path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/></svg>
          Continue Shopping
        </a>
      </div>

      <div id="summary" class="w-1/4 px-8 py-10">
        <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
        <div class="flex justify-between mt-10 mb-5">
          <span class="font-semibold text-sm uppercase">Items {{ $count }}</span>
          <span class="font-semibold text-sm">&#8358;{{ number_format($totalValue) }}</span>
        </div>
        <div>
          <label class="font-medium inline-block mb-3 text-sm uppercase">Shipping</label>
          <select class="block p-2 text-gray-600 w-full text-sm">
            <option>Standard shipping - <span>	&#8358;</span>2,000.00</option>
          </select>
        </div>
        <div class="py-10">
          <label for="promo" class="font-semibold inline-block mb-3 text-sm uppercase">Promo Code</label>
          <input type="text" id="promo" placeholder="Enter your code" class="p-2 text-sm w-full">
        </div>
        <button class="bg-red-500 hover:bg-red-600 px-5 py-2 text-sm text-white uppercase">Apply</button>
        <div class="border-t mt-8">
          <div class="flex font-semibold justify-between py-6 text-sm uppercase">
            <span>Total cost</span>
            @php
              $shippingCost = 2000;
             $totalPackage = $totalValue + $shippingCost;
             session()->flash('totalPackage', $totalPackage);
            @endphp
            
            <span>&#8358;{{ number_format($totalPackage) }}</span>
          </div>
          
          <a href="{{ route('checkout.mart') }}" class="btn round-xl bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 px-3 text-sm text-white uppercase w-full">Check Out</a>
        </div>
      </div>

    </div>
  </div>
</body>

@endsection

  