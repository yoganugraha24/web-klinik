@extends('layouts.app_modern', ['title' => 'Edit Data Poli'])
@section('content')
    <div class="card">
        <h5 class="card-header">Edit Data <b>{{ $poli->nama }}</b></h5>
        <div class="card-body">
            <form action="/poli/{{ $poli->id }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                
                <div class="form-group mb-3">
                    <label for="nama">Nama Poli</label>
                    <input id="nama" class="form-control @error('nama')
                        is-invalid
                    @enderror" type="text" name="nama" value="{{ old('nama') ?? $poli->nama }}">
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                </div>
                <div class="form-group mb-3">
                    <label for="biaya">Biaya Konsultasi</label>
                    <input id="biaya" class="form-control @error('biaya')
                        is-invalid
                    @enderror" type="text" name="biaya" value="{{ old('biaya') ?? $poli->biaya }}">
                    <span class="text-danger">{{ $errors->first('biaya') }}</span>
                </div>
                <div class="form-group mb-3">
                    <label for="keterangan">Keterangan</label>
                    <input id="keterangan" class="form-control @error('keterangan')
                        is-invalid
                    @enderror" type="text" name="keterangan" value="{{ old('keterangan') ?? $poli->keterangan }}">
                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection