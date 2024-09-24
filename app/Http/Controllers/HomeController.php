<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $subjects = Subject::orderBy('name', 'ASC')->get();
        return view('pages.home')->with(compact('subjects'));
    }
}
