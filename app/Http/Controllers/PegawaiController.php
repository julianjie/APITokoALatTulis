<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Pegawai::all();
        $data['success'] = true;
        $data['message'] ="Data Pegawai";
        $data['result'] = $pegawai;
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
            'nama'=>'required',
            'jenis_kelamin' =>'required',
            'tanggal_lahir'=>'required',
            'no_telp'=>'required'
        ]);

        $result = Pegawai::create($validate);
        if($result){
            $data['success'] = true;
            $data['message']="Data Pegawai telah disimpan";
            $data['result']=$result;
            return response()->json($data,Response::HTTP_CREATED);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'no_telp' => 'required'
        ]);

        $result = Pegawai::where('id',$id)->update($validate);
        if($result){
            $data['success'] = true;
            $data['message'] = "Data Pegawai berhasil diupdate";
            $data['result'] = $result;
            return response()->json($data, Response::HTTP_OK);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pegawai =Pegawai::find($id);
        if($pegawai)
        {
            $pegawai->delete(); //hapus data fakultas berdasarkan $id
            $data['success'] = true;
            $data['message'] = "Data Pegawai berhasil dihapus";
            return response()->json($data, Response::HTTP_OK);
        }else{
            $data['success'] = false;
            $data['message'] = "Data Pegawai tidak ditemukan";
            return response()->json($data, Response::HTTP_NOT_FOUND);
        }
    }
}
