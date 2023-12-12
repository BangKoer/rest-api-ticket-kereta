<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\TiketKereta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Pembelian::with('tiket')->get();
        return response()->json([
            'status_error' => false,
            'message' => "Data Fetch Success",
            'datas' => $datas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $datas = Pembelian::create([
            'tiket_id' => $request->tiket_id,
            'nama_pembeli' => $request->nama_pembeli,
        ]);
        return response()->json([
            'status_error' => false,
            'message' => "Data Fetch Success",
            'datas' => $datas,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembelian $id)
    {
        $datas = Pembelian::where('id', $id->id)->with('tiket')->get();
        return $datas;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Pembelian $id)
    {
        $validate = Validator::make([
            'tiket_id' => $request->tiket_id,
            'nama_pembeli' => $request->nama_pembeli,
        ], [
            'tiket_id' => 'required',
            'nama_pembeli' => 'required',
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
                'tiket_id' => $request->tiket_id,
                'nama_pembeli' => $request->nama_pembeli,
            ])
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembelian $id)
    {
        if ($id->delete()) {
            return response()->json([
                'status_error' => false,
                'messege' => "Data Succesfully Delete",
            ]);
        }
    }
}
