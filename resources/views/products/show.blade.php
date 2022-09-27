<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
            <div>
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($product->images as $image)
                        
                            <li data-thumb=" {{ Storage::url($image->url) }}">
                                <img src=" {{ Storage::url($image->url) }}" />
                            </li>

                        @endforeach
                        
                    </ul>
                </div>
            </div>

            <div>
                <h1 class="text-xl font-bold text-trueGray-700">{{$product->name}}</h1>

                <div class="flex">
                   {{--  <p class="text-trueGray-700">Brand: <a class="underline capitalize hover:text-orange-500" href="">{{ $product->brand->name }}</a></p> --}}
                    <p class="text-trueGray-700 mx-6">5 <i class="fas fa-star text-sm text-yellow-400"></i></p>
                    <a class="text-orange-500 hover:text-orange-600 underline" href="">39 reviews</a>
                </div>

                <div class="bg-white rounded-lg shadow-lg mt-6">
                    
                    <div class="p-4 text-gray-700">
                        <h2 class="mb-4 font-bold text-lg">Description</h2>
                        {!!$product->description!!}
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-lg mt-6">Hacerlo en forma de list o una grid
                    <div class="flex items-center justify-between md:justify-start">
                        <div class="p-4 text-gray-700">
                            <h2 class="mb-4 font-bold text-lg">Phone Number</h2>
                                {!!$product->phone!!}
                        </div>
                        <div class="p-4 text-gray-700">
                            <h2 class="mb-4 font-bold text-lg">email</h2>
                                {!!$product->phone!!}
                        </div>
                    </div>
                    <div class="flex">
                        <div class="ml-16 text-trueGray-700">Instagram</div>
                        <div class="ml-16 text-trueGray-700">Facebook</div>
                        <div class="ml-16 text-trueGray-700">Twitter</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @push('script')
        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
    @endpush
</x-app-layout>
