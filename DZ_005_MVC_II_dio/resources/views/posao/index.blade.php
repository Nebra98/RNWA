@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">{{ __('Pregled svih poslova') }} <a href="{{ route('posao.create') }}" class="btn btn-primary float-right">Unesi novi posao</a></div>

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
                                <th scope="col">Oznaka posla</th>
                                <th scope="col">Naziv radnog mjesta</th>
                                <th scope="col">Minimalna plaća</th>
                                <th scope="col">Maksimalna plaća</th>
                                <th scope="col">Akcija</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($poslovi as $posao)
                                <tr>
                                    <th scope="row">{{ ++$i }}</th>
                                    <th>{{ $posao->job_id }}</th>
                                    <td>{{ $posao->job_title }}</td>
                                    <td>{{ $posao->min_salary }}</td>
                                    <td>{{ $posao->max_salary }}</td>

                                    <td>
                                        <a type="button" class="btn btn-warning" href="{{ route('posao.edit',$posao->job_id) }}">Uredi</a>
                                        <a type="button" class="btn btn-info" href="{{ route('posao.show', $posao->job_id) }}">Detalji</a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#band{{$i}}">
                                            Izbriši
                                        </button>

                                        <form action="{{ route('posao.destroy',$posao->job_id) }}" method="POST">

                                            <!-- Modal -->
                                            <div class="modal fade" id="band{{$i}}" tabindex="-1" role="dialog" aria-labelledby="bandLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h5 class="modal-title text-light" id="bandLabel">Izbriši posao</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Jeste li sigurni da želite izbrisati posao - <strong>{{ $posao->job_title }}</strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Izbriši posao</button>
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
