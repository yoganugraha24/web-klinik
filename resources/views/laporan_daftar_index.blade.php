@extends('layouts.app_modern_laporan')
@section('content')
<div class="text-center">
    <h3>LAPORAN DATA PENDAFTARAN PASIEN</h3>
    <p>Laporan Tanggal : {{ request('tanggal_mulai') }}</p>
    </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="1%">NO</th>
                    <th>No Pasien</th>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Jenis Kelamin</th>
                    <th>Tgl Daftar</th>
                    <th>Poli</th>
                    <th>Biaya</th>
                </tr>
            </thead>
        <tbody>
            @foreach ($models as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->pasien->no_pasien }}</td>
                    <td>{{ $item->pasien->nama }}</td>
                    <td>{{ $item->pasien->umur }}</td>
                    <td>{{ $item->pasien->jenis_kelamin }}</td>
                    <td>{{ $item->tanggal_daftar }}</td>
                    <td>{{ $item->poli->nama }}</td>
                    <td>{{ $item->biaya }}</td>
                </tr>
            @endforeach
            <tfoot>
                <tr>
                    <td colspan="7">Total</td>
                    <td>{{ $models->sum('poli.biaya') }}</td>
                </tr>
            </tfoot>
        </tbody>
    </table>
@endsection