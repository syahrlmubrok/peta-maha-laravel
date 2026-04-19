<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student; // Jangan lupa panggil model Student

class AssessmentController extends Controller
{
    // 1. Tampilkan halaman Login/Awal
    public function index()
    {
        return view('assessment.login');
    }

    // 2. Tangkap Nama & NIM, simpan di session, lanjut ke soal
    public function start(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'nim' => 'required|string',
            'pkm_preference' => 'nullable|string',
        ]);

        // Simpan data identitas ke dalam session sementara
        session(['student_data' => $request->only('name', 'nim', 'pkm_preference')]);

        return redirect()->route('assessment.form');
    }

    // 3. Tampilkan 48 Butir Soal Asesmen
    public function form()
    {
        // Kalau ada yang coba tembak URL tapi belum login, lempar ke depan
        if (!session()->has('student_data')) {
            return redirect()->route('assessment.index');
        }
        return view('assessment.form');
    }

    // 4. Hitung Skor & Simpan ke Database
    public function submit(Request $request)
    {
        $studentData = session('student_data');
        if (!$studentData) {
            return redirect()->route('assessment.index');
        }

        // Ambil semua jawaban dari form web (q1, q2, ... q48)
        $answers = $request->except('_token'); 
        
        $totalScore = 0;
        $dimensionScores = [];

        // Looping untuk menghitung 48 soal
        for ($i = 1; $i <= 48; $i++) {
            $score = (int) ($answers['q'.$i] ?? 0);
            $totalScore += $score;
            
            // Rumus canggih: Kelompokkan tiap 4 soal jadi 1 Dimensi
            // Soal 1-4 = Dimensi 1 | Soal 5-8 = Dimensi 2, dst.
            $dimIndex = ceil($i / 4); 
            if (!isset($dimensionScores["dimensi_$dimIndex"])) {
                $dimensionScores["dimensi_$dimIndex"] = 0;
            }
            $dimensionScores["dimensi_$dimIndex"] += $score;
        }

        // Tentukan Klasifikasi berdasarkan rentang nilai [cite: 13]
        $classification = '';
        if ($totalScore >= 176 && $totalScore <= 240) {
            $classification = 'Tinggi';
        } elseif ($totalScore >= 112 && $totalScore <= 175) {
            $classification = 'Sedang';
        } else {
            $classification = 'Rendah';
        }

        // Simpan semua hasil ke Database
        $student = Student::create([
            'name' => $studentData['name'],
            'nim' => $studentData['nim'],
            'pkm_preference' => $studentData['pkm_preference'],
            'raw_answers' => $answers,
            'dimension_scores' => $dimensionScores,
            'total_score' => $totalScore,
            'classification' => $classification,
        ]);

        // Bersihkan session karena sudah aman di database
        session()->forget('student_data');

        // Arahkan ke halaman Dashboard Hasil
        return redirect()->route('assessment.result', $student->id);
    }

    // 5. Tampilkan Halaman Hasil (PDF/Dashboard)
    public function result($id)
    {
        $student = Student::findOrFail($id);
        return view('assessment.result', compact('student'));
    }
}
