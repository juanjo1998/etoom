<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
    
    {{$object}}

    <h1 class="text-3xl text-center font-semibold mb-8">Fill in the information to create your advertsing space</h1>

    <div class="bg-white rounded-lg shadow-lg  grid grid-cols-2 gap-6 p-4 mb-4 h-28">

        {{-- Categoría --}}
        <div>
            <x-jet-label value="Categories" />
            <select class="w-full form-control" wire:model="category_id">
                <option value="" selected disabled>Select a category</option>

                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>

            <x-jet-input-error for="category_id" />
        </div>

        {{-- Subcategoría --}}
        <div>
            <x-jet-label value="Subcategories" />
            <select class="w-full form-control" wire:model="subcategory_id">
                <option value="" selected disabled>Select a subcategory</option>

                @foreach ($subcategories as $subcategory)
                    <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                @endforeach
            </select>

            <x-jet-input-error for="subcategory_id" />
        </div>
    </div>
    <div class="bg-white rounded-lg shadow-lg  grid grid-cols-2 gap-6 p-4 mb-4 h-28">
    {{-- name --}}
    <div class="mb-4">
        <x-jet-label value="Name" />
        <x-jet-input type="text" 
                    class="w-full"
                    wire:model="name"
                    placeholder="Enter business name" />
        <x-jet-input-error for="name" />
    </div>

    {{-- slug --}}
    <div class="mb-4">
        <x-jet-label value="Slug" />
        <x-jet-input type="text"
            disabled
            wire:model="slug"
            class="w-full bg-gray-200" 
            placeholder="Slug business" />

    <x-jet-input-error for="slug" />
    </div>
    </div>

    {{-- description --}}
    <div class="mb-4">
        <div wire:ignore>
            <x-jet-label value="Description" />
            <textarea class="w-full form-control" rows="4"
                wire:model="description"
                x-data 
                x-init="ClassicEditor.create($refs.miEditor)
                .then(function(editor){
                    editor.model.document.on('change:data', () => {
                        @this.set('description', editor.getData())
                    })
                })
                .catch( error => {
                    console.error( error );
                } );"
                x-ref="miEditor">
            </textarea>
        </div>
        <x-jet-input-error for="description" />
    </div>

    {{-- states, cities, counties --}}
    
    <div class="flex justify-center items-center bg-white rounded-lg shadow-lg gap-6 p-4 mb-4 h-28">
        {{-- states --}}
        <div class="flex-1">
            <x-jet-label value="States" />
            <select class="w-full form-control" wire:model="department_id">
                <option value="" selected disabled>Select a state</option>

                @foreach ($departments as $department)
                    <option value="{{$department->id}}">{{$department->name}}</option>
                @endforeach
            </select>

            <x-jet-input-error for="department_id" />
        </div>

         {{-- cities --}}
         <div class="flex-1">
            <x-jet-label value="Cities" />
            <select class="w-full form-control" wire:model="city_id">
                <option value="" selected disabled>Select a city</option>

                @foreach ($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            </select>

            <x-jet-input-error for="city_id" />
        </div>

         {{-- counties --}}
         <div class="flex-1">
            <x-jet-label value="Counties" />
            <select class="w-full form-control" wire:model="county_id">
                <option value="" selected disabled>Select a county</option>

                @foreach ($counties as $county)
                    <option value="{{$county->id}}">{{$county->name}}</option>
                @endforeach
            </select>

            <x-jet-input-error for="county_id" />
        </div>
    </div>

    {{-- business type && filling_number --}}
    
    <div class="grid grid-cols-2 bg-white rounded-lg shadow-lg gap-6 p-4 mb-4 h-28">
        {{-- business id --}}
        <div>
            <x-jet-label value="Filling Number" />
            <select class="w-full form-control" wire:model="business_id">
                <option value="" selected disabled>Select a filling number</option>

                @foreach ($businesses as $business)
                    <option value="{{$business->id}}">{{$business->name}}</option>
                @endforeach
            </select>

            <x-jet-input-error for="business_id" />
        </div>

        {{-- filling number --}}
        <div>
            <x-jet-label value="Business Type" />
            <x-jet-input type="text" 
                        class="w-full"
                        wire:model="filling_number"
                        placeholder="Enter business type" />
            <x-jet-input-error for="business_id" />
        </div>
    </div>

    <div class="flex mt-4">
        <x-jet-button
            wire:loading.attr="disabled"
            wire:target="save"
            wire:click="save"
            class="ml-auto">
            Create product
        </x-jet-button>
    </div>

</div>