<?php

namespace App\Http\Livewire;

use App\Organisation;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CreateOrganisation extends Component
{
    public $name;
    public $city;
    public $country;
    public $postal_code;
    public $contact_name;
    public $contact_email;
    public $contact_phone;

    private function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', Rule::in(['US', 'BE', 'BR'])],
            'postal_code' => ['required', 'string', 'max:255'],
            'contact_name' => ['required', 'string', 'max:255'],
            'contact_email' => ['required_without:contact_phone', 'email', 'max:255'],
            'contact_phone' => ['required_without:contact_email', 'string', 'max:255'],
        ];
    }

    public function store()
    {
        Organisation::create($this->validate($this->rules()));

        flash('Organisation was sucessfully created!');

        return redirect()
            ->route('organisations.index');
    }

    public function render()
    {
        return view('livewire.create-organisation');
    }
}
