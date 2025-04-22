<?php

namespace App\Http\Controllers;

use App\Models\Anggrek;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Anggrek::latest()->paginate(4);
        $featuredarticles = Article::latest()->paginate(3);
        return view('Company_Profile.home', compact('featuredProducts','featuredarticles'));
    }

    public function Artikel(Request $request)
    {
        $query = $request->input('query');
        if($query !== null){

            return $this->search($query);
        }
        $articles = Article::latest()->paginate(6);

        return view('Company_Profile.Artikel',compact('articles'));
    }

    public function search($query)
    {

        $articles = Article::where('title', 'like', "%$query%")
            ->with('user')
            ->latest()
            ->paginate(6);

        return view('Company_Profile.Artikel', [
            'articles' => $articles,
            'searchQuery' => $query
        ]);
    }

    public function Artikelshow($id)
     {
        $article = Article::findOrFail($id);
        return view('Company_Profile.showartikel',compact('article'));
    }

    public function anggreks(Request $request)
    {
        $query = $request->input('query');
        if($query !== null){
            return $this->searchanggrek($query);
        }
        $anggreks = Anggrek::latest()->paginate(8);
        return view('Company_Profile.products',compact('anggreks'));
    }

    public function anggrekshow($id)
    {
        $anggrek = Anggrek::findorFail($id);
        return view('Company_Profile.showproduct',compact('anggrek'));
    }

    public function searchanggrek($query)
    {
        $anggrek = Anggrek::where('nama_anggrek', 'like', "%$query%")
        ->latest()
        ->paginate(8);


        return view('Company_Profile.products', [
            'anggreks' => $anggrek,
            'searchQuery' => $query
        ]);

    }
}
