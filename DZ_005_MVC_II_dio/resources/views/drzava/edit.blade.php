
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Uredi državu') }} <a href="{{ route('drzava.index') }}" class="btn btn-primary float-right">Natrag</a></div>

                    <div class="card-body">

                        <form action="{{ route('drzava.update', $drzava->country_id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group col-md-5">
                                <label for="name">Id države (skraćenica)</label>
                                <input type="text" class="form-control" id="country_id" name="country_id" value="{{ $drzava->country_id }}" disabled placeholder="Ovdje unesite id države (skraćenica)">
                            </div>

                            <div class="form-group col-md-5">
                                <label for="name">Naziv države</label>
                                <input type="text" class="form-control" id="country_name" name="country_name" value="{{ $drzava->country_name }}" placeholder="Ovdje unesite naziv države">
                            </div>

                            <div class="form-group col-md-5">
                                <label for="name">ID regije</label>

                                <select class="form-select" name="region_id" id="region_id" aria-label="Default select example">

                                    @foreach($regije as $regija)
                                        @if($regija->region_id == $drzava->region_id)
                                            <option value="{{ $regija->region_id }}" selected> {{ $regija->region_name }} </option>
                                        @endif

                                        <option value="{{ $regija->region_id }}">{{ $regija->region_name }}</option>
                                    @endforeach

                                </select>

                            </div>

                            <div class="form-group col-md-5">
                                <button type="submit" class="btn btn-primary">Uredi državu</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
