@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Pragled lokacije - ') }} {{ $lokacija->street_address }} <a href="{{ route('lokacija.index') }}" class="btn btn-primary float-right">Natrag</a></div>

                    <div class="card-body">
                        <div class="form-group row col-md-8">
                            <p class="font-weight-bold">Adresa ulice</p>

                            <div class="col-md-9">
                                <p>{{ $lokacija->street_address }}</p>
                            </div>
                        </div>

                        <div class="form-group row col-md-8">
                            <p class="font-weight-bold">Poštanski broj</p>

                            <div class="col-md-9">
                                <p>{{ $lokacija->postal_code }}</p>
                            </div>
                        </div>

                        <div class="form-group row col-md-8">
                            <p class="font-weight-bold">Grad</p>

                            <div class="col-md-9">
                                <p>{{ $lokacija->city }}</p>
                            </div>
                        </div>


                        <div class="form-group row col-md-8">
                            <p class="font-weight-bold">Državna pokrajina</p>

                            <div class="col-md-9">
                                <p>{{ $lokacija->state_province }}</p>
                            </div>
                        </div>

                        <div class="form-group row col-md-8">
                            <p class="font-weight-bold">Oznaka države</p>

                            <div class="col-md-9">
                                <p>{{ $lokacija->country_id }}</p>
                            </div>
                        </div>


                        <div class="form-group col-md-8">
                            <a type="button" class="btn btn-warning" href="{{ route('lokacija.edit',$lokacija->location_id) }}">Uredi lokaciju</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
