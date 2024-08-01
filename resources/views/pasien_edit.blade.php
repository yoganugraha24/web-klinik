@extends('layouts.app_modern', ['title' => 'Edit Data Pasien'])
@section('content')
    <div class="card">
        <h5 class="card-header">Edit Data <b>{{ $pasien->nama }}</b></h5>
        <div class="card-body">
            <form action="/pasien/{{ $pasien->id }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group mb-3">
                    <label for="foto">Foto Pasien (jpg, jpeg, png)</label>
                    <input type="file" class="form-control @error('foto')
                        is-invalid
                    @enderror id="foto" name="foto">
                    <span class="text-danger">{{ $errors->first('foto') }}</span>
                    <img src="{{ Storage::url($pasien->foto) }}" alt="Foto Pasien" class="img-thumbnail mt-2" style="width: 100px">
                </div>
                <div class="form-group mb-3">
                    <label for="nama">Nama Pasien</label>
                    <input id="nama" class="form-control @error('nama')
                        is-invalid
                    @enderror" type="text" name="nama" value="{{ old('nama') ?? $pasien->nama }}">
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                </div>
                <div class="form-group mb-3">
                    <label for="no_pasien">No Pasien</label>
                    <input id="no_pasien" class="form-control @error('no_pasien')
                        is-invalid
                    @enderror" type="text" name="no_pasien" value="{{ old('no_pasien') ?? $pasien->no_pasien }}">
                    <span class="text-danger">{{ $errors->first('no_pasien') }}</span>
                </div>
                <div class="form-group mb-3">
                    <label for="umur">Umur</label>
                    <input id="umur" class="form-control @error('umur')
                        is-invalid
                    @enderror" type="text" name="umur" value="{{ old('umur') ?? $pasien->umur }}">
                    <span class="text-danger">{{ $errors->first('umur') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="jenis_kelamin">Jenis Kelamin</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="laki-laki"
                    {{ old('jenis_kelamin') ?? $pasien->jenis_kelamin === 'laki-laki' ? 'checked' : '' }}>
                    <label class="form-check-label" for="laki_laki">Laki-laki</label>
                        </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan"
                    {{ old('jenis_kelamin') ?? $pasien->jenis_kelamin === 'perempuan' ? 'checked' : '' }}>
                    <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                    <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                    </div>
                    <div class="form-group mt-1 mb-3">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                        name="alamat" value="{{ old('alamat') ?? $pasien->alamat }}">
                        <span class="text-danger">{{ $errors->first('alamat') }}</span>
                        </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection