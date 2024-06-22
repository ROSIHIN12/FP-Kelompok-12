<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Auth Controllers
use App\Http\Controllers\Auth\LoginController;

// Admin Controllers
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminKategoriKursusController;
use App\Http\Controllers\AdminKursusController;
use App\Http\Controllers\AdminTugasController;
use App\Http\Controllers\AdminPengumpulanTugasController;
use App\Http\Controllers\AdminPenilaianController;
use App\Http\Controllers\AdminKehadiranController;
use App\Http\Controllers\AdminIsiKehadiranController;
use App\Http\Controllers\AdminPendaftaranController;
use App\Http\Controllers\AdminPembayaranController;
use App\Http\Controllers\AdminInformasiController;
use App\Http\Controllers\AdminMateriKursusController;
use App\Http\Controllers\AdminPengaturanController;

// Guru Controllers
use App\Http\Controllers\DashboardGuruController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\GuruKursusController;
use App\Http\Controllers\GuruTugasController;
use App\Http\Controllers\GuruPengumpulanTugasController;
use App\Http\Controllers\GuruPenilaianController;
use App\Http\Controllers\GuruKehadiranController;
use App\Http\Controllers\GuruMateriKursusController;

// Siswa Controllers
use App\Http\Controllers\DashboardSiswaController;
use App\Http\Controllers\SiswaKursusController;
use App\Http\Controllers\SiswaKursusAktifController;
use App\Http\Controllers\SiswaPendaftaranController;
use App\Http\Controllers\SiswaPembayaranController;
use App\Http\Controllers\SiswaInformasiController;
use App\Http\Controllers\SiswaMateriKursusController;
use App\Http\Controllers\SiswaPengumpulanTugasController;
use App\Http\Controllers\SiswaPenilaianController;
use App\Http\Controllers\SiswaIsiKehadiranController;
use App\Http\Controllers\SiswaKehadiranController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaTugasController;

// Login Route
Route::post('/login', [AdminUserController::class, 'login']);

