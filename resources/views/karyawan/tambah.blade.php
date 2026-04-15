@extends('layouts.main')

@section('content')
    {{-- Header --}}
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Tambah Karyawan</h2>
            <p class="text-sm text-slate-400 mt-1">Isi formulir untuk menambah karyawan baru</p>
        </div>
        <a href="{{ route('karyawan') }}" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-slate-600 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 hover:border-slate-300 transition-all duration-200">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali
        </a>
    </div>

    {{-- Form Card --}}
    <div class="max-w-xl">
        <div class="bg-white/70 backdrop-blur-sm rounded-2xl border border-slate-200/60 p-8 shadow-sm">
            <form action="{{ route('karyawan.create')}}" method="POST">
                @csrf

                <div class="mb-6">
                    <label for="nama" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Nama Karyawan</label>
                    <input type="text" name="nama" id="nama" placeholder="Masukkan nama lengkap" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-indigo-400 transition-all duration-200" required>
                </div>

                <div class="mb-6">
                    <label for="posisi" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Posisi</label>
                    <input type="text" name="posisi" id="posisi" placeholder="Masukkan posisi karyawan" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-indigo-400 transition-all duration-200" required>
                </div>

                <div class="mb-8">
                    <label for="departemen_id" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Departemen</label>
                    <select name="departemen_id" id="departemen_id" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-indigo-400 transition-all duration-200 appearance-none cursor-pointer">
                        <option value="">-- Pilih Departemen --</option>
                        @foreach ($departemens as $dept)
                            <option value="{{ $dept->id }}">{{ $dept->nama_departemen }}</option>
                        @endforeach
                    </select>
                </div>
                
                <button type="submit" class="w-full py-3 bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold rounded-xl shadow-lg shadow-indigo-200 hover:shadow-xl hover:shadow-indigo-300 hover:-translate-y-0.5 transition-all duration-300 cursor-pointer">
                    Tambah Karyawan
                </button>
            </form>
        </div>
    </div>
@endsection