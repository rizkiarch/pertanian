<?php

namespace App\Http\Controllers;

use App\Models\Peralatan;
use Illuminate\Http\Request;

class PeralatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peralatans = Peralatan::all();
        return view('admin.peralatan.index', [
            'title' => 'Data Peralatan',
            'peralatans' => $peralatans,
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
                'name' => 'required',
                'kondisi' => 'required',
                'stok' => 'required',
            ]);

            Peralatan::create($data);
            return response()->json([
                'message' => 'Data berhasil disimpan',
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Data gagal disimpan: ' . $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Peralatan $peralatan)
    {
        return response()->json([
            'status' => 'success',
            'peralatan' => $peralatan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peralatan $peralatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peralatan $peralatan)
    {
        try {
            $data = $request->validate([
                'name' => 'required',
                'kondisi' => 'required',
                'stok' => 'required',
            ]);

            $peralatan->update($data);
            return response()->json([
                'message' => 'Data berhasil disimpan',
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Data gagal disimpan: ' . $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peralatan $peralatan)
    {
        try {
            Peralatan::where('id', $peralatan->id)->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Data  berhasil dihapus',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data  gagal dihapus: ' . $th->getMessage(),
            ]);
        }
    }
}
