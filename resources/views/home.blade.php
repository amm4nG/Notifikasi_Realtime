@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        @if (Auth::user()->role == 'admin')
                            <table id="table-users" class="table text-center">
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>nama</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ optional($loop)->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                <a href="" class="btn disabled btn-danger btn-sm">Tolak</a>
                                                <a href=""
                                                    onclick="event.preventDefault(); document.getElementById('form-konfirmasi-{{ $user->id }}').submit();"
                                                    class="btn btn-success btn-sm">
                                                    Konfirmasi
                                                </a>
                                                <form id="form-konfirmasi-{{ $user->id }}"
                                                    action="{{ route('testing.store') }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    <input type="hidden" value="{{ $user->id }}" name="id_user"
                                                        id="id_user">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <a href="" class="btn btn-primary form-control"
                                onclick="event.preventDefault(); document.getElementById('form-booking').submit();">
                                Booking
                            </a>
                            <form id="form-booking" action="{{ route('notif.store') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
