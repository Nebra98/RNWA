@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Pragled države - ') }} {{ $drzava->country_name }} <a href="{{ route('posao.index') }}" class="btn btn-primary float-right">Natrag</a></div>

                    <div class="card-body">
                        <div class="form-group row col-md-9">
                            <p class="font-weight-bold">Oznaka države</p>

                            <div class="col-md-9">
                                <p>{{ $drzava->country_id }}</p>
                            </div>
                        </div>

                        <div class="form-group row col-md-5">
                            <p class="font-weight-bold">Naziv države</p>

                            <div class="col-md-9">
                                <p>{{ $drzava->country_name }}</p>
                            </div>
                        </div>

                        <div class="form-group row col-md-8">
                            <p class="font-weight-bold">ID Regije</p>

                            <div class="col-md-9">
                                <p>{{ $drzava->region_id }}</p>
                            </div>
                        </div>



                        <div class="form-group col-md-5">
                            <a type="button" class="btn btn-warning" href="{{ route('drzava.edit',$drzava->country_id) }}">Uredi državu</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
