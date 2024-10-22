<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        $data['success'] = true;
        $data['message'] ="Data Pelanggan";
        $data['result'] = $pelanggan;
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
        $validate=$request->validate([
            'nama'=>'required',
            'jenis_kelamin'=>'required',
            'tanggal_lahir'=>'required',
            'no_telp'=>'required'
        ]);

        $result =Pelanggan::create($validate);
        if($result){
            $data['success'] =true;
            $data['message']="Data Pelanggan berhasil disimpan";
            $data['result']=$result;
            return response()->json($data,Response::HTTP_CREATED);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'no_telp' => 'required'
        ]);

        $result = Pelanggan::where('id',$id)->update($validate);
        if($result){
            $data['success'] = true;
            $data['message'] = "Data Pelanggan berhasil diupdate";
            $data['result'] = $result;
            return response()->json($data, Response::HTTP_OK);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pelanggan =Pelanggan::find($id);
        if($pelanggan)
        {
            $pelanggan->delete(); //hapus data fakultas berdasarkan $id
            $data['success'] = true;
            $data['message'] = "Data Pelanggan berhasil dihapus";
            return response()->json($data, Response::HTTP_OK);
        }else{
            $data['success'] = false;
            $data['message'] = "Data Pelanggan tidak ditemukan";
            return response()->json($data, Response::HTTP_NOT_FOUND);
        }
    }
}
