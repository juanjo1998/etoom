<div>    
    <x-slot name="header">
        <div class="flex items-center ">
            <h2 class="font-semibold text-xl text-gray-600 leading-tight">
               My Post
            </h2>
        </div>
    </x-slot>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="container py-12">        
        @if ($products->count())
            @foreach ($products as $product)

            <x-table-responsive>        
                    <table class="min-w-full divide-y divide-gray-400 mb-6">
                        <thead class="bg-gray-200">
                            <tr>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Imagen
                                </th>
                            
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Categoría
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Subcategory
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Filling number
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Business type
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Phone number
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Business mail
                                </th>

                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Ver</span>
                                </th>
                                                
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Editar</span>
                                </th>
                            </tr>

                            {{-- departments .... --}}
                        
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    {{-- imagen --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="ml-4">
                                                    
                                                </div>
                                                @if ($product->images->count())
                                                    <img class="h-10 w-10 rounded-full object-cover"
                                                        src="{{ Storage::url($product->images->first()->url) }}">
                                                @else
                                                    <img class="h-10 w-10 rounded-full object-cover"
                                                        src="https://images.pexels.com/photos/5961541/pexels-photo-5961541.jpeg?auto=compress&cs=tinysrgb&w=1600" alt="">
                                                @endif
                                            </div>                                        
                                        </div>
                                    </td>

                                    {{-- product name --}}
                                    <td class="px-6 py-4 whitespace-nowrap">

                                        <div class="text-sm text-gray-900">
                                            {{ Str::limit($product->name,5) }}
                                        </div>

                                    </td>
                                    
                                    {{-- category name --}}
                                    <td class="px-6 py-4 whitespace-nowrap">

                                        <div class="text-sm text-gray-900">
                                            {{ Str::limit($product->subcategory->category->name,5) }}
                                        </div>

                                    </td>

                                    {{-- subcategory name --}}

                                    <td class="px-6 py-4 whitespace-nowrap">

                                        <div class="text-sm text-gray-900">
                                            {{ $product->subcategory->name }}
                                        </div>

                                    </td>

                                    {{-- filling number --}}

                                    <td class="px-6 py-4 whitespace-nowrap">

                                        <div class="text-sm text-gray-900">
                                            {{ $product->filling_number->number }}
                                        </div>

                                    </td>

                                    {{-- business type --}}

                                    <td class="px-6 py-4 whitespace-nowrap">

                                        <div class="text-sm text-gray-900">
                                            {{ $product->business_type }}
                                        </div>

                                    </td>

                                    {{-- phone_number --}}

                                    <td class="px-6 py-4 whitespace-nowrap">

                                        <div class="text-sm text-gray-900">
                                            {{ $product->phone_number }}
                                        </div>

                                    </td>

                                    {{-- mail --}}

                                    <td class="px-6 py-4 whitespace-nowrap">

                                        <div class="text-sm text-gray-900">
                                            {{ $product->mail }}
                                        </div>

                                    </td> 

                                    {{-- ver --}}

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('products.show', $product) }}" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                                    </td>
                                                                                                           
                                    {{-- edit --}}

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('admin.products.edit', $product) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    </td>

                                    
                                  
                                </tr>                          
                        </tbody>

                        {{-- divison department city county --}}

                       
                    </table>

                    <table class="min-w-full divide-y divide-gray-400 mb-6">
                        <div>
                            <thead class="bg-gray-50">
                                <tr>                          
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Department
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        City
                                    </th>  
                                    
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        County
                                    </th>   
                                    
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Instagram
                                    </th> 

                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Facebook
                                    </th> 

                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Twitter
                                    </th> 

                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Estado
                                    </th>         
                                </tr>                    
                            </thead>
    
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>                                                        
                                    {{-- departments --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
    
                                        <div class="text-sm text-gray-900">
                                            {{ $product->department->name }}
                                        </div>
    
                                    </td>   
                                    
                                    {{-- cities --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
    
                                        <div class="text-sm text-gray-900">
                                            {{ $product->city->name }}
                                        </div>
    
                                    </td> 
    
                                    {{-- counties --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
    
                                        <div class="text-sm text-gray-900">
                                            {{ $product->county->name }}
                                        </div>
    
                                    </td> 

                                     {{-- instagram --}}
                                     <td class="px-6 py-4 whitespace-nowrap">
    
                                        <div class="text-sm text-gray-900">
                                            {{ $product->instagram }}
                                        </div>
    
                                    </td>

                                    {{-- facebook --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
    
                                        <div class="text-sm text-gray-900">
                                            {{ $product->facebook }}
                                        </div>
    
                                    </td>

                                    {{-- twitter --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
    
                                        <div class="text-sm text-gray-900">
                                            {{ $product->twitter }}
                                        </div>
    
                                    </td>

                                     {{-- status --}}

                                     <td class="px-6 py-4 whitespace-nowrap">
                                        @switch($product->status)
                                            @case(1)
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-700">
                                                    Borrador
                                                </span>
                                            @break
                                            @case(2)
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Publicado
                                                </span>
                                            @break
                                            @default

                                        @endswitch

                                    </td>  
                                    
                                </tr>                          
                            </tbody>
    
                        </div>
                    </table>
            </x-table-responsive>
            @endforeach    

            <div>
                {{$products->links()}}
            </div>
        @else
         <div class="px-6 py-4">
             Record does not mach
         </div>
        @endif
    </div>


</div>