// Routes protected by jwt-auth middleware
Route::middleware(['jwt-auth:admin'])->prefix('admin')->name('admin.')->group(function() {
    Route::get('dashboard', [DashboardAdminController::class, 'apiDashboard'])->name('api.dashboard');

    Route::get('users', [AdminUserController::class, 'apiIndex'])->name('api.users.index');
    Route::post('users', [AdminUserController::class, 'apiStore'])->name('api.users.store');
    Route::get('users/{id}', [AdminUserController::class, 'apiShow'])->name('api.users.show');
    Route::get('users/name/{name}', [AdminUserController::class, 'apiShowByName'])->name('api.users.showByName');
    Route::put('users/{id}', [AdminUserController::class, 'apiUpdate'])->name('api.users.update');
    Route::delete('users/{id}', [AdminUserController::class, 'apiDestroy'])->name('api.users.destroy');
    
    Route::get('kursus', [AdminKursusController::class, 'apiIndex'])->name('api.kursus.index');
    Route::post('kursus', [AdminKursusController::class, 'apiStore'])->name('api.kursus.store');
    Route::get('kursus/{id}', [AdminKursusController::class, 'apiShow'])->name('api.kursus.show');
    Route::put('kursus/{id}', [AdminKursusController::class, 'apiUpdate'])->name('api.kursus.update');
    Route::delete('kursus/{id}', [AdminKursusController::class, 'apiDestroy'])->name('api.kursus.destroy');

    Route::get('kategoriKursus', [AdminKategoriKursusController::class, 'apiIndex'])->name('api.kategoriKursus.index');
    Route::post('kategoriKursus', [AdminKategoriKursusController::class, 'apiStore'])->name('api.kategoriKursus.store');
    Route::get('kategoriKursus/{id}', [AdminKategoriKursusController::class, 'apiShow'])->name('api.kategoriKursus.show');
    Route::put('kategoriKursus/{id}', [AdminKategoriKursusController::class, 'apiUpdate'])->name('api.kategoriKursus.update');
    Route::delete('kategoriKursus/{id}', [AdminKategoriKursusController::class, 'apiDestroy'])->name('api.kategoriKursus.destroy');

    Route::get('pendaftaran', [AdminPendaftaranController::class, 'apiIndex'])->name('api.pendaftaran.index');
    Route::post('pendaftaran', [AdminPendaftaranController::class, 'apiStore'])->name('api.pendaftaran.store');
    Route::get('pendaftaran/{id}', [AdminPendaftaranController::class, 'apiShow'])->name('api.pendaftaran.show');
    Route::put('pendaftaran/{id}', [AdminPendaftaranController::class, 'apiUpdate'])->name('api.pendaftaran.update');
    Route::delete('pendaftaran/{id}', [AdminPendaftaranController::class, 'apiDestroy'])->name('api.pendaftaran.destroy');

    Route::get('pembayaran', [AdminPembayaranController::class, 'apiIndex'])->name('api.pembayaran.index');
    Route::post('pembayaran', [AdminPembayaranController::class, 'apiStore'])->name('api.pembayaran.store');
    Route::get('pembayaran/{id}', [AdminPembayaranController::class, 'apiShow'])->name('api.pembayaran.show');
    Route::put('pembayaran/{id}', [AdminPembayaranController::class, 'apiUpdate'])->name('api.pembayaran.update');
    Route::delete('pembayaran/{id}', [AdminPembayaranController::class, 'apiDestroy'])->name('api.pembayaran.destroy');

    Route::get('informasi', [AdminInformasiController::class, 'apiIndex'])->name('api.informasi.index');
    Route::post('informasi', [AdminInformasiController::class, 'apiStore'])->name('api.informasi.store');
    Route::get('informasi/{id}', [AdminInformasiController::class, 'apiShow'])->name('api.informasi.show');
    Route::put('informasi/{id}', [AdminInformasiController::class, 'apiUpdate'])->name('api.informasi.update');
    Route::delete('informasi/{id}', [AdminInformasiController::class, 'apiDestroy'])->name('api.informasi.destroy');

    Route::get('pengaturan', [AdminPengaturanController::class, 'apiEdit'])->name('api.pengaturan.edit');
    Route::post('pengaturan', [AdminPengaturanController::class, 'apiUpdate'])->name('api.pengaturan.update');

    Route::get('materi', [AdminMateriKursusController::class, 'apiIndex'])->name('api.materi.index');
    Route::post('materi', [AdminMateriKursusController::class, 'apiStore'])->name('api.materi.store');
    Route::get('materi/{id}', [AdminMateriKursusController::class, 'apiShow'])->name('api.materi.show');
    Route::put('materi/{id}', [AdminMateriKursusController::class, 'apiUpdate'])->name('api.materi.update');
    Route::delete('materi/{id}', [AdminMateriKursusController::class, 'apiDestroy'])->name('api.materi.destroy');

    Route::get('tugas', [AdminTugasController::class, 'apiIndex'])->name('api.tugas.index');
    Route::post('tugas', [AdminTugasController::class, 'apiStore'])->name('api.tugas.store');
    Route::get('tugas/{id}', [AdminTugasController::class, 'apiShow'])->name('api.tugas.show');
    Route::put('tugas/{id}', [AdminTugasController::class, 'apiUpdate'])->name('api.tugas.update');
    Route::delete('tugas/{id}', [AdminTugasController::class, 'apiDestroy'])->name('api.tugas.destroy');

    Route::get('pengumpulan-tugas', [AdminPengumpulanTugasController::class, 'apiIndex'])->name('api.pengumpulanTugas.index');
    Route::post('pengumpulan-tugas', [AdminPengumpulanTugasController::class, 'apiStore'])->name('api.pengumpulanTugas.store');
    Route::get('pengumpulan-tugas/{id}', [AdminPengumpulanTugasController::class, 'apiShow'])->name('api.pengumpulanTugas.show');
    Route::put('pengumpulan-tugas/{id}', [AdminPengumpulanTugasController::class, 'apiUpdate'])->name('api.pengumpulanTugas.update');
    Route::delete('pengumpulan-tugas/{id}', [AdminPengumpulanTugasController::class, 'apiDestroy'])->name('api.pengumpulanTugas.destroy');

    Route::get('penilaian', [AdminPenilaianController::class, 'apiIndex'])->name('api.penilaian.index');
    Route::post('penilaian', [AdminPenilaianController::class, 'apiStore'])->name('api.penilaian.store');
    Route::get('penilaian/{id}', [AdminPenilaianController::class, 'apiShow'])->name('api.penilaian.show');
    Route::put('penilaian/{id}', [AdminPenilaianController::class, 'apiUpdate'])->name('api.penilaian.update');
    Route::delete('penilaian/{id}', [AdminPenilaianController::class, 'apiDestroy'])->name('api.penilaian.destroy');

    Route::get('kehadiran', [AdminKehadiranController::class, 'apiIndex'])->name('api.kehadiran.index');
    Route::post('kehadiran', [AdminKehadiranController::class, 'apiStore'])->name('api.kehadiran.store');
    Route::get('kehadiran/{id}', [AdminKehadiranController::class, 'apiShow'])->name('api.kehadiran.show');
    Route::put('kehadiran/{id}', [AdminKehadiranController::class, 'apiUpdate'])->name('api.kehadiran.update');
    Route::delete('kehadiran/{id}', [AdminKehadiranController::class, 'apiDestroy'])->name('api.kehadiran.destroy');
    
    Route::get('isi-kehadiran', [AdminIsiKehadiranController::class, 'apiIndex'])->name('api.isiKehadiran.index');
    Route::post('isi-kehadiran', [AdminIsiKehadiranController::class, 'apiStore'])->name('api.isiKehadiran.store');
    Route::get('isi-kehadiran/{id}', [AdminIsiKehadiranController::class, 'apiShow'])->name('api.isiKehadiran.show');
    Route::put('isi-kehadiran/{id}', [AdminIsiKehadiranController::class, 'apiUpdate'])->name('api.isiKehadiran.update');
    Route::delete('isi-kehadiran/{id}', [AdminIsiKehadiranController::class, 'apiDestroy'])->name('api.isiKehadiran.destroy');
});

