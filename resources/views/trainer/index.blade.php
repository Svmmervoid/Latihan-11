@extends('layouts.dashboard')

@section('judul')
<h1 class="h3 mb-4 text-gray-800">TRAINER</h1>
@endsection

@section('konten')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Table Data Untuk Pendaftaran Trainer</h6>
    </div>

    <div class="card-body">

        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <a href="{{ route('get.tambah.trainer') }}" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Data</span>
        </a>

        <hr>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Jadwal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_trainer as $trainer)
                    <tr>
                        <td>{{ $trainer->id }}</td>
                        <td>{{ $trainer->nama }}</td>
                        <td>{{ $trainer->umur }}</td>
                        <td>{{ $trainer->jadwal }}</td>
                        <td class="text-nowrap">
                            <!-- Detail -->
                            <a href="{{ route('get.detail.trainer', $trainer->id) }}" class="btn btn-success">
                                <i class="fa fa-eye"></i>
                            </a>

                            <!-- Ubah -->
                            <a href="{{ route('get.ubah.trainer', $trainer->id) }}" class="btn btn-primary">
                                <i class="fa fa-edit"></i>
                            </a>

                            <!-- Delete -->
                            <form hidden action="{{ route('delete.trainer', $trainer->id)}}" method="post" id="data-ke-{{ $trainer->id }}">
                                @csrf
                                @method('DELETE')
                                &nbsp;
                            </form>

                            <button class="btn btn-danger" onclick="deleteRow( {{ $trainer->id }} )">
                                <i class="fas fa-trash"></i>
                            </button>


                            &nbsp;

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Add SweetAlert 2 CDN -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Delete Row -->
<script>
    function deleteRow(id) {
        Swal.fire({
            title: 'Apakah Anda Yakin Untuk Menghapus Data Ini?',
            text: "Tindakan Ini Tidak Bisa Dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0af59f',
            cancelButtonColor: '#ff1500',
            confirmButtonText: 'Ya, Saya Ingin Menghapus Data Ini!'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#data-ke-' + id).submit()
            }
        })
    }
</script>

@endpush