<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer;

class TrainerController extends Controller
{

    public function index()
    {
        $data_trainer = Trainer::all();

        return view('trainer.index', compact('data_trainer'));
    }

    public function tambah()
    {
        return view('trainer.create');
    }


    public function proses_tambah(Request $request)
    {

        // Aturan Validasi
        $rule_validasi = [
            'nama'         => 'required|min:3',
            'umur'         => 'required|numeric',
            'jadwal'       => 'required',
        ];

        // Custom Message
        $pesan_validasi = [
            'nama.required'        => 'Nama Harus di Isi !',
            'nama.min'             => 'Nama Minimal 3 Karakter !',

            'umur.required'          => 'Umur Harus di Isi !',
            'umur.numeric'          => 'Umur Harus Berupa Angka',
            'jadwal.required'        => 'Jadwal Harus di Isi !',
        ];

        // Lakukan Validasi
        $request->validate($rule_validasi, $pesan_validasi);

        // Mapping All Request 
        $data_to_save               = new Trainer();
        $data_to_save->nama         = $request->nama;
        $data_to_save->umur       = $request->umur;
        $data_to_save->jadwal       = $request->jadwal;

        // Save to DB
        $data_to_save->save();

        // Kembali dengan Flash Session Data
        return back()->with('status', 'Data Telah Disimpan !');
    }

    public function detail($id)
    {
        $detail_trainer = Trainer::findOrFail($id);

        return view('trainer.detail', compact('detail_trainer'));
    }

    public function hapus($id)
    {
        $detail_trainer = Trainer::findOrFail($id);

        if ($detail_trainer->member()->exists()) {
            return back()->with('status', 'Tidak dapat hapus data ber-relasi !');
        }

        $detail_trainer->delete();

        return back()->with('status', 'Data Berhasil di Hapus !');
    }

    public function ubah($id)
    {
        $detail_trainer = Trainer::findOrFail($id);

        return view('trainer.edit', compact('detail_trainer'));
    }

    public function proses_ubah(Request $request, $id)
    {

        // Aturan Validasi
        $rule_validasi = [
            'nama'         => 'required|min:3',
            'umur'         => 'required|numeric',
            'jadwal'       => 'required',
        ];

        // Custom Message
        $pesan_validasi = [
            'nama.required'        => 'Nama Harus di Isi !',
            'nama.min'             => 'Nama Minimal 3 Karakter !',

            'umur.required'          => 'Umur Harus di Isi !',
            'umur.numeric'          => 'Umur Harus Berupa Angka',
            'jadwal.required'        => 'Jadwal Harus di Isi !',
        ];

        // Lakukan Validasi
        $request->validate($rule_validasi, $pesan_validasi);

        // Mapping All Request 
        $data_to_save               = Trainer::findOrFail($id);
        $data_to_save->nama         = $request->nama;
        $data_to_save->umur         = $request->umur;
        $data_to_save->jadwal       = $request->jadwal;

        // Save to DB
        $data_to_save->save();

        // Kembali dengan Flash Session Data
        return back()->with('status', 'Data Telah Disimpan !');
    }
}
