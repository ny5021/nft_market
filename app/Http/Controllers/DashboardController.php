<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Nft;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function getUsers()
    {
        $data = ['users' => User::all()];
        return view('dashboard.users.index', $data);
    }

    public function getNft()
    {
        $data = [
            'nfts' => Nft::all(),
            'categories' => Category::all(),
            'users' => User::all()
        ];
        return view('dashboard.nft.index', $data);
    }
}
