<?php

namespace App\Http\Controllers;

use App\Organisation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    public function store(Request $request)
    {
        Organisation::create($request->validate([
            'name' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', Rule::in(['US', 'BE', 'BR'])],
            'postal_code' => ['required', 'string', 'max:255'],
            'contact_name' => ['required', 'string', 'max:255'],
            'contact_email' => ['required_without:contact_phone', 'email', 'max:255'],
            'contact_phone' => ['required_without:contact_email', 'string', 'max:255'],
        ]));

        return redirect()->route('organisations.index')->with('status', 'Organisation was successfully created!');
    }
}
