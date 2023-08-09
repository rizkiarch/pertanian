<?php

namespace App\Http\Controllers;

use App\Models\Bibit;
use App\Models\Pupuk;
use Illuminate\Http\Request;

class BibitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Bibit';
        $addTitle = 'Tambah Data Bibit';
        $bibits = Bibit::all();
        return view('admin.bibit.index', [
            'title' => $title,
            'addTitle' => $addTitle,
            'bibits' => $bibits,
        ]);
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
        try {
            $data = $request->validate([
                'name' => 'nullable',
                'jenis' => 'nullable',
                'harga' => 'nullable',
                'stok' => 'nullable',
                'deskripsi' => 'nullable',
            ]);
            Bibit::create($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil ditambahkan',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data gagal ditambahkan: ' . $th->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bibit $bibit)
    {
        return response()->json([
            'status' => 'success',
            'bibit' => $bibit,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bibit $bibit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bibit $bibit)
    {
        try {
            $data = $request->validate([
                'name' => 'nullable',
                'jenis' => 'nullable',
                'harga' => 'nullable',
                'stok' => 'nullable',
                'deskripsi' => 'nullable',
            ]);
            $bibit->update($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil diubah',
                'data' => $data,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data gagal diubah: ' . $th->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bibit $bibit)
    {
        try {
            Bibit::where('id', $bibit->id)->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Data Pupuk berhasil dihapus',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data Pupuk gagal dihapus: ' . $th->getMessage(),
            ]);
        }
    }
}
