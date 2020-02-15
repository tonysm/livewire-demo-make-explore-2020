<?php

namespace App\Http\Controllers;

use App\Organisation;

class OrganisationController extends Controller
{
    public function index()
    {
        return view('organisations.index', [
            'organisations' => Organisation::query()->latest()->paginate(),
        ]);
    }

    public function create()
    {
        return view('organisations.create');
    }
}
