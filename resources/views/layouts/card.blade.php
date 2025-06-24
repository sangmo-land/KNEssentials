@props(['height' => 500, 'header' => 'Default Header'])
<div class="card border border-gray-300 rounded-lg p-5  mx-auto max-w-2xl relative h-auto">
    <div>
    <x-image type="absolute"/>
    </div>
    <div class="mt-5"> 
        <h1 class="text-2xl font-bold text-black">{{$header}}</h1>
        <p class="text-gray-500 p-4">{{$slot}}</p> 
    </div>
    
    
</div>



