
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Uredi lokaciju') }} <a href="{{ route('lokacija.index') }}" class="btn btn-primary float-right">Natrag</a></div>

                    <div class="card-body">

                        <form action="{{ route('lokacija.update', $lokacija->location_id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group col-md-5">
                                <label for="name">Adresa ulice </label>
                                <input type="text" class="form-control" id="street_address" name="street_address" value="{{ $lokacija->street_address }}" placeholder="Ovdje unesite adresu ulice">
                            </div>

                            <div class="form-group col-md-5">
                                <label for="name">Poštanski broj</label>
                                <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ $lokacija->postal_code }}" placeholder="Ovdje unesite poštanski broj">
                            </div>

                            <div class="form-group col-md-5">
                                <label for="name">Grad</label>
                                <input type="text" class="form-control" id="city" name="city" value="{{ $lokacija->city }}" placeholder="Ovdje unesite grad">
                            </div>

                            <div class="form-group col-md-5">
                                <label for="name">Državna pokrajina</label>
                                <input type="text" class="form-control" id="state_province" name="state_province" value="{{ $lokacija->state_province }}" placeholder="Ovdje unesite državnu pokrajinu">
                            </div>

                            <div class="form-group col-md-5">
                                <label for="name">ID države</label>

                                <select class="form-select" name="country_id" id="country_id" aria-label="Default select example">

                                    @foreach($drzave as $drzava)
                                        @if($drzava->country_id == $lokacija->country_id)
                                            <option value="{{ $drzava->country_id }}" selected> {{ $drzava->country_name }} </option>
                                        @endif

                                        <option value="{{ $drzava->country_id }}">{{ $drzava->country_name }}</option>
                                    @endforeach

                                </select>

                            </div>

                            <div class="form-group col-md-5">
                                <button type="submit" class="btn btn-primary">Uredi lokaciju</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
