@extends('layouts.app_modern',['title' => 'Data Pasien'])
@section('content')
    <div class="card">
        <h5 class="card-header">Data Poli</h5>
        <div class="card-body">
            <a href="/poli/create" class="btn btn-primary">Tambah Data</a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>Biaya</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($poli as $item)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->biaya }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="/poli/{{ $item->id }}/edit"  class="btn btn-warning btn-sm">Edit</a>

                        <form action="/poli/{{ $item->id }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm ml-2"
                            onclick="return confirm('Yakin ingin menghapus data?')">
                            Hapus
                        </button>
                        </form>
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $poli->links() !!}
            </div>
     </div>
 @endsection