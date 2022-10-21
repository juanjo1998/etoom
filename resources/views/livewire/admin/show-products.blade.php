<div>    
    {{-- @can('admin.index') --}}
    @if (auth()->user()->client_status == '2')
    <x-slot name="header">
        <div class="flex items-center ">
            <h2 class="font-semibold text-xl text-gray-600 leading-tight">
               Produc List
            </h2>

            <x-button-enlace class="ml-auto" href="{{route('admin.products.create')}}">
                Add Products
            </x-button-enlace>
        </div>
    </x-slot>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="container py-12">       
        <x-table-responsive>

            <div class="px-6 py-4">

                <x-jet-input type="text" 
                    wire:model="search" 
                    class="w-full"
                    placeholder="enter product name" />

            </div>


            {{-- filter --}}

            <div class="px-6 py-4 flex items-center">
                
                <div>

                    {{-- tipo de usuario --}}

                    <select wire:model="user_type">
                        <option value="" selected disabled>Tipo de usuario</option>
                        @foreach ($users_type as $user_type)                        
                            <option value="{{ $user_type }}">
                                @if ($user_type == 1)
                                    No pago
                                @else
                                    Pago
                                @endif
                            </option>
                        @endforeach
                    </select>

                    {{-- filtro por usuarios --}}

                    <select wire:model="user_filter">
                        <option value="" selected disabled>Filtrar por usuario</option>
                        @foreach ($users as $user)                        
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>   
                    
                    
                    {{-- filtro por states --}}

                    <select wire:model="state_id">
                        <option value="" selected disabled>Filtrar por state</option>
                        @foreach ($states as $state)                        
                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                        @endforeach
                    </select>    
                </div>

                <div class="ml-auto">
                    <x-jet-button wire:click="deleteFilter">
                        Borrar filtro
                    </x-jet-button>

                    <x-jet-button wire:click="productsDraft" class="bg-red-500 hover:bg-red-400">
                        borrador
                    </x-jet-button>

                    <x-jet-button wire:click="productsPublished" class="bg-green-500 hover:bg-green-400">
                        publicado
                    </x-jet-button>

                </div>
            </div>

            @if ($products->count())
                
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
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
                                Estado
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                User
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Premium
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Ver
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($products as $product)

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            @if ($product->images->count())
                                                <img class="h-10 w-10 rounded-full object-cover"
                                                    src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                            @else
                                                <img class="h-10 w-10 rounded-full object-cover"
                                                    src="https://images.pexels.com/photos/5961541/pexels-photo-5961541.jpeg?auto=compress&cs=tinysrgb&w=1600" alt="">
                                            @endif
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $product->name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">

                                    <div class="text-sm text-gray-900">
                                        {{ $product->subcategory->category->name }}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @switch($product->status)
                                        @case(1)
                                            <span wire:click="publishedStatus({{ $product->id }})"
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-700 cursor-pointer hover:bg-opacity-50">
                                                Borrador
                                            </span>
                                        @break
                                        @case(2)
                                            <span wire:click="draftStatus({{ $product->id }})"
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 cursor-pointer hover:bg-opacity-80">
                                                Publicado
                                            </span>
                                        @break
                                        @default

                                    @endswitch

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$product->user->name}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$product->user->plan == 2 ? 'si' : 'no'}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('products.show', $product) }}" class="text-indigo-600 hover:text-indigo-900" target="_blank">Ver</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('admin.products.edit', $product) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                            </tr>

                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>

                @else

                <div class="px-6 py-4">
                    Record does not mach
                </div>

            @endif
        
            {{-- @if ($products->hasPages())
                
                <div class="px-6 py-4">
                    {{ $products->links() }}
                </div>
                
            @endif --}}
                

        </x-table-responsive>       
    </div>

    @else
    <div class="flex justify-center items-center h-screen bg-gray-300">
        

        <div class="bg-orange-100 rounded-md border-orange-500 text-orange-700 p-4" role="alert">
            <h1 class="text-4xl">            
                Warning !
            </h1>
            <p class="mb-4">Your user is deactivated, please renew your subscription.</p>

            <div class="flex justify-center">
                <x-button-enlace>
                    Renew Plan
                </x-button-enlace>
            </div>
          </div>
    </div>
    @endif
   
    {{-- @endcan --}}

</div>
