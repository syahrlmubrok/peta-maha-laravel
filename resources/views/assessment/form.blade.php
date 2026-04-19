@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen p-4 py-10">
    <div class="bg-white rounded-xl shadow-2xl p-8 w-full max-w-4xl">
        <div class="border-b pb-4 mb-6">
            <h2 class="text-2xl font-bold text-[#0a1f44]">Instrumen PETA MAHA</h2>
            <p class="text-gray-600 mt-2">Pilih tingkat kesesuaian dari setiap pernyataan di bawah ini berdasarkan kondisi dirimu. (1 = Sangat Tidak Sesuai, 5 = Sangat Sesuai).</p>
        </div>

        <form action="{{ route('assessment.submit') }}" method="POST" class="space-y-8">
            @csrf
            
            @php
                $questions = [
                    "Saya mampu menyusun latar belakang masalah berdasarkan data literatur ilmiah.",
                    "Saya menggunakan sumber ilmiah terpercaya ketika menulis karya akademik.",
                    "Saya dapat menyusun argumen tertulis yang didukung oleh bukti ilmiah.",
                    "Saya mampu menyusun tulisan ilmiah dengan struktur yang sistematis.",
                    "Saya memahami perbedaan dasar antara penelitian kuantitatif, kualitatif dan penelitian pengembangan.",
                    "Saya dapat menentukan metode penelitian yang sesuai dengan tujuan penelitian.",
                    "Saya mampu merancang langkah-langkah pengumpulan data secara sistematis.",
                    "Saya dapat mengoperasikan teknik analisis data yang sesuai dengan jenis data ilmiah."
                    // Tambahkan sisa pertanyaan hingga 48 di sini saat deployment
                ];
            @endphp

            @foreach($questions as $index => $question)
                <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                    <p class="font-medium text-gray-800 mb-4">{{ $index + 1 }}. {{ $question }}</p>
                    <div class="flex flex-wrap gap-4 sm:gap-8 justify-between sm:justify-start">
                        @for($i = 1; $i <= 5; $i++)
                            <label class="flex flex-col items-center cursor-pointer group">
                                <input type="radio" name="q{{ $index + 1 }}" value="{{ $i }}" required class="w-5 h-5 text-[#0a1f44] focus:ring-[#0a1f44] border-gray-300">
                                <span class="mt-2 text-sm text-gray-600 group-hover:text-[#0a1f44] font-medium">{{ $i }}</span>
                            </label>
                        @endfor
                    </div>
                </div>
            @endforeach

            <div class="pt-6 border-t mt-8">
                <button type="submit" class="w-full sm:w-auto px-8 py-3 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-lg transition-colors shadow-md text-lg">
                    Kirim Jawaban & Lihat Hasil
                </button>
            </div>
        </form>
    </div>
</div>
@endsection