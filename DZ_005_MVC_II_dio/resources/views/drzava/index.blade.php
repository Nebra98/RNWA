@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Pregled svih država') }} <a href="{{ route('drzava.create') }}" class="btn btn-primary float-right">Unesi novu državu</a></div>

                    <div class="card-body">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Oznaka države</th>
                                <th scope="col">Naziv države</th>
                                <th scope="col">ID regije</th>
                                <th scope="col">Akcija</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($drzave as $drzava)
                                <tr>
                                    <th scope="row">{{ ++$i }}</th>
                                    <th scope="row">{{ $drzava->country_id  }}</th>
                                    <td>{{ $drzava->country_name }}</td>
                                    <td>{{ $drzava->region_id }}</td>

                                    <td>
                                        <a type="button" class="btn btn-warning" href="{{ route('drzava.edit',$drzava->country_id) }}">Uredi</a>
                                        <a type="button" class="btn btn-info" href="{{ route('drzava.show', $drzava->country_id) }}">Detalji</a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#band{{$i}}">
                                            Izbriši
                                        </button>

                                        <form action="{{ route('drzava.destroy',$drzava->country_id) }}" method="POST">

                                            <!-- Modal -->
                                            <div class="modal fade" id="band{{$i}}" tabindex="-1" role="dialog" aria-labelledby="bandLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h5 class="modal-title text-light" id="bandLabel">Izbriši državu</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Jeste li sigurni da želite izbrisati drzavu - <strong>{{ $drzava->country_name }}</strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Izbriši drzavu</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>Nema bandova</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
