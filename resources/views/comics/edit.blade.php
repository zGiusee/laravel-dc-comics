@extends('layout.base')

@section('content')
    <form action="{{ route('comics.update', ['comic' => $comic['id']]) }}" method="post">
        @csrf
        @method('PUT')

        <div class="jumbo-container">
            <div class="blue-jumbo-bar">
                <div class="title-container">
                    <h1 class="text-white fw-bold">Add Comics</h1>
                </div>
            </div>
        </div>

        <div class="py-5 mt-2">
            <div class="my-container-lg">
                <div class="row">
                    {{-- TILE AND STOCKS INFO --}}
                    <div class="col-8 comic-info-container">
                        <!-- COMIC INFOS -->
                        <div>

                            <label for="title" class="d-block">Title:</label>
                            <input required class="w-75 @error('title') my-is-invalid @enderror" type="text"
                                id="title" name="title" value="{{ $comic['title'] }}">
                            @error('title')
                                <div class="mt-1 text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- IMG -->
                        <div class="mt-4">
                            <label for="thumb" class="d-block">Image:</label>
                            <input required class="w-75 @error('thumb') my-is-invalid @enderror" type="text"
                                id="thumb" name="thumb" value="{{ $comic['thumb'] }}">
                            @error('thumb')
                                <div class="mt-1 text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- COMIC TYPE --}}
                        <div class="mt-4">
                            <label for="type" class="d-block">Comic type:</label>
                            <input required class="w-50 @error('type') my-is-invalid @enderror" type="text"
                                id="type" name="type" value="{{ $comic['type'] }}">
                            @error('type')
                                <div class="mt-1 text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- COMICS DESCRIPTION --}}
                        <div class="mt-4">
                            <label for="description"
                                class=" @error('description') my-is-invalid @enderror d-block">Description:</label>
                            <textarea required rows="10" cols="60" id="description" name="description">
                                {{ $comic['description'] }}
                            </textarea>
                            @error('description')
                                <div class="mt-1 text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
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
                                                    <textarea required class="mx-2 @error('artits') my-is-invalid @enderror" rows="5" cols="45" id="artists"
                                                        name="artists">
                                                        {{ implode(',', $artists) }}       
                                                    </textarea>
                                                    @error('artists')
                                                        <div class="mt-1 text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td-index">Written by:</td>
                                                <td>
                                                    <textarea required class="mx-2 @error('writers') my-is-invalid @enderror" rows="5" cols="45" id="writers"
                                                        name="writers">
                                                       {{ implode(',', $writers) }}                             
                                                    </textarea>
                                                    @error('writers')
                                                        <div class="mt-1 text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
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
                                            {{-- SERIES --}}
                                            @error('series')
                                                <div class="mt-1 text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <tr>
                                                <td class="td-index">Series:</td>
                                                <td>
                                                    <input required class="w-75 @error('series') my-is-invalid @enderror"
                                                        type="text" name="series" id="series"
                                                        value="{{ $comic['series'] }}">
                                                </td>
                                            </tr>
                                            {{-- US PRICE --}}
                                            @error('price')
                                                <div class="mt-1 text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <tr>
                                                <td class="td-index">U.S. Price:</td>
                                                <td>
                                                    <input class="@error('price') my-is-invalid @enderror" required
                                                        type="text" name="price" id="price"
                                                        value="{{ $comic['price'] }}">
                                                </td>
                                            </tr>
                                            {{-- SALE DATE --}}
                                            @error('sale_date')
                                                <div class="mt-1 text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <tr>
                                                <td class="td-index">On Sale Date:</td>
                                                <td>
                                                    <input class="@error('sale_date') my-is-invalid @enderror w-50" required
                                                        type="date" name="sale_date" id="sale_date"
                                                        value="{{ $comic['sale_date'] }}">
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

        <div class="text-center m-5">
            <button type="submit" class="default-btn"> Aggiungi Comic</button>
        </div>
    </form>
@endsection
