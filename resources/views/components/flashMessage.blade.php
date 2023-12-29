@if (Session()->has('message'))
   <div 
   x-init="setTimeout(()=> show = false, 3000)"
   x-data="{show:true}"
   x-show="show"
   class="fixed top-0 left-1/2 bg-laravel text-white -transalate-x-1/2 px-48 py-1">
    <p>{{ session('message') }}</p>
   </div> 
    
@endif