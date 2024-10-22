<?php

namespace App\Http\Controllers;

use App\Models\alatTulis;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AlatTulisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alatTulis = alatTulis::all();
        $data['success'] = true;
        $data['message'] ="Data Alat Tulis";
        $data['result'] = $alatTulis;
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
            'harga' =>'required',
            'desc'=>'required',
        ]);

        $result = alatTulis::create($validate);
        if($result){
            $data['success'] = true;
            $data['message']="Data Alat Tulis telah disimpan";
            $data['result']=$result;
            return response()->json($data,Response::HTTP_CREATED);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(alatTulis $alatTulis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(alatTulis $alatTulis)
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
            'harga' => 'required',
            'desc' => 'required',
        ]);

        $result = alatTulis::where('id',$id)->update($validate);
        if($result){
            $data['success'] = true;
            $data['message'] = "Data Alat Tulis berhasil diupdate";
            $data['result'] = $result;
            return response()->json($data, Response::HTTP_OK);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $alatTulis =alatTulis::find($id);
        if($alatTulis)
        {
            $alatTulis->delete(); //hapus data fakultas berdasarkan $id
            $data['success'] = true;
            $data['message'] = "Data Alat Tulis berhasil dihapus";
            return response()->json($data, Response::HTTP_OK);
        }else{
            $data['success'] = false;
            $data['message'] = "Data Alat Tulis tidak ditemukan";
            return response()->json($data, Response::HTTP_NOT_FOUND);
        }
    }
}
