<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SlackishController extends Controller
{
    public function index()
    {
        return view('slackish.index');
    }
}
