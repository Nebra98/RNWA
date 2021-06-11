
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Unesi novi posao') }} <a href="{{ route('posao.index') }}" class="btn btn-primary float-right">Natrag</a></div>

                    <div class="card-body">

                        <form action="{{ route('posao.store') }}" method="POST">
                            @csrf

                            <div class="form-group col-md-5">
                                <label for="name">Id posla (skraćenica)</label>
                                <input type="text" class="form-control" id="job_id" name="job_id" placeholder="Ovdje unesite id posla (skraćenica)">
                            </div>

                            <div class="form-group col-md-5">
                                <label for="name">Ime novog posla</label>
                                <input type="text" class="form-control" id="job_title" name="job_title" placeholder="Ovdje unesite novog posla">
                            </div>

                            <div class="form-group col-md-5">
                                <label for="name">Minimalna plaća</label>
                                <input type="text" class="form-control" id="min_salary" name="min_salary" placeholder="Ovdje unesite minimalnu plaću">
                            </div>

                            <div class="form-group col-md-5">
                                <label for="name">Maksimalna plaća</label>
                                <input type="text" class="form-control" id="max_salary" name="max_salary" placeholder="Ovdje unesite maksimalnu plaću">
                            </div>

                            <!--
                            <p>Date: <input type="text" class="form-control" id="datepicker"></p>
                             !-->

                            <div class="form-group col-md-5">
                                <button type="submit" class="btn btn-primary">Napravi posao</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
