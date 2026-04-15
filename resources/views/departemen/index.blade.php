@extends('layouts.main')

@section('content')
    {{-- Header Section --}}
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Data Departemen</h2>
            <p class="text-sm text-slate-400 mt-1">Kelola seluruh departemen perusahaan</p>
        </div>
        <a href="{{ route('departemen.tambah') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-indigo-500 to-purple-600 text-white text-sm font-semibold rounded-xl shadow-lg shadow-indigo-200 hover:shadow-xl hover:shadow-indigo-300 hover:-translate-y-0.5 transition-all duration-300">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Departemen
        </a>
    </div>

    {{-- Table Section --}}
    <div class="bg-white/70 backdrop-blur-sm rounded-2xl border border-slate-200/60 overflow-hidden shadow-sm">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-slate-100">
                    <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Nama Departemen</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Deskripsi</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Jumlah Karyawan</th>
                    <th class="px-6 py-4 text-right text-xs font-semibold text-slate-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse ($departemen as $d)
                    <tr class="hover:bg-indigo-50/40 transition-colors duration-150">
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-slate-100 text-slate-600 text-xs font-bold">{{ $d->id }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-semibold text-slate-800">{{ $d->nama_departemen }}</span>
                        </td>
                        <td class="px-6 py-4 text-slate-500">
                            {{ $d->deskripsi ?? '-' }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-100">
                                {{ $d->karyawans_count }} orang
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-2">
                                <a href="/departemen/{{ $d->id }}" class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-medium text-amber-700 bg-amber-50 rounded-lg border border-amber-100 hover:bg-amber-100 transition-colors duration-150">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    Edit
                                </a>
                                <form action="{{ route('departemen.delete', ['id' => $d->id ])}}" method="POST" class="inline">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-medium text-red-700 bg-red-50 rounded-lg border border-red-100 hover:bg-red-100 transition-colors duration-150 cursor-pointer" onclick="return confirm('Yakin ingin menghapus departemen ini?')">
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
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                                <p class="text-slate-500 font-medium">Tidak ada data departemen</p>
                                <p class="text-slate-400 text-xs mt-1">Tambahkan departemen baru</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Result Counter --}}
    <div class="mt-4 text-xs text-slate-400">
        Menampilkan {{ count($departemen) }} departemen
    </div>
@endsection
