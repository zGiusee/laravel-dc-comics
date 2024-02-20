@extends('layout.base')

@section('content')
    <div class="jumbo-container">
        <div class="blue-jumbo-bar">
            <div class="detail-img-container">
                <img src="{{ $comic['thumb'] }}" alt="{{ $comic['title'] }}">
            </div>
        </div>
    </div>

    <div class="py-5 mt-2">
        <div class="my-container-lg">
            <div class="row">

                <div class="col-12 d-flex ">
                    <a class="default-btn" href="{{ route('comics.edit', ['comic' => $comic['id']]) }}">Edit comic</a>
                    <form class=" mx-3" action="{{ route('comics.destroy', ['comic' => $comic['id']]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger rounded-0 text-uppercase">Delete
                            comic</button>
                    </form>
                </div>

                {{-- TILE AND STOCKS INFO --}}
                <div class="col-8 mt-4 comic-info-container">
                    <!-- COMIC INFOS -->
                    <div>
                        <h1>{{ $comic['title'] }}</h1>
                    </div>

                    {{-- PRICE AND STOCK --}}
                    <div class="stock-price-container">
                        <div class="row align-items-center">
                            <div class="col-8 pr-0 d-flex justify-content-between">

                                {{-- PRICE --}}
                                <div class="p-2 py-3 ml-2">
                                    <span class="my-light-green fw-bold">U.S.
                                        Price:
                                    </span>
                                    <span class=" fw-bold text-white">
                                        {{ $comic['price'] }}
                                    </span>
                                </div>

                                {{-- STOCK --}}
                                <div class="my-border-black-r py-3 px-3">
                                    <span class="my-light-green fw-bold">AVAILABLE</span>
                                </div>
                            </div>

                            {{-- CHECK STOCK --}}
                            <div class="col-4 pl-0 text-white text-center">
                                <span class="fw-bold">Check Availability &#9662</span>
                            </div>
                        </div>
                    </div>

                    {{-- COMICS DESCRIPTION --}}
                    <div class="mt-4">
                        <p> {{ $comic['description'] }}</p>
                    </div>

                </div>

                {{-- ADVERTISEMENT --}}
                <div class="col-4">
                    {{-- ADV --}}
                    <div class="adv-container">
                        <div class="text-end mb-1">ADVERTISEMENT</div>
                        <div>
                            <a href="#">
                                <img src="{{ Vite::asset('/resources/img/adv.jpg') }}" alt="">ì
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- TABLES --}}
    <div class="py-5 my-bg-grey">
        <div class="my-container-lg">
            <div class="row">
                {{-- TALENT AND SPECS --}}
                <div class="col-12">
                    <div class="talent-specs-container">
                        <div class="row">

                            {{-- TALENT --}}
                            <div class="col-6">
                                <div class="table-container">
                                    <h5>Talent</h5>
                                    <table>
                                        <tr>
                                            <td class="td-index">Art by:</td>
                                            <td>
                                                @foreach ($artists as $artist)
                                                    <span class="my-blue">{{ $artist . ',' }}</span>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="td-index">Written by:</td>
                                            <td>
                                                @foreach ($writers as $writer)
                                                    <span class="my-blue">{{ $writer . ',' }}</span>
                                                @endforeach
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            {{-- SPECS --}}
                            <div class="col-6">

                                <div class="table-container">
                                    <h5>Specs</h5>
                                    <table>
                                        <tr>
                                            <td class="td-index">Series:</td>
                                            <td>
                                                <a href="#">{{ $comic['series'] }}</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="td-index">U.S. Price:</td>
                                            <td>
                                                {{ $comic['price'] }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="td-index">On Sale Date:</td>
                                            <td>
                                                {{ $comic['sale_date'] }}
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
