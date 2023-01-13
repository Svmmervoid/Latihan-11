@extends('layouts.dashboard')


@section('judul')
<h1 class="h3 mb-4 text-gray-800">MEMBER</h1>
@endsection

@section('konten')
<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah Data untuk Member</h6>
    </div>

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <form action="{{ route('post.proses-ubah.member', $detail_member->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $detail_member->nama) }}">

                    @error('nama')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>

            </div>

            <div class="form-group row">
                <label for="tinggi_badan" class="col-sm-2 col-form-label">Tinggi Badan(cm)</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control @error('tinggi_badan') is-invalid @enderror" name="tinggi_badan" value="{{ old('tinggi_badan', '') }}">

                    @error('tinggi_badan')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>

            </div>

            <div class="form-group row">
                <label for="berat_badan" class="col-sm-2 col-form-label">Berat Badan(kg)</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control @error('berat_badan') is-invalid @enderror" name="berat_badan" value="{{ old('berat_badan', '') }}">

                    @error('berat_badan')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>

            </div>

            <div class="form-group row">
                <label for="program_latihan" class="col-sm-2 col-form-label">Program Latihan</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control @error('program_latihan') is-invalid @enderror" name="program_latihan" value="{{ old('program_latihan', '') }}">

                    @error('program_latihan')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>

            </div>

            <div class="form-group row">
                <label for="program_latihan" class="col-sm-2 col-form-label">Trainer</label>

                <div class="col-sm-10">
                    <select class="trainer-id form-control custom-select" name="trainer_ke">
                        <option value="">Pilih Trainer</option>
                        @foreach($data_trainer as $trainer)
                        <option value="{{ $trainer->id }}" {{ old('trainer_id', $detail_member->trainer_id) == $trainer->id ? 'selected' : '' }}>{{ $trainer->nama }}</option>
                        @endforeach
                    </select>

                    @error('trainer_ke')
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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

