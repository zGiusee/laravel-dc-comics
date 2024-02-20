<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;

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
        $request->validate([
            'title' => 'required|max:50|min:5',
            'description' => 'required|max:400|min:5',
            'thumb' => 'required|min:20',
            'price' => 'required|max:20',
            'series' => 'required|max:50',
            'sale_date' => 'required',
            'type' => 'required|max:30',
            'artists' => 'required',
            'writers' => 'required',
        ]);

        $form_data = $request->all();

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
        $request->validate([
            'title' => 'required|max:50|min:5',
            'description' => 'required|max:400|min:5',
            'thumb' => 'required|min:20',
            'price' => 'required|max:20',
            'series' => 'required|max:50',
            'sale_date' => 'required',
            'type' => 'required|max:30',
            'artists' => 'required',
            'writers' => 'required',
        ]);

        $form_data = $request->all();

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
}
