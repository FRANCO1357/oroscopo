<?php

namespace App\Http\Controllers;

use App\Models\Horoscope;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $horoscopes = Horoscope::paginate(10);
        
        return view('admin.home', compact('horoscopes'));
    }
}
