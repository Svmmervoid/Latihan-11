@extends('layouts.dashboard')

@section('judul')
<h1 class="h3 mb-4 text-gray-800">Tentang</h1>
@endsection

@section('konten')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Info</h6>
    </div>

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <i>Zeus Gym dibentuk pada tahun 2023, menurut survey Zeus Gym merupakan Gym terbaik di seluruh Kota Jambi. Zeus Gym memiliki alat-alat Gym yang canggih dan modern.</i>

    </div>
</div>
@endsection