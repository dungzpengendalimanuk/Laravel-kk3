<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Departemen;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    // READ - dengan fitur Search & Filter
    public function index(Request $request)
    {
        // Query dengan JOIN ke tabel departemens
        $query = Karyawan::with('departemen');

        // Fitur Search: cari berdasarkan nama atau posisi
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('posisi', 'like', "%{$search}%");
            });
        }

        // Fitur Filter: filter berdasarkan departemen
        if ($request->filled('departemen_id')) {
            $query->where('departemen_id', $request->departemen_id);
        }

        $karyawan = $query->get();
        $departemens = Departemen::all();

        return view('karyawan.index', [
            'karyawan' => $karyawan,
            'departemens' => $departemens,
            'search' => $request->search,
            'departemen_id' => $request->departemen_id
        ]);
    }

    public function show()
    {
        $departemens = Departemen::all();
        return view('karyawan.tambah', ['departemens' => $departemens]);
    }

    // CREATE
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'posisi' => 'required',
            'departemen_id' => 'nullable|exists:departemens,id'
        ]);
    
        Karyawan::create($validatedData);

        return redirect('/karyawan');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $departemens = Departemen::all();

        return view('karyawan.edit', [
            'karyawan' => $karyawan,
            'departemens' => $departemens
        ]);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'posisi' => 'required',
            'departemen_id' => 'nullable|exists:departemens,id'
        ]);
        
        $karyawan->update([
            'nama' => $request->nama,
            'posisi' => $request->posisi,
            'departemen_id' => $request->departemen_id
        ]);

        return redirect('/karyawan');
    }

    // DELETE
    public function destroy($id)
    {
        Karyawan::destroy($id);

        return redirect('/karyawan');
    }
}
