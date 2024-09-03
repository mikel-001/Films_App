<?php

namespace App\Http\Controllers;

use App\Models\ListFilms;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ListFilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $films = ListFilms::paginate(5);
        return view('films.index', ['films' => $films]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = new Client([
            'verify' => false,
        ]);
    
        $url = "https://api.themoviedb.org/3/movie/popular?api_key=dd8596e812aa1ea865a8c164dc2c0836";
        
        try {
            $response = $client->request('GET', $url);
            $data = json_decode($response->getBody()->getContents(), true);
    
            
            $films = $data['results'];
    
            
            foreach ($films as $film) {
                ListFilms::updateOrCreate(
                    ['title' => $film['title']],
                    [
                        'film_id' => $film['id'],
                        'original_language' => $film['original_language'],
                        'release_date' => $film['release_date'],
                        'overview' => $film['overview'],
                    ]
                );
            }
    
            
    
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ListFilms $film)
    {
        //
        return view("films.show", ['film' => $film]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ListFilms $listFilms)
    {
        //
        return view("films.edit");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ListFilms $listFilms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ListFilms $film)
    {
        //

        $film->delete();
        return redirect()->route('films.index');
    }
}
