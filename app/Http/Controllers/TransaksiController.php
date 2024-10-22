<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::with('pelanggan','alattulis')->get();
        $data['success'] = true;
        $data['message'] ="Data Transaksi";
        $data['result'] = $transaksi;
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'id_pelanggan' => 'required',
            'id_alat_tulis'=>'required|',
            'tanggal' => 'required'
        ]);

        $transaksi = Transaksi::create($validate);
        if($transaksi){
            $response['success']= true;
            $response['message']= 'Prodi berhasil ditambahkan.';
            $response['result'] = $transaksi;
            return response()->json($response,Response::HTTP_CREATED);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'id_pelanggan' => 'required',
            'id_alat_tulis' => 'required',
            'tanggal'
        ]);

        $result = Transaksi::where('id',$id)->update($validate);
        if($result){
            $data['success'] = true;
            $data['message'] = "Data Transaksi berhasil diupdate";
            $data['result'] = $result;
            return response()->json($data, Response::HTTP_OK);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaksi =Transaksi::find($id);
        if($transaksi)
        {
            $transaksi->delete(); //hapus data fakultas berdasarkan $id
            $data['success'] = true;
            $data['message'] = "Data Transaksi berhasil dihapus";
            return response()->json($data, Response::HTTP_OK);
        }else{
            $data['success'] = false;
            $data['message'] = "Data Transaksi tidak ditemukan";
            return response()->json($data, Response::HTTP_NOT_FOUND);
        }
    }
}
