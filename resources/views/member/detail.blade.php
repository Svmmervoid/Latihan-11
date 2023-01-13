@extends('layouts.dashboard')

@section('judul')
<h1 class="h3 mb-4 text-gray-800">MEMBER</h1>
@endsection

@section('konten')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Data Untuk Member</h6>
    </div>

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <div class="row">
            <div class="col-md-3 text-md-right">
                <h5>Nama :</h5>
            </div>
            <div class="col">
                <label>{{ $detail_member->nama }}</label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 text-md-right">
                <h5>Tinggi Badan(cm):</h5>
            </div>
            <div class="col">
                <label>{{ $detail_member->tinggi_badan }}</label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 text-md-right">
                <h5>Berat Badan(kg):</h5>
            </div>
            <div class="col">
                <label>{{ $detail_member->berat_badan }}</label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 text-md-right">
                <h5>Program Latihan:</h5>
            </div>
            <div class="col">
                <label>{{ $detail_member->program_latihan }}</label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 text-md-right">
                <h5>Trainer :</h5>
            </div>
            <div class="col">
                <label>{{ $detail_member->trainer->nama }}</label>
            </div>
        </div>

    </div>
</div>
@endsection