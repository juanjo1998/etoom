<div id="carouselExampleSlidesOnly" class="carousel slide relative" data-bs-ride="carousel">
  <div class="carousel-inner relative w-full overflow-hidden">

    {{ $mergePremium }}

    <p class="text-red-200">{{ $condicion }}</p>

    @if ($mergePremium)    
      {{-- publicitarias de la pagina --}}
        @foreach ($mergePremium->shuffle() as $mP)        
        
          <div class="carousel-item {{ $loop->first ? 'active' : '' }} relative float-left w-full">
             <a href="{{ $mP->route }}">
                <img
                src="{{ Storage::url($mP->url) }}"
                class="block w-full h-96 object-cover object-center"
                alt="img slider"
              />
             </a>
          </div>
        @endforeach

    @endif     
    
  
      
   {{--  <div class="carousel-item active relative float-left w-full">
      <img
        src="https://mdbcdn.b-cdn.net/img/new/slides/041.webp"
        class="block w-full h-96 object-cover"
        alt="img slider"
      />
    </div>

    <div class="carousel-item relative float-left w-full">
      <img
        src="https://mdbcdn.b-cdn.net/img/new/slides/042.webp"
        class="block w-full h-96 object-cover"
        alt="Camera"
      />
    </div>
    <div class="carousel-item relative float-left w-full">
      <img
        src="https://mdbcdn.b-cdn.net/img/new/slides/043.webp"
        class="block w-full h-96 object-cover"
        alt="Exotic Fruits"
      />
    </div> --}}


    {{-- <div class="carousel-item relative float-left w-full">
      <img
        src="https://mdbcdn.b-cdn.net/img/new/slides/042.webp"
        class="block w-full"
        alt="Camera"
      />
    </div>
    <div class="carousel-item relative float-left w-full">
      <img
        src="https://mdbcdn.b-cdn.net/img/new/slides/043.webp"
        class="block w-full"
        alt="Exotic Fruits"
      />
    </div> --}}
  </div>
</div>


