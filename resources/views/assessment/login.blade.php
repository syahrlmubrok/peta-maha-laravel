@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen p-4">
    <div class="bg-white rounded-xl shadow-2xl p-8 w-full max-w-md">
        <div class="text-center mb-8">
            <img 
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/13/Logo_Universitas_Mulawarman.svg/200px-Logo_Universitas_Mulawarman.svg.png" 
                alt="Logo Universitas Mulawarman" 
                class="w-24 h-24 mx-auto mb-4 object-contain"
            />
            <h1 class="text-[#0a1f44] mb-2 font-bold text-2xl">PETA MAHA</h1>
            <p class="text-gray-600 text-sm">Pemetaan Talenta dan Minat Mahasiswa</p>
            <p class="text-gray-500 text-sm mt-1">FKIP Universitas Mulawarman</p>
        </div>

        <form action="{{ route('assessment.start') }}" method="POST" class="space-y-4">
            @csrf <div>
                <label for="name" class="block text-gray-700 mb-2 font-medium">Nama Lengkap</label>
                <input type="text" name="name" id="name" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0a1f44] bg-white"
                    placeholder="Masukkan nama lengkap (Sesuai SIA)">
            </div>

            <div>
                <label for="nim" class="block text-gray-700 mb-2 font-medium">Nomor Induk Mahasiswa (NIM)</label>
                <input type="text" name="nim" id="nim" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0a1f44] bg-white"
                    placeholder="Masukkan NIM">
            </div>

            <div>
                <label for="pkm_preference" class="block text-gray-700 mb-2 font-medium">Preferensi Skim PKM (Opsional)</label>
                <select name="pkm_preference" id="pkm_preference" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0a1f44] bg-white">
                    <option value="">Pilih Skim PKM yang Diminati</option>
                    <option value="PKM-RE">PKM-RE (Riset Eksakta)</option>
                    <option value="PKM-RSH">PKM-RSH (Riset Sosial Humaniora)</option>
                    <option value="PKM-K">PKM-K (Kewirausahaan)</option>
                    <option value="PKM-PM">PKM-PM (Pengabdian Masyarakat)</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-[#0a1f44] text-white py-3 rounded-lg hover:bg-[#0d2857] transition-colors mt-6 font-semibold">
                Lanjut ke Asesmen
            </button>
        </form>
    </div>
</div>
@endsection