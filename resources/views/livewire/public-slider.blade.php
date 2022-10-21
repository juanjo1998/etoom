<div id="carouselExampleSlidesOnly" class="carousel slide relative cursor-pointer" data-bs-ride="carousel">
  <div class="carousel-inner relative w-full overflow-hidden" style="height: 400px;">

    {{-- {{ $mergePremium }} --}}   

    @if ($mergePremium)    
      {{-- publicitarias de la pagina --}}
        @foreach ($mergePremium->shuffle() as $mP)   
               
          <div class="carousel-item {{ $loop->first ? 'active' : '' }} relative float-left w-full">
             <a 
             @if ($mP->route == '')
              wire:click="emptySlide"
             @else
                href="{{ $mP->route }}"
             @endif
             >
                <img
                src="{{ Storage::url($mP->url) }}"
                class="
                block 
                w-full 
                object-cover 
                object-center 
                img-slide"
                alt="img slider"
              />
             </a>
          </div>
          
        @endforeach

    @endif       
  </div>
</div>


