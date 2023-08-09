<?php

namespace App\Http\Controllers;

use App\Models\Pupuk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PupukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Pupuk';
        $addTitle = 'Tambah Data Pupuk';
        $pupuks = Pupuk::all();
        return view('admin.pupuk.index', [
            'title' => $title,
            'addTitle' => $addTitle,
            'pupuks' => $pupuks,
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
            Pupuk::create($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Data Pupuk berhasil ditambahkan',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data Pupuk gagal ditambahkan: ' . $th->getMessage(),
            ]);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Pupuk $pupuk)
    {
        return response()->json([
            'status' => 'success',
            'pupuk' => $pupuk,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $pupuk = Pupuk::findOrFail($request->id);
        return response()->json([
            'status' => 'success',
            'pupuk' => $pupuk,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pupuk $pupuk)
    {
        try {
            $data = $request->validate([
                'name' => 'nullable',
                'jenis' => 'nullable',
                'harga' => 'nullable',
                'stok' => 'nullable',
                'deskripsi' => 'nullable',
            ]);
            // dd($data);
            $pupuk->update($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Data Pupuk berhasil diubah',
                'data' => $data,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data Pupuk gagal diubah: ' . $th->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pupuk $pupuk)
    {
        try {
            Pupuk::where('id', $pupuk->id)->delete();
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
