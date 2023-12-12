<?php

namespace App\Http\Controllers;

use App\Models\TiketKereta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TiketKeretaController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $datas = TiketKereta::all();
        return response()->json([
            'status_error' => false,
            'message' => "Data Fetch Success",
            'datas' => $datas,
        ]);
    }

    // Tambah Data
    public function addData(Request $request)
    {
        $datas = TiketKereta::create([
            'nama_kereta' => $request->nama_kereta,
            'jenis_kereta' => $request->jenis_kereta,
            'destinasi' => $request->destinasi,
            'estimasi_waktu' => $request->estimasi_waktu,
            'harga' => $request->harga,
            'logo' => $request->logo,
        ]);

        return response()->json([
            'status_error' => false,
            'message' => "Data Fetch Success",
            'datas' => $datas,
        ]);
    }

    // Tampil data berdasarkan id
    public function searchId(TiketKereta $id)
    {
        return response()->json([
            'status_error' => false,
            'messege' => "Data Get Succesfully",
            'datas' => $id,
        ]);
    }

    // Edit / Update Data
    public function updateData(Request $request, TiketKereta $id)
    {
        $validate = Validator::make([
            'nama_kereta' => $request->nama_kereta,
            'jenis_kereta' => $request->jenis_kereta,
            'destinasi' => $request->destinasi,
            'estimasi_waktu' => $request->estimasi_waktu,
            'harga' => $request->harga,
        ], [
            'nama_kereta' => 'required',
            'jenis_kereta' => 'required',
            'destinasi' => 'required',
            'estimasi_waktu' => 'required',
            'harga' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status_error' => true,
                'messege' => 'Data Update Fail',
                'datas' => $validate->errors()
            ]);
        }

        return response()->json([
            'status_error' => false,
            'messege' => 'Data Update Successfully',
            'datas' => $id->update([
                'nama_kereta' => $request->nama_kereta,
                'jenis_kereta' => $request->jenis_kereta,
                'destinasi' => $request->destinasi,
                'estimasi_waktu' => $request->estimasi_waktu,
                'harga' => $request->harga,
            ])
        ]);
    }

    // Delete Data
    public function deleteData(TiketKereta $id) {
        if ($id->delete()) {
            return response()->json([
                'status_error' => false,
                'messege' => "Data Succesfully Delete",
            ]);
        }
    }
}
