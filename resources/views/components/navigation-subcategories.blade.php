@props(['category'])

<div class="grid grid-cols-4 p-4  h-full">

    <div class="h-full">
        <p class="text-lg text-gray-600 font-semibold text-center mb-3">Subcategories</p>
        <ul>
            @foreach ($category->subcategories as $subcategory)
                <li>
                    <a href="{{route('categories.show', $category)}}" class="text-sm text-gray-500 font-semibold text-center py-1 px-4 hover:text-indigo-700">
                        {{$subcategory->name}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="col-span-3">
        <img class="h-64 w-full object-cover object-center" src="{{Storage::url($category->image)}}" >
    </div>
</div>