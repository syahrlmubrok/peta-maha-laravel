# 🚀 PETA MAHA - Pemetaan Talenta dan Minat Mahasiswa

**PETA MAHA** adalah aplikasi web asesmen yang dirancang khusus untuk mahasiswa FKIP Universitas Mulawarman. Aplikasi ini membantu memetakan talenta dan minat mahasiswa ke dalam 12 dimensi kompetensi serta memberikan rekomendasi skim PKM (Program Kreativitas Mahasiswa).

## ✨ Fitur Utama
- **Identity Validation:** Sistem login cepat menggunakan Nama dan NIM.
- **Vibe Assessment Engine:** 48 Butir instrumen pemetaan dengan sistem paginasi.
- **Auto-Scoring & Classification:** Kalkulasi skor otomatis (Tinggi, Sedang, Rendah) berbasis 12 dimensi kompetensi.
- **Evidence-Based Output:** Hasil pemetaan yang dapat langsung dicetak atau disimpan sebagai PDF.

## 🛠️ Tech Stack
- **Framework:** Laravel 12
- **Styling:** Tailwind CSS (Responsive Design)
- **Database:** MySQL
- **Workflow:** **Vibe Coding** — Dikembangkan secara kolaboratif menggunakan AI untuk efisiensi logika arsitektur MVC dan UI/UX yang presisi.

## ⚙️ Cara Menjalankan Secara Lokal
1. Clone repository: `git clone https://github.com/syahrlmubrok/peta-maha-laravel.git`
2. Jalankan `composer install`
3. Salin `.env.example` ke `.env` dan atur koneksi database.
4. Jalankan `php artisan key:generate`
5. Jalankan `php artisan migrate:fresh`
6. Jalankan `php artisan serve`

---
*Proyek ini dikembangkan sebagai bagian dari tugas akhir/portofolio Evidence-Based Output FKIP Unmul 2026.*
