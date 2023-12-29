@extends('layout.content')
@section('contents')
<x-navbar />

<body class="">
    <main>
    <x-search />
        <a href="index.html" class="inline-block text-black ml-4 mb-4"
            ><i class="fa-solid fa-arrow-left"></i> Back
        </a>
        <div class="mx-4">
            <div class="bg-gray-50 border border-gray-200 p-10 rounded">
                <div
                    class="flex flex-col items-center justify-center text-center"
                >
                    <img
                        class="w-200 h-200 mr-6 mb-6"
                        src="{{ $products->picture ? asset('storage/'.$products->picture): asset('image/reworked2.jpg') }}"
                        alt=""
                    />
                    {{-- productsname --}}
                    <h3 class="text-2xl mb-2">{{ $products->product_name }}</h3>
                    <div class="text-xl font-bold mb-4">Price: {{ $products->price }}</div>
                    <div class="text-xl font-bold mb-4">

                        <form action="/verify/{{ $products->id }}" method="post">
                            @csrf
                            <div style="display: flex; flex-direction: column">
                                <input type="number" name="quantity" style="background-color: yellowgreen"/>
                                <button type="submit" class="bg-black text-white rounded-xl  py-1 mt-4">Add To Cart</button>
                            </div>
                        </form>

                    </div>
                    {{-- <ul class="flex">
                        <li
                            class="bg-black text-white rounded-xl px-3 py-1 mr-2"
                        >
                            <a href="#">Add to Cart</a>
                        </li>

                        <li
                        class="bg-black text-white rounded-xl px-3 py-1 mr-2"
                    >
                        <a href="#">Check Out</a>
                    </li>
                       
                    </ul> --}}
                    <div class="text-lg my-4">
                        <i class="fa-solid fa-location-dot"></i> Daytona, FL
                    </div>
                    <div class="border border-gray-200 w-full mb-6"></div>
                    <div>
                        <h3 class="text-3xl font-bold mb-4">
                            Products Description
                        </h3>
                        <div class="text-lg space-y-6">
                          
                            <p>{{ $products->description }}  </p>

                            <a
                                href="https://test.com"
                                target="_blank"
                                class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                                ><i class="fa-solid fa-globe"></i> Go To Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

@endsection
</html>
