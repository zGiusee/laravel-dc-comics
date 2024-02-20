<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use Illuminate\Support\Facades\Validator;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $comics = Comic::all();
        $socials = config('footer_socials');
        $header_links = config('header_links');
        $footer_lists = config('footer_list');
        $banner_infos = config('banner_infos');
        return view('comics.index', compact('comics', 'socials', 'header_links', 'footer_lists', 'banner_infos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $socials = config('footer_socials');
        $header_links = config('header_links');
        $footer_lists = config('footer_list');
        $banner_infos = config('banner_infos');

        return view('comics.create', compact('socials', 'header_links', 'footer_lists', 'banner_infos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $this->validation($request->all());

        $comic = new Comic();

        $comic->title = $form_data['title'];
        $comic->description = $form_data['description'];
        $comic->thumb = $form_data['thumb'];
        $comic->price = $form_data['price'];
        $comic->series = $form_data['series'];
        $comic->sale_date = $form_data['sale_date'];
        $comic->type = $form_data['type'];
        $comic->artists = json_encode(explode(',', $form_data['artists']));
        $comic->writers = json_encode(explode(',', $form_data['writers']));

        $comic->save();

        return redirect()->route('comics.show', ['comic' => $comic]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        $socials = config('footer_socials');
        $header_links = config('header_links');
        $footer_lists = config('footer_list');
        $banner_infos = config('banner_infos');
        $artists = json_decode($comic['artists']);
        $writers = json_decode($comic['writers']);

        return view('comics.show', compact('comic', 'socials', 'header_links', 'footer_lists', 'banner_infos', 'artists', 'writers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        $socials = config('footer_socials');
        $header_links = config('header_links');
        $footer_lists = config('footer_list');
        $banner_infos = config('banner_infos');
        $artists = json_decode($comic['artists']);
        $writers = json_decode($comic['writers']);

        return view('comics.edit', compact('comic', 'socials', 'header_links', 'footer_lists', 'banner_infos', 'artists', 'writers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $comic)
    {
        $form_data = $this->validation($request->all());

        $comic = Comic::find($comic);

        $comic->title = $form_data['title'];
        $comic->description = $form_data['description'];
        $comic->thumb = $form_data['thumb'];
        $comic->price = $form_data['price'];
        $comic->series = $form_data['series'];
        $comic->sale_date = $form_data['sale_date'];
        $comic->type = $form_data['type'];
        $comic->artists = json_encode(explode(',', $form_data['artists']));
        $comic->writers = json_encode(explode(',', $form_data['writers']));

        $comic->update();

        return redirect()->route('comics.show', ['comic' => $comic]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($comic)
    {
        $comic = Comic::find($comic);
        $comic->delete();
        return redirect()->route('comics.index');
    }

    private function validation($data)
    {
        $validator = Validator::make(
            $data,
            [
                'title' => 'required|max:50|min:5',
                'description' => 'required|max:400|min:5',
                'thumb' => 'required|min:20',
                'price' => 'required|max:20',
                'series' => 'required|max:50',
                'sale_date' => 'required',
                'type' => 'required|max:30',
                'artists' => 'required',
                'writers' => 'required',

            ],
            [
                'title.required' => 'Il titolo è obbligatorio!',
                'title.max' => 'Il titolo deve essere al massimo di 50 caratteri!',
                'title.min' => 'Il titolo deve essere lungo almeno 5 caratteri!',
                'description.required' => 'La descrizione è obbligatoria!',
                'description.max' => 'La descrizione deve essere al massimo di 400 caratteri!',
                'description.min' => 'La descrizione deve essere lunga almeno 5 caratteri!',
                'thumb.required' => 'L\'immagine è obbligatoria!',
                'thumb.min' => 'Il link dell\'immagine deve essere lunga almeno 20 caratteri!',
                'price.required' => 'Il prezzo è obbligatorio!',
                'price.max' => 'Il prezzo deve essere al massimo di 20 caratteri!',
                'series.required' => 'Il nome della serie è obbligatorio!',
                'series.max' => 'Il nome della serie deve essere al massimo di 50 caratteri!',
                'sale_date.required' => 'La data è obbligatoria!',
                'type.required' => 'La tipologia del fumetto è obbligatoria!',
                'type.max' => 'La tipologia del fumetto deve essere al massimo di 30 caratteri!',
                'artists.required' => 'I nomi degli artisti sono obbligatori!',
                'writers.required' => 'I nomi degli scrittori sono obbligatori!',

            ]
        )->validate();

        return $validator;
    }
}
