@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-13">
                <div class="card">
                    <div class="card-header">{{ __('Pregled svih lokacija') }} <a href="{{ route('lokacija.create') }}" class="btn btn-primary float-right">Unesi novu lokaciju</a></div>

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
                                <th scope="col">Adresa ulice</th>
                                <th scope="col">Poštanski broj</th>
                                <th scope="col">Grad</th>
                                <th scope="col">Državna pokrajina</th>
                                <th scope="col">Oznaka države</th>
                                <th scope="col">Akcija</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($lokacije as $lokacija)
                                <tr>
                                    <th scope="row">{{ ++$i }}</th>
                                    <th>{{ $lokacija->street_address }}</th>
                                    <td>{{ $lokacija->postal_code }}</td>
                                    <td>{{ $lokacija->city }}</td>
                                    <td>{{ $lokacija->state_province }}</td>
                                    <td>{{ $lokacija->country_id }}</td>

                                    <td>
                                        <a type="button" class="btn btn-warning" href="{{ route('lokacija.edit',$lokacija->location_id) }}">Uredi</a>
                                        <a type="button" class="btn btn-info" href="{{ route('lokacija.show', $lokacija->location_id) }}">Detalji</a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#band{{$i}}">
                                            Izbriši
                                        </button>

                                        <form action="{{ route('lokacija.destroy',$lokacija->location_id) }}" method="POST">

                                            <!-- Modal -->
                                            <div class="modal fade" id="band{{$i}}" tabindex="-1" role="dialog" aria-labelledby="bandLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h5 class="modal-title text-light" id="bandLabel">Izbriši lokaciju</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Jeste li sigurni da želite izbrisati lokaciju - <strong>{{ $lokacija->street_address }}</strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Izbriši lokaciju</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>Nema lokacija u sustavu</td>
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
