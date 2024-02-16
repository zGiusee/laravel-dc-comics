<header>

    {{-- TOP INFO SECTION MINI BANNER --}}
    <div class="top-info-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="d-flex justify-content-end  list-unstyled m-0">
                        <li class="px-2 "><a href="#">DC POWER&#8480; VISA&reg; </a></li>
                        <li class="px-2 "><a href="#">ADDITIONAL DC SITES</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row py-3">

            <!-- HEADER LEFT SIDE (LOGO) -->
            <div class="col-3">
                <div class=" d-flex align-items-center h-100">
                    <img class="logo" src="{{ Vite::asset('resources/img/dc-logo.png') }}" alt="">
                </div>
            </div>


            <!-- HEADER RIGHT SIDE (LIST) -->
            <div class="col-9">
                <div class="header-list-container">

                    <ul>
                        @foreach ($header_links as $link)
                            <li class="{{ Route::currentRouteName() === $link['url'] ? 'active' : '' }}">
                                <a href="{{ $link['url'] }}">{{ $link['name'] }}</a>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>

        </div>
    </div>

</header>
