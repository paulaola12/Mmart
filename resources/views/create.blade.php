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
      <form action="/product-create"  method="POST"  enctype="multipart/form-data"  class="shadow-lg mb-4 rounded-lg border border-gray-100 py-10 px-8">
        @csrf
        <div class="mb-4"><label class="mb-2 block text-sm font-bold">Name</label><input class="shadow-sm w-full cursor-text appearance-none rounded border border-gray-300 py-2 px-3 leading-tight outline-none ring-blue-500 focus:ring" name='product_name' type="text" placeholder="name" required="" /><span class="my-2 block"></span></div>
        <div class="mb-4"><label class="mb-2 block text-sm font-bold">Price</label><input class="shadow-sm w-full cursor-text appearance-none rounded border border-gray-300 py-2 px-3 leading-tight outline-none ring-blue-500 focus:ring" name='price' type="text" placeholder="email" required="" /><span class="my-2 block"></span></div>
        <div class="mb-4">
            <label class="mb-2 block text-sm font-bold">Select category</label>
            <select class="shadow-sm w-full cursor-text appearance-none rounded border border-gray-300 py-2 px-3 leading-tight outline-none ring-blue-500 focus:ring" name='categorys_id' >
                <option selected>Choose Product Category</option>
                <option value="1">United States</option>
                <option value="2">Canada</option>
                <option value="3">France</option>
                <option value="4">Germany</option>
                <option value="5">United States</option>
                <option value="6">Canada</option>
                <option value="7">France</option>
                <option value="8">Germany</option>
                <option value="9">France</option>
                <option value="10">Germany</option>
            </select><span class="my-2 block"></span></div>
        <div class="mb-4"><label class="mb-2 block text-sm font-bold">Description</label><input class="shadow-sm w-full cursor-text appearance-none rounded border border-gray-300 py-2 px-3 leading-tight outline-none ring-blue-500 focus:ring" name='description' type="description" placeholder="Phone" required="" /><span class="my-2 block"></span></div>
        <div class="mb-4"><label class="mb-2 block text-sm font-bold">Upload Picture</label><input class="shadow-sm w-full cursor-text appearance-none rounded border border-gray-300 py-2 px-3 leading-tight outline-none ring-blue-500 focus:ring" name='picture' type="file" required="" /></div>
       
        <div class="flex items-center">
          <div class="flex-1"></div>
          <button class="cursor-pointer rounded bg-blue-600 py-2 px-8 text-center text-lg font-bold  text-white" type="submit">Create account</button>
        </div>
      </form>
    </div>
</div>
@endsection

  