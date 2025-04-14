<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CropSuggestionController extends Controller
{
    public function index()
    {
        return view('crop_suggestions.index');
    }
}
