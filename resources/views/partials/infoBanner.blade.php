 <!-- INFO BANNER SECTION -->
 <div class="container banner-container">

     <div class="row justify-content-between">

         @foreach ($banner_infos as $item)
             <div class="col-2">
                 <div class="d-flex h-100 align-items-center justify-content-center">
                     <img src="{{ Vite::asset($item['img']) }}" alt="{{ $item['name'] }}">
                     <h5>{{ $item['name'] }}</h5>
                 </div>
             </div>
         @endforeach

     </div>

 </div>
