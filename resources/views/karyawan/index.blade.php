@extends('layouts.main')

@section('content')
    {{-- Header Section --}}
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Data Karyawan</h2>
            <p class="text-sm text-slate-400 mt-1">Kelola seluruh data karyawan perusahaan</p>
        </div>
        <a href="{{ route('karyawan.tambah') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-indigo-500 to-purple-600 text-white text-sm font-semibold rounded-xl shadow-lg shadow-indigo-200 hover:shadow-xl hover:shadow-indigo-300 hover:-translate-y-0.5 transition-all duration-300">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Karyawan
        </a>
    </div>

    {{-- Search & Filter Section --}}
    <div class="bg-white/70 backdrop-blur-sm rounded-2xl border border-slate-200/60 p-5 mb-6 shadow-sm">
        <form action="{{ route('karyawan') }}" method="GET" class="flex flex-wrap items-end gap-4">
            {{-- Search Input --}}
            <div class="flex-1 min-w-[220px]">
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Cari Karyawan</label>
                <div class="relative">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari nama atau posisi..." class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-indigo-400 transition-all duration-200">
                </div>
            </div>

            {{-- Filter Departemen --}}
            <div class="min-w-[200px]">
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Filter Departemen</label>
                <select name="departemen_id" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-indigo-400 transition-all duration-200 appearance-none cursor-pointer">
                    <option value="">Semua Departemen</option>
                    @foreach ($departemens as $dept)
                        <option value="{{ $dept->id }}" {{ ($departemen_id ?? '') == $dept->id ? 'selected' : '' }}>
                            {{ $dept->nama_departemen }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Buttons --}}
            <div class="flex gap-2">
                <button type="submit" class="px-5 py-2.5 bg-indigo-500 text-white text-sm font-semibold rounded-xl hover:bg-indigo-600 shadow-sm hover:shadow transition-all duration-200 cursor-pointer">
                    Cari
                </button>
                <a href="{{ route('karyawan') }}" class="px-5 py-2.5 bg-slate-100 text-slate-600 text-sm font-semibold rounded-xl hover:bg-slate-200 transition-all duration-200">
                    Reset
                </a>
            </div>
        </form>
    </div>

    {{-- Table Section --}}
    <div class="bg-white/70 backdrop-blur-sm rounded-2xl border border-slate-200/60 overflow-hidden shadow-sm">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-slate-100">
                    <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Posisi</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Departemen</th>
                    <th class="px-6 py-4 text-right text-xs font-semibold text-slate-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse ($karyawan as $p)
                    <tr class="hover:bg-indigo-50/40 transition-colors duration-150">
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-slate-100 text-slate-600 text-xs font-bold">{{ $p->id }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-semibold text-slate-800">{{ $p->nama }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">
                                {{ $p->posisi }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            @if($p->departemen)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-50 text-purple-700 border border-purple-100">
                                    {{ $p->departemen->nama_departemen }}
                                </span>
                            @else
                                <span class="text-slate-400 text-xs italic">Belum ditentukan</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-2">
                                <a href="/karyawan/{{ $p->id }}" class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-medium text-amber-700 bg-amber-50 rounded-lg border border-amber-100 hover:bg-amber-100 transition-colors duration-150">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    Edit
                                </a>
                                <form action="{{ route('karyawan.delete', ['id' => $p->id ])}}" method="POST" class="inline">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-medium text-red-700 bg-red-50 rounded-lg border border-red-100 hover:bg-red-100 transition-colors duration-150 cursor-pointer" onclick="return confirm('Yakin ingin menghapus?')">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <svg class="w-12 h-12 text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                </svg>
                                <p class="text-slate-500 font-medium">Tidak ada data karyawan</p>
                                <p class="text-slate-400 text-xs mt-1">Coba ubah filter atau tambah data baru</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Result Counter --}}
    <div class="mt-4 text-xs text-slate-400">
        Menampilkan {{ count($karyawan) }} data karyawan
    </div>
@endsection