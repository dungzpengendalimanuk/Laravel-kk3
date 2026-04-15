<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    // READ - Menampilkan semua data departemen
    public function index()
    {
        $departemen = Departemen::withCount('karyawans')->get();

        return view('departemen.index', ['departemen' => $departemen]);
    }

    public function show()
    {
        return view('departemen.tambah');
    }

    // CREATE - Menyimpan data departemen baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_departemen' => 'required',
            'deskripsi' => 'nullable'
        ]);

        Departemen::create($validatedData);

        return redirect('/departemen');
    }

    public function edit($id)
    {
        $departemen = Departemen::findOrFail($id);

        return view('departemen.edit', ['departemen' => $departemen]);
    }

    // UPDATE - Memperbarui data departemen
    public function update(Request $request, $id)
    {
        $departemen = Departemen::findOrFail($id);

        $request->validate([
            'nama_departemen' => 'required',
            'deskripsi' => 'nullable'
        ]);

        $departemen->update([
            'nama_departemen' => $request->nama_departemen,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect('/departemen');
    }

    // DELETE - Menghapus data departemen
    public function destroy($id)
    {
        Departemen::destroy($id);

        return redirect('/departemen');
    }
}
