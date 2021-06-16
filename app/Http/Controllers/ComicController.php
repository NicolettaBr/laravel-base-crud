<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;

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
        
        $data = [
            'comics' => $comics
        ];
        return view('comics.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validazione
        $request->validate([
            'title' => 'required|min:3|max:20',
            'author' => 'required|min:3|max:20',
            'image' => 'required|max:255'
        ]);

        $form_data = $request->all();

        $comic = new Comic();

        //$comic->title = $form_data['title'];
        //$comic->author = $form_data['author'];
        //$comic->description = $form_data['description'];
        //$comic->image = $form_data['image'];

        $comic->fill($form_data);
        $comic->save();
        

        return redirect()->route('comics.show', [
            'comic' => $comic->id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::findOrFail($id);

        $data = [
            'comic' => $comic
        ];
        
        return view('comics.show', $data);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::findOrFail($id);
        
        $data = [
            'comic'=> $comic
        ];

        return view('comics.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validazione
        $request->validate([
            'title' => 'required|min:3|max:20',
            'author' => 'required|min:3|max:20',
            'image' => 'required|max:255'
        ]);

        $form_data = $request->all();
        //dd($form_data);

        //Trovo l' istanza per id da modificare 
        $comic_edited = Comic::find($id);
        //Controller manda il dato modificato al Model per salvarlo nel DB
        $comic_edited->update($form_data);

        return redirect()->route('comics.show', [
            'comic' => $comic_edited->id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
