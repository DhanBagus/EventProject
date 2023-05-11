

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
                        <h3 class="text-center">Detail Event / {{ $data['event']->title }}</h3>
                        <table>
                            
                            <tr>
                                <td>Tanggal</td>
                                <td> : </td>
                                <td>{{ $data['event']->date }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Peserta</td>
                                <td> : </td>
                                <td>{{ $data['event']->jum_peserta }}</td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td> : </td>
                                <td>Rp. {{ number_format($data['event']->harga) }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Terdaftar</td>
                                <td> : </td>
                                <td>{{ $data['jum_partisipan'] }}</td>
                            </tr>
                            <tr>
                                <td>Penghasilan</td>
                                <td> : </td>
                                <td>Rp. {{ number_format($data['event']->harga*$data['jum_partisipan']) }}</td>
                            </tr>

                        </table>
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
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data['partisipan'] as $par)
                                <tr>
                                   
                                    <td>{{ $par->nama }}</td>
                                    <td>{{ $par->kontak}}</td>
                                    <td>{{ $par->keterangan}}</td>
                                    
                                    
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


