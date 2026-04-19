@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen p-4">
    <div class="bg-white rounded-xl shadow-2xl p-8 w-full max-w-2xl text-center">
        
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-[#0a1f44]">Hasil PETA MAHA</h1>
            <p class="text-gray-600 mt-2">Terima kasih telah menyelesaikan asesmen, <strong>{{ $student->name }}</strong> ({{ $student->nim }}).</p>
        </div>

        <div class="bg-[#0a1f44] rounded-xl p-8 text-white mb-8 shadow-inner">
            <p class="text-lg text-blue-200 mb-2">Total Skor Anda</p>
            <p class="text-6xl font-bold mb-4">{{ $student->total_score }} <span class="text-2xl font-normal text-gray-400">/ 240</span></p>
            
            <div class="inline-block bg-orange-500 text-white px-6 py-2 rounded-full text-xl font-semibold shadow-lg uppercase tracking-wide">
                Kategori: {{ $student->classification }}
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-left mb-8">
            @foreach($student->dimension_scores as $dimensi => $skor)
                <div class="bg-gray-50 border border-gray-200 p-4 rounded-lg flex justify-between items-center">
                    <span class="font-medium text-gray-700 capitalize">{{ str_replace('_', ' ', $dimensi) }}</span>
                    <span class="bg-[#1e3a6f] text-white px-3 py-1 rounded text-sm font-bold">{{ $skor }}</span>
                </div>
            @endforeach
        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#" onclick="window.print()" class="bg-gray-800 hover:bg-gray-900 text-white font-semibold py-3 px-6 rounded-lg transition-colors flex-1 shadow-md">
                Cetak / Ekspor PDF
            </a>
            <a href="{{ route('assessment.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-3 px-6 rounded-lg transition-colors flex-1 text-center">
                Kembali ke Beranda
            </a>
        </div>

    </div>
</div>
@endsection