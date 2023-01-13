<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Member;
use App\Models\Trainer;

class MemberController extends Controller
{
    public function index()
    {
        $data_member = Member::with('trainer')->get();

        return view('member.index', compact('data_member'));
    }


    public function tambah()
    {
        $data_trainer = Trainer::all();

        return view('member.create', compact('data_trainer'));
    }


    public function proses_tambah(Request $request)
    {

        // Aturan Validasi
        $rule_validasi = [
            'nama'                      => 'required|min:3',
            'tinggi_badan'              => 'required|numeric',
            'berat_badan'               => 'required|numeric',
            'program_latihan'           => 'required',
            'trainer_ke'                => 'required',
        ];

        // Custom Message
        $pesan_validasi = [
            'nama.required'                => 'Nama Harus di Isi !',
            'nama.min'                     => 'Nama Minimal 3 Karakter !',

            'tinggi_badan.required'        => 'Tinggi Badan Harus di Isi !',
            'tinggi_badan.numeric'         => 'Tinggi Badan Harus Berupa Angka',
            'berat_badan.required'         => 'Berat Badan Harus di Isi !',
            'berat_badan.numeric'          => 'Berat Badan Harus Berupa Angka',
            'program_latihan.required'     => 'Program Latihan Harus di Isi !',
            'trainer_ke.required'          => 'Trainer Harus di Isi !',
        ];

        // Lakukan Validasi
        $request->validate($rule_validasi, $pesan_validasi);

        // Mapping All Request 
        $data_to_save                       = new Member();
        $data_to_save->nama                 = $request->nama;
        $data_to_save->tinggi_badan         = $request->tinggi_badan;
        $data_to_save->berat_badan          = $request->berat_badan;
        $data_to_save->program_latihan      = $request->program_latihan;
        $data_to_save->trainer_id           = $request->trainer_ke;

        // Save to DB
        $data_to_save->save();

        // Kembali dengan Flash Session Data
        return back()->with('status', 'Data Telah Disimpan !');
    }

    public function detail($id)
    {
        $detail_member = Member::findOrFail($id);

        return view('member.detail', compact('detail_member'));
    }

    public function hapus($id)
    {
        $detail_member = Member::findOrFail($id);

        $detail_member->delete();

        return back()->with('status', 'Data Berhasil di Hapus !');
    }

    public function ubah($id)
    {
        $detail_member = Member::findOrFail($id);
        $data_trainer = Trainer::all();

        return view('member.edit', compact('detail_member', 'data_trainer'));
    }

    public function proses_ubah(Request $request, $id)
    {

        // Aturan Validasi
        $rule_validasi = [
            'nama'                      => 'required|min:3',
            'tinggi_badan'          => 'required|numeric',
            'berat_badan'           => 'required|numeric',
            'program_latihan'           => 'required',
            'trainer_ke'                => 'required',
        ];

        // Custom Message
        $pesan_validasi = [
            'nama.required'        => 'Nama Harus di Isi !',
            'nama.min'             => 'Nama Minimal 3 Karakter !',

            'tinggi_badan.required'          => 'Tinggi Badan Harus di Isi !',
            'tinggi_badan.numeric'          => 'Tinggi Badan Harus Berupa Angka',
            'berat_badan.required'          => 'Berat Badan Harus di Isi !',
            'berat_badan.numeric'          => 'Berat Badan Harus Berupa Angka',
            'program_latihan.required'        => 'Program Latihan Harus di Isi !',
            'trainer_ke.required'              => 'Trainer Harus di Isi !',
        ];

        // Lakukan Validasi
        $request->validate($rule_validasi, $pesan_validasi);

        // Mapping All Request 
        $data_to_save                   = Member::findOrFail($id);
        $data_to_save->nama             = $request->nama;
        $data_to_save->tinggi_badan     = $request->tinggi_badan;
        $data_to_save->berat_badan      = $request->berat_badan;
        $data_to_save->program_latihan  = $request->program_latihan;
        $data_to_save->trainer_id       = $request->trainer_ke;


        // Save to DB
        $data_to_save->save();

        // Kembali dengan Flash Session Data
        return back()->with('status', 'Data Telah Disimpan !');
    }
}