Route::middleware(['jwt-auth:guru'])->prefix('guru')->name('guru.')->group(function() {
    Route::get('dashboard', [DashboardGuruController::class, 'apiDashboard']);

    Route::get('tugas', [GuruTugasController::class, 'apiIndex'])->name('api.tugas.index');
    Route::post('tugas', [GuruTugasController::class, 'apiStore'])->name('api.tugas.store');
    Route::get('tugas/{id}', [GuruTugasController::class, 'apiShow'])->name('api.tugas.show');
    Route::get('tugas/name/{name}', [GuruTugasController::class, 'apiShowByName'])->name('api.tugas.showByName');
    Route::put('tugas/{id}', [GuruTugasController::class, 'apiUpdate'])->name('api.tugas.update');
    Route::delete('tugas/{id}', [GuruTugasController::class, 'apiDestroy'])->name('api.tugas.destroy');

    Route::get('pengumpulan-tugas', [GuruPengumpulanTugasController::class, 'apiIndex'])->name('api.pengumpulan-tugas.index');
    Route::get('pengumpulan-tugas/{id}', [GuruPengumpulanTugasController::class, 'apiShow'])->name('api.pengumpulan-tugas.show');

    Route::get('profile', [GuruController::class, 'apiShowProfile'])->name('api.profile.show');
    Route::put('profile', [GuruController::class, 'apiUpdateProfile'])->name('api.profile.update');

    Route::get('materi', [GuruMateriKursusController::class, 'apiIndex'])->name('api.materi.index');
    Route::post('materi', [GuruMateriKursusController::class, 'apiStore'])->name('api.materi.store');
    Route::get('materi/{id}', [GuruMateriKursusController::class, 'apiShowById'])->name('api.materi.showById');
    Route::get('materi/name/{name}', [GuruMateriKursusController::class, 'apiShowByName'])->name('api.materi.showByName');
    Route::put('materi/{id}', [GuruMateriKursusController::class, 'apiUpdate'])->name('api.materi.update');
    Route::delete('materi/{id}', [GuruMateriKursusController::class, 'apiDestroy'])->name('api.materi.destroy');

    Route::get('penilaian', [GuruPenilaianController::class, 'apiIndex'])->name('api.penilaian.index');
    Route::post('penilaian', [GuruPenilaianController::class, 'apiStore'])->name('api.penilaian.store');
    Route::get('penilaian/{id}', [GuruPenilaianController::class, 'apiShowById'])->name('api.penilaian.showById');
    Route::get('penilaian/name/{name}', [GuruPenilaianController::class, 'apiShowByName'])->name('api.penilaian.showByName');
    Route::put('penilaian/{id}', [GuruPenilaianController::class, 'apiUpdate'])->name('api.penilaian.update');
    Route::delete('penilaian/{id}', [GuruPenilaianController::class, 'apiDestroy'])->name('api.penilaian.destroy');

    Route::get('kehadiran', [GuruKehadiranController::class, 'apiIndex'])->name('api.kehadiran.index');
    Route::post('kehadiran', [GuruKehadiranController::class, 'apiStore'])->name('api.kehadiran.store');
    Route::get('kehadiran/{kursus_id}/{tanggal}', [GuruKehadiranController::class, 'apiShow'])->name('api.kehadiran.show');
    Route::put('kehadiran/{kursus_id}/{tanggal}', [GuruKehadiranController::class, 'apiUpdate'])->name('api.kehadiran.update');
    Route::delete('kehadiran/{kursus_id}/{tanggal}', [GuruKehadiranController::class, 'apiDestroy'])->name('api.kehadiran.destroy');
});

