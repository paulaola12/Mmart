@extends('layout.content')
@section('contents')
<x-navbar />
<div class="bg-white w-screen font-sans text-gray-900">
    <div class=" ">
      <div class="mx-auto w-full sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl">
       <p class="py-8 text-3xl flex items-center justify-center font-bold">Register with Mart</p>
      </div>
    </div>
    <div class="md:w-2/3 mx-auto w-full pb-16 sm:max-w-screen-sm md:max-w-screen-md lg:w-1/3 lg:max-w-screen-lg xl:max-w-screen-xl">
      <form action="{{ route('create.mart') }}"  method="POST" class="shadow-lg mb-4 rounded-lg border border-gray-100 py-10 px-8">
        @csrf
        <div class="mb-4"><label class="mb-2 block text-sm font-bold" for="email">Name</label><input class="shadow-sm w-full cursor-text appearance-none rounded border border-gray-300 py-2 px-3 leading-tight outline-none ring-blue-500 focus:ring" name='name' id="name" type="name" placeholder="name" required="" /><span class="my-2 block"></span></div>
        <div class="mb-4"><label class="mb-2 block text-sm font-bold" for="email">E-mail</label><input class="shadow-sm w-full cursor-text appearance-none rounded border border-gray-300 py-2 px-3 leading-tight outline-none ring-blue-500 focus:ring" name='email' id="email" type="email" placeholder="email" required="" /><span class="my-2 block"></span></div>
        <div class="mb-4"><label class="mb-2 block text-sm font-bold" for="phone">Phone Number</label><input class="shadow-sm w-full cursor-text appearance-none rounded border border-gray-300 py-2 px-3 leading-tight outline-none ring-blue-500 focus:ring" name='phone' id="phone" type="phone" placeholder="Phone" required="" /><span class="my-2 block"></span></div>
        <div class="mb-4"><label class="mb-2 block text-sm font-bold" for="password">Password</label><input class="shadow-sm w-full cursor-text appearance-none rounded border border-gray-300 py-2 px-3 leading-tight outline-none ring-blue-500 focus:ring" name='password' id="password" type="password" placeholder="******************" required="" /></div>
        <div class="mb-6">
          <label class="mb-2 flex text-sm"
            ><input type="checkbox" name="accept" class="mr-2" required="" />
            <div class="text-gray-800">
              <p class="">
                I accept the
                <a href="#" class="cursor-pointer text-blue-500 underline">terms of use</a>
                and
                <a href="#" class="cursor-pointer text-blue-500 underline">privacy policy</a>
              </p>
            </div></label
          >
        </div>
        <div class="flex items-center">
          <div class="flex-1"></div>
          <button class="cursor-pointer rounded bg-blue-600 py-2 px-8 text-center text-lg font-bold  text-white" type="submit">Create account</button>
        </div>
      </form>
    </div>
</div>
@endsection

  