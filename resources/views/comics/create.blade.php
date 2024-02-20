@extends('layout.base')

@section('content')
    <form action="{{ route('comics.store') }}" method="post">
        @csrf

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

                    <div class="col-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li> {{ $error }} </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    {{-- TILE AND STOCKS INFO --}}
                    <div class="col-8 comic-info-container">
                        <!-- COMIC INFOS -->
                        <div>
                            <label for="title" class="d-block">Title:</label>
                            <input required class="w-75" type="text" id="title" name="title"
                                value="{{ @old('title') }}">
                        </div>

                        <!-- IMG -->
                        <div class="mt-4">
                            <label for="thumb" class="d-block">Image:</label>
                            <input required class="w-75" type="text" id="thumb" name="thumb"
                                value="{{ @old('thumb') }}">
                        </div>

                        {{-- COMIC TYPE --}}
                        <div class="mt-4">
                            <label for="type" class="d-block">Comic type:</label>
                            <input required class="w-50" type="text" id="type" name="type"
                                value="{{ @old('type') }}">
                        </div>

                        {{-- COMICS DESCRIPTION --}}
                        <div class="mt-4">
                            <label for="description" class="d-block">Description:</label>
                            <textarea required rows="10" cols="60" id="description" name="description">
                                    {{ @old('description') }}
                            </textarea>
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
                                                    <textarea required class="mx-2" rows="5" cols="45" id="artists" name="artists">
                                                        {{ old('artists') }}
                                                    </textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td-index">Written by:</td>
                                                <td>
                                                    <textarea required class="mx-2" rows="5" cols="45" id="writers" name="writers">
                                                        {{ @old('writers') }}
                                                    </textarea>
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
                                                    <input required class="w-75" type="text" name="series"
                                                        id="series" value="{{ @old('series') }}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td-index">U.S. Price:</td>
                                                <td>
                                                    <input required type="text" name="price" id="price"
                                                        value="{{ @old('price') }}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td-index">On Sale Date:</td>
                                                <td>
                                                    <input required class="w-50" type="date" name="sale_date"
                                                        id="sale_date" value="{{ @old('sale_date') }}">
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
