@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Profil Saya</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <table class="table table-borderless">
                            <tr>
                                <th>Nama</th>
                                <td>{{ $user->nama }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Handphone</th>
                                <td>{{ $user->nomor_hp }}</td>
                            </tr>
                            <tr>
                                <th>Role</th>
                                <td>{{ $user->role }}</td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td>{{ $user->deskripsi }}</td>
                            </tr>
                        </table>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">Ubah Profil</a>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="border p-2">
                            <label for="foto_profil">Foto Profil</label>
                            <br>
                            @if($user->foto_profil)
                                <img src="{{ asset('storage/' . $user->foto_profil) }}" alt="Profile Photo" class="img-fluid rounded" style="width: 200px; max-height: 400px; object-fit: cover;">
                            @else
                                <img src="{{ asset('path/to/default/image.jpg') }}" alt="Profile Photo" class="img-fluid rounded" style="width: 200px; max-height: 400px; object-fit: cover;">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
