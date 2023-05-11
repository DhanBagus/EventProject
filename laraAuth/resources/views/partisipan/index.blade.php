

@extends('layouts.app')

@section('content')

<div class="container mt-3">
        <div class="row">
            <div class="col-md-12">

                <!-- Notifikasi menggunakan flash session data -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
                @endif

                <div class="card border-0 shadow rounded col-md-5">
                    <div class="card-body">
                        <h3 class="text-center">Add Partisipan</h3>
                        <form action="{{ route('partisipan.store') }}" method="POST">
                            @csrf
                            <input type="text" class="form-control @error('id_event') is-invalid @enderror"
                                    name="id_event" value="{{ $data['id_event'] }}" required hidden>

                            <div class="form-group ">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ old('nama') }}" required>

                                <!-- error message untuk nama -->
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group ">
                                <label for="kontak">Kontak</label>
                                <input type="text" class="form-control @error('kontak') is-invalid @enderror"
                                    name="kontak" value="{{ old('kontak') }}" required>

                                <!-- error message untuk title -->
                                @error('kontak')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <div class="form-group ">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                    name="keterangan" value="{{ old('keterangan') }}" required>

                                <!-- error message untuk title -->
                                @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            

                            <button type="submit" class="btn btn-md btn-primary mt-3">Save</button>
                            <a href="{{ route('home') }}" class="btn btn-md btn-secondary mt-3">back</a>

                        </form>
                    </div>
                </div>

                <div class="card border-0 shadow rounded mt-3">
                    <div class="card-body">
                        <h3 class="text-center mb-3">List Partisipan</h3>
                        <table class="table table-bordered mt-1">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">Nama</th>
                                    <th scope="col">Kontak</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data['partisipan'] as $par)
                                <tr>
                                   
                                    <td>{{ $par->nama }}</td>
                                    <td>{{ $par->kontak}}</td>
                                    <td>{{ $par->keterangan}}</td>
                                    
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('partisipan.destroy', $par->id) }}" method="POST">
                                            
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            <!-- <a href="{{ route('partisipan', $par->id) }}"
                                                class="btn btn-sm btn-primary">EDIT</a> -->
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center text-mute" colspan="3">Data Event tidak tersedia</td>
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


