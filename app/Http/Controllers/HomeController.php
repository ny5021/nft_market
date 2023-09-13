<?php

namespace App\Http\Controllers;

use App\Models\Nft;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $nfts = Nft::where('proprietaire_id', Auth::id())->where('for_sale',0)->get();
        return view('home', compact('nfts','categories'));
    }
}
