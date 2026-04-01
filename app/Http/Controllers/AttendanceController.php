<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;
use App\Models\Teacher;
use Carbon\Carbon;

class AttendanceController extends Controller
{
public function absenMasuk()
{
    if (!Auth::check()) {
        return back()->with('error', 'User belum login');
    }

    $user = Auth::user();

    $teacher = \App\Models\Teacher::where('user_id', $user->id)->first();

    if (!$teacher) {
        return back()->with('error', 'User ini tidak terdaftar sebagai guru');
    }

    $today = now()->toDateString();

    $cek = \App\Models\Attendance::where('teacher_id', $teacher->id)
        ->where('tanggal', $today)
        ->first();

    if ($cek) {
        return back()->with('error', 'Sudah absen masuk hari ini');
    }

    $jamMasuk = now();
    $batas = \Carbon\Carbon::createFromTime(7,30,0);
    $keterangan = $jamMasuk->gt($batas) ? 'Terlambat' : 'Tepat Waktu';

    \App\Models\Attendance::create([
        'teacher_id' => $teacher->id,
        'tanggal' => $today,
        'jam_masuk' => $jamMasuk,
        'status' => 'hadir',
        'keterangan' => $keterangan
    ]);

    return back()->with('success', 'Absen masuk berhasil');
}
}