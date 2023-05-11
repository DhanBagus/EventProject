

@extends('layouts.app')

@section('content')

<div class="container mt-5">
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

                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('events.create') }}" class="btn btn-md btn-success mb-3 float-right">New
                            Event</a>

                        <table class="table table-bordered mt-1">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Jumlah Peserta</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Dibuat Tgl</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($events as $ev)
                                <tr>
                                    <td>{{ $ev->title }}</td>
                                    <td>{{ $ev->date}}</td>
                                    <td>{{ $ev->jum_peserta}}</td>
                                    <td>{{ $ev->harga}}</td>
                                    <td>{{ $ev->created_at->format('d-m-Y') }}</td>
                                    <td class="">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('events.destroy', $ev->id) }}" method="POST">

                                            <a href="{{ route('events.show', $ev->id) }}"
                                                class="btn btn-sm btn-secondary">VIEW</a>
                                            <a href="{{ route('events.edit', $ev->id) }}"
                                                class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            <a href="{{ route('partisipan', $ev->id) }}"
                                                class="btn btn-sm btn-success">PARTISIPAN</a>

                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center text-mute" colspan="4">Data Event tidak tersedia</td>
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


