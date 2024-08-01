@extends('layouts.app_modern', ['title' => 'Tambah Data Poli'])
@section('content')
    <div class="card">
        <h5 class="card-header">Tambah Data Poli</h5>
        <div class="card-body">    
            <form action="/poli" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group mb-3">
                    <label for="nama">Nama Poli</label>
                    <input id="nama" class="form-control @error('nama')
                        is-invalid
                    @enderror" type="text" name="nama" value="{{ old('nama') }}">
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                </div>
                <div class="form-group mb-3">
                    <label for="biaya">Biaya Konsultasi</label>
                    <input id="biaya" class="form-control @error('biaya')
                        is-invalid
                    @enderror" type="text" name="biaya" value="{{ old('biaya') }}">
                    <span class="text-danger">{{ $errors->first('biaya') }}</span>
                </div>
                <div class="form-group mb-3">
                    <label for="keterangan">Keterangan</label>
                    <input id="keterangan" class="form-control @error('keterangan')
                        is-invalid
                    @enderror" type="text" name="keterangan" value="{{ old('keterangan') }}">
                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection