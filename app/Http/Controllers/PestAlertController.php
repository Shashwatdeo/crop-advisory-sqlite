<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PestAlertController extends Controller
{
    public function index()
    {
        return view('pest_alerts.index');
    }
}
