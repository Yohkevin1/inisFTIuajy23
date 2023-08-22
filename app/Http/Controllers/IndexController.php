<?php

namespace App\Http\Controllers;

use App\Models\Atribut;
use Illuminate\Http\Request;
use App\Models\Timeline;
use App\Models\Panitia;
use App\Models\Bidang;
use App\Models\MahasiswaBaru;
use App\Models\Tugas;
use Carbon\Carbon;
use Microsoft\Graph\Graph;

class IndexController extends Controller
{
    public function Index()
    {
        $timelines = Timeline::orderBy('tanggal_pelaksanaan', 'ASC')->get();
        return view('frontend.pages.index', compact('timelines'));
    }
    public function Struktur()
    {
        $timelines = Timeline::orderBy('tanggal_pelaksanaan', 'ASC')->get();
        return view('frontend.pages.struktur', compact('timelines'));
    }
    // public function Panitia()
    // {
    //     $panitia = Panitia::orderBy('id', 'ASC')->get();
    //     $bidang = Bidang::orderBy('prioritas', 'ASC')->get();
    //     // dd($panitia, $bidang);
    //     return view('frontend.pages.panitia2', compact('panitia', 'bidang'));
    // }
    public function Panitia()
    {
        $panitia = Panitia::orderBy('id', 'ASC')->get();
        $bidang = Bidang::orderBy('prioritas', 'ASC')->get();
        // dd($panitia);
        return view('frontend.pages.panitia2', compact('panitia', 'bidang'));
    }
    public function Filosofi()
    {
        return view('frontend.pages.filosofi');
    }

    public function Media()
    {
        return view('frontend.pages.media');
    }
    // public function PanitiaView($id)
    // {
    //     $panitia = Panitia::with('bidang', 'sub_bidang')->where('bidang_id', $id)->get();
    //     return json_encode($panitia);
    // }

    public function PesertaView()
    {
        $mahasiswa = MahasiswaBaru::orderBy('id', 'ASC')->get();
        $lulus = false;
        foreach ($mahasiswa as $items) {
            if ($items->status_lulus == "Lulus") {
                $lulus = true;
                break;
            } elseif ($items->status_lulus == "Tidak Lulus") {
                $lulus = true;
                break;
            }
        }
        return view('frontend.pages.peserta', compact('mahasiswa', 'lulus'));
    }

    public function AtributView()
    {
        $atribut = Atribut::orderBy('id', 'ASC')->get();
        // dd($tugas);
        return view('frontend.pages.atribut', compact('atribut'));
    }

    public function TugasView()
    {
        $tugas = Tugas::orderBy('end_date', 'ASC')->get();

        date_default_timezone_set('Asia/Jakarta');
        $now = Carbon::now()->format('Y-m-d H:i:s');;
        // dd($tugas);
        return view('frontend.pages.tugas', compact('tugas', 'now'));
    }

    // public function downloadFile($id)
    // {
    //     $encryptedId = encrypt($id);
    //     $url = route('download.tugas', $encryptedId);
    //     return redirect($url);
    // }
}