Route::middleware(['jwt-auth:siswa'])->prefix('siswa')->name('siswa.')->group(function() {
    Route::get('dashboard', [DashboardSiswaController::class, 'apiDashboard'])->name('api.dashboard');

    Route::get('pendaftaran', [SiswaPendaftaranController::class, 'apiIndex'])->name('api.pendaftaran.index');
    Route::post('pendaftaran', [SiswaPendaftaranController::class, 'apiStore'])->name('api.pendaftaran.store');
    Route::get('pendaftaran/{id}', [SiswaPendaftaranController::class, 'apiShow'])->name('api.pendaftaran.show');
    Route::delete('pendaftaran/{id}', [SiswaPendaftaranController::class, 'apiDestroy'])->name('api.pendaftaran.destroy');

    Route::get('pembayaran', [SiswaPembayaranController::class, 'apiIndex'])->name('api.pembayaran.index');
    Route::post('pembayaran', [SiswaPembayaranController::class, 'apiStore'])->name('api.pembayaran.store');
    Route::get('pembayaran/{id}', [SiswaPembayaranController::class, 'apiShow'])->name('api.pembayaran.show');

    Route::get('informasi', [SiswaInformasiController::class, 'apiIndex'])->name('api.informasi.index');
    Route::get('informasi/{id}', [SiswaInformasiController::class, 'apiShow'])->name('api.informasi.show');

    Route::get('materi', [SiswaMateriKursusController::class, 'apiIndex'])->name('api.materi.index');
    Route::get('materi/{id}', [SiswaMateriKursusController::class, 'apiShow'])->name('api.materi.show');

    Route::get('pengumpulan-tugas', [SiswaPengumpulanTugasController::class, 'apiIndex'])->name('api.pengumpulan-tugas.index');
    Route::post('pengumpulan-tugas', [SiswaPengumpulanTugasController::class, 'apiStore'])->name('api.pengumpulan-tugas.store');
    Route::get('pengumpulan-tugas/{id}', [SiswaPengumpulanTugasController::class, 'apiShow'])->name('api.pengumpulan-tugas.show');
    Route::put('pengumpulan-tugas/{id}', [SiswaPengumpulanTugasController::class, 'apiUpdate'])->name('api.pengumpulan-tugas.update');

    Route::get('penilaian', [SiswaPenilaianController::class, 'apiIndex'])->name('api.penilaian.index');
    Route::get('penilaian/{id}', [SiswaPenilaianController::class, 'apiShow'])->name('api.penilaian.show');

    Route::get('isi-kehadiran', [SiswaIsiKehadiranController::class, 'apiIndex'])->name('api.isi-kehadiran.index');
    Route::post('isi-kehadiran', [SiswaIsiKehadiranController::class, 'apiStore'])->name('api.isi-kehadiran.store');
    Route::get('isi-kehadiran/{id}', [SiswaIsiKehadiranController::class, 'apiShow'])->name('api.isi-kehadiran.show');

    Route::get('kehadiran', [SiswaKehadiranController::class, 'apiIndex'])->name('api.kehadiran.index');
    Route::post('kehadiran', [SiswaKehadiranController::class, 'apiStore'])->name('api.kehadiran.store');
    Route::get('kehadiran/{id}', [SiswaKehadiranController::class, 'apiShow'])->name('api.kehadiran.show');

    Route::get('profil', [SiswaController::class, 'apiShowProfile'])->name('api.profile.show');
    Route::put('profil', [SiswaController::class, 'apiUpdateProfile'])->name('api.profile.update');

    Route::get('tugas', [SiswaTugasController::class, 'apiIndex'])->name('api.tugas.index');
    Route::get('tugas/{id}', [SiswaTugasController::class, 'apiShow'])->name('api.tugas.show');
});
