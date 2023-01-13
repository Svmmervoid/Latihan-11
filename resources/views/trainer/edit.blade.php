@extends('layouts.dashboard')


@section('judul')
<h1 class="h3 mb-4 text-gray-800">Trainer</h1>
@endsection

@section('konten')
<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah Data untuk Trainer</h6>
    </div>

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <form action="{{ route('post.proses-ubah.trainer', $detail_trainer->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $detail_trainer->nama) }}">

                    @error('nama')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>

            </div>

            <div class="form-group row">
                <label for="umur" class="col-sm-2 col-form-label">Umur</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control @error('umur') is-invalid @enderror" name="umur" value="{{ old('umur', '') }}">

                    @error('umur')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>

            </div>

            <div class="form-group row">
                <label for="jadwal" class="col-sm-2 col-form-label">Jadwal</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control @error('jadwal') is-invalid @enderror" name="jadwal" value="{{ old('jadwal', '') }}">

                    @error('jadwal')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>

            </div>

            <button type="submit" class="btn btn-success">
                Simpan
            </button>

        </form>
    </div>

</div>
@endsection