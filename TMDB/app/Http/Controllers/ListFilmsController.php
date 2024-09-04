<?php

namespace App\Http\Controllers;

use App\Models\ListFilms;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ListFilmsController extends Controller
{
    /**
     * index pour recuperer et lister les films
     */
    public function index()
    {
        $films = ListFilms::paginate(5);
        return view('films.index', ['films' => $films]);
    }

    /**
     * la redirection vers la page create
     */
    public function create()
    {
        //
        return view("films.create");
    }

    /**
     * store pour le stockage d'un film 
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
                "film_id"=>"required|numeric|unique:list_films,film_id",
                "original_language"=>"required|",
                "title"=>"required|",
                "release_date"=>"required|date",
                "overview"=>"required|",
        ]);

        ListFilms::create($validation);
 
        return redirect()->route('films.index');


     
    }

    /**
     * la redirection vers la page de detaille 
     */
    public function show(ListFilms $film)
    {
        //
        return view("films.show", ['film' => $film]);
    }

    /**
     * la redirection vers la page de modification
     */
    public function edit(ListFilms $film)
    {
        //
        return view("films.edit",['film' => $film]);
    }

    /**
     * la methode update pour modifier les donnes d'un film
     */
    public function update(Request $request, ListFilms $film)
    {
        //
        $validation = $request->validate([
            "film_id"=>"required|numeric",
            "original_language"=>"required|",
            "title"=>"required|",
            "release_date"=>"required|date",
            "overview"=>"required|",
        ]);

        $film->update($validation);

    return redirect()->route('films.index');
    }

    /**
     * la methode de suppression d'un film
     */
    public function destroy(ListFilms $film)
    {
        //

        $film->delete();

    
    return redirect()->route('films.index');
    }


    /**
     * la methode store_Api pour recuperer les donner depuit l'Api et stocker dans la base de donnes
     */
    public function store_APi(){
    
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
            return response()->json([
                "message de succes" => "les films sont stockes dans la base des donnees avec succes"
            ]);
    
            
    
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    /**
     * la methode search pour la chercher des film apartir de la langue originale ou le titre puis lister
     */
    public function search(Request $request){
        $query = ListFilms::query();

        if ($search = $request->query('search')) {
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('original_language', 'like', "%{$search}%");
        }

        $films = $query->paginate(7);

        return view('films.index', ['films' => $films]);

    }
}
