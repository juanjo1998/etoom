@php
  use App\Models\User;

  $user = new User();
@endphp

@if (!$mergePremium->count() <= 0)    
  <div id="carouselExampleSlidesOnly" class="carousel slide relative cursor-pointer" data-bs-ride="carousel">
    <div class="carousel-inner relative w-full overflow-hidden">      
        {{-- publicitarias de la pagina --}}
        @foreach ($mergePremium->shuffle() as $mP)   
          @if ($user::where('id',$mP->user_id)->get()->first()->subscribed('Prueba premium') 
          || $user::where('id',$mP->user_id)->get()->first()->hasRole('admin'))
                    
            <div class="carousel-item {{ $loop->first ? 'active' : '' }} relative float-left w-full" style="height: 400px;">
              <a 
              @if ($mP->route == '')
                wire:click="emptySlide"
              @else
                  href="{{ $mP->route }}"
              @endif
              >
                  <img
                  style="height: 100%"
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
                
          @endif
        @endforeach
    </div>
  </div>
@endif       


