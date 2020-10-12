<?php

namespace App\Http\Controllers;

use App\Song;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SongController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Song::latest()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
          'mp3.base64mp3' => "The audio must be a file of type: mp3."
        ];

        $request->validate([
            'title'=>'required',
            'mp3' => 'required|base64mp3'
        ], $messages);

        if ($request->input('mp3')) {
            $name = time().'.' . 'mp3';
            file_put_contents('audio/songs/'.$name, base64_decode($request->input('mp3')));
        }

        $song = new Song([
            'title' => $request->get('title'),
            'slug' => Str::slug($request->get('title'), '-'),
            'user_id' => auth()->user()->id,
            'mp3' => $name
        ]);

        $song->save();

        return ['message' => 'Song Created!'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        return Response::json($song);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song)
    {
        // $request->validate([
        //     'title'=>'required',
        //     'mp3'=>'required|mimes:audio/mp3',
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        $song->destroy($song->id);
        
        return ['message' => 'Song Deleted!'];
    }
}
