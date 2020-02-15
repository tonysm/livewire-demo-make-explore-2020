<?php

namespace App\Http\Controllers;

use App\Organisation;
use Illuminate\Http\Request;

class OrganisationController extends Controller
{
    public function index()
    {
        return view('organisations.index', [
            'organisations' => Organisation::query()->latest()->paginate(),
        ]);
    }
}
