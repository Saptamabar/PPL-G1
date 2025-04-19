<?php

namespace App\Http\Controllers;

use App\Models\Anggrek;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function products()
    {
        $featuredProducts = Anggrek::latest()->paginate(4);
        $featuredarticles = Article::latest()->paginate(3);
        return view('Company_Profile.home', compact('featuredProducts','featuredarticles'));
    }
}
