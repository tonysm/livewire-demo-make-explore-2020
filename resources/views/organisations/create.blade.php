@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="{{ route('organisations.index') }}">Organisations</a> / Create Organisation</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('organisations.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nameField">Organisation Name</label>
                            <input type="text" name="name" class="form-control {{ $errors->first('name', 'is-invalid') }}" id="nameField">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="cityField">City</label>
                                    <input type="text" name="city" class="form-control {{ $errors->first('city', 'is-invalid') }}" id="cityField">
                                    @error('city')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="countryField">Country</label>
                                    <select class="custom-select {{ $errors->first('country', 'is-invalid') }}" name="country" id="countryField">
                                        <option selected>Select the country</option>
                                        <option value="US">United States</option>
                                        <option value="BR">Brazil</option>
                                        <option value="BE">Belgium</option>
                                    </select>
                                    @error('country')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="postalCodeField">Postal Code</label>
                                    <input type="text" name="postal_code" class="form-control {{ $errors->first('postal_code', 'is-invalid') }}" id="postalCodeField">
                                    @error('postal_code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="contactNameField">Contact Name</label>
                                    <input type="text" name="contact_name" class="form-control {{ $errors->first('contact_name', 'is-invalid') }}" id="contactNameField" aria-describedby="contactNameHelp">
                                    <small id="contactNameHelp" class="form-text text-muted">Who should we look for when contacting the organisation?</small>
                                    @error('contact_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="emailField">Contact E-mail Address</label>
                                    <input type="email" name="contact_email" class="form-control {{ $errors->first('contact_email', 'is-invalid') }}" id="emailField" aria-describedby="emailHelp">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    @error('contact_email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="contactPhoneField">Contact Phone Number</label>
                                    <input type="phone" name="contact_phone" class="form-control {{ $errors->first('contact_phone', 'is-invalid') }}" id="contactPhoneField" aria-describedby="contactPhoneHelp">
                                    <small id="contactPhoneHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
                                    @error('contact_phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
