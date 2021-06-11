@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Pragled posla - ') }} {{ $posao->job_title }} <a href="{{ route('posao.index') }}" class="btn btn-primary float-right">Natrag</a></div>

                    <div class="card-body">
                        <div class="form-group row col-md-5">
                            <p class="font-weight-bold">Naziv posla</p>

                            <div class="col-md-9">
                                <p>{{ $posao->job_title }}</p>
                            </div>
                        </div>

                        <div class="form-group row col-md-8">
                            <p class="font-weight-bold">Minimalna plaća</p>

                            <div class="col-md-9">
                                <p>{{ $posao->min_salary }}</p>
                            </div>
                        </div>

                        <div class="form-group row col-md-8">
                            <p class="font-weight-bold">Maksimalna plaća</p>

                            <div class="col-md-9">
                                <p>{{ $posao->max_salary }}</p>
                            </div>
                        </div>

                        <div class="form-group col-md-5">
                            <a type="button" class="btn btn-warning" href="{{ route('posao.edit',$posao->job_id) }}">Uredi posao</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
