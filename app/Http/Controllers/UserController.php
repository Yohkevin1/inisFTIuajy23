<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Admin;
use App\Models\Atribut;
use App\Models\MahasiswaBaru;
use App\Models\User;
use App\Models\Tugas;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function index()
    {
        $users = MahasiswaBaru::get();

        return view('admin.kelompok.kelompok', compact('users'));
    }

    public function updateMahasiswa(Request $request, $id)
    {
        $request->validate(
            [
                'nama' => ['required', 'regex:/^[^\d]+$/i', 'min:10'],
                'npm' => ['required', 'numeric', 'digits_between:9,11'],
                'kelompok' => 'required',
                'status' => 'required',
            ],
            [
                'nama.required' => 'Input nama',
                'nama.regex' => 'Nama tidak boleh mengandung angka',
                'nama.min' => 'Nama harus memiliki minimal 10 karakter',
                'npm.required' => 'Input npm',
                'npm.numeric' => 'NPM harus berupa angka',
                'npm.digits_between' => 'NPM harus memiliki 9 hingga 11 digit',
                'kelompok.required' => 'Input Kelompok',
                'status.required' => 'Status harus dipilih',
            ]
        );
        $id = decrypt($id);
        MahasiswaBaru::findOrFail($id)->update([
            'nama' => $request->nama,
            'npm' => $request->npm,
            'kelompok' => $request->kelompok,
            'status_lulus' => $request->status,
        ]);
        $notification = [
            'message' => 'Data berhasil diupdate',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        $mah = MahasiswaBaru::get()->count();
        if ($mah == 0) {
            return back();
        }
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import()
    {
        if (request()->file('file') == null) {
            return back();
        }
        Excel::import(new UsersImport, request()->file('file'));

        return back();
    }

    public function deleteMahasiswa($id)
    {
        $id = decrypt($id);
        MahasiswaBaru::findOrFail($id)->delete();
        $notification = [
            'message' => 'Data mahasiswa berhasil dihapus',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function deleteAllMahasiswa()
    {
        // Hapus semua data mahasiswa
        MahasiswaBaru::truncate();

        $notification = [
            'message' => 'Semua data mahasiswa berhasil dihapus',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function Account($id)
    {
        $id = decrypt($id);
        $admin = Admin::where('npm', $id)->orwhere('email', $id)->first();
        $user = User::where('npm', $id)->orwhere('email', $id)->first();
        $akun = $admin ?? $user;
        // dd($akun);
        return view('admin.akun', compact('akun'));
    }

    //update account yg login
    public function Update(Request $request, $id)
    {
        $request->validate(
            [
                'nama' => ['required', 'regex:/^[^\d]+$/i', 'min:10'],
                'password' => 'required|min:10|same:password_confirmation',
                'password_confirmation' => 'required',
            ],
            [
                'nama.required' => 'Input nama',
                'nama.regex' => 'Nama tidak boleh mengandung angka',
                'nama.min' => 'Nama harus memiliki minimal 10 karakter',
                'password.required' => 'Input Password',
                'password.min' => 'Password harus memiliki minimal 10 karakter',
                'password.same' => 'Password dan Password Konfirmasi tidak cocok',
                'password_confirmation.required' => 'Password Konfirmasi diperlukan',
            ]
        );
        $id = decrypt($id);
        if (session('table') == 'admin') {
            Admin::findOrFail($id)->update([
                'name' => $request->nama,
                'password' => Hash::make($request->password),
            ]);
            $notification = [
                'message' => 'Password berhasil diperbarui',
                'alert-type' => 'success'
            ];
            $data = Admin::where('id', $id)->first();
            $namaArray = explode(' ', $data['name']);
            // Mengambil dua kata pertama
            $namaDepan = $namaArray[0];
            $namaBelakang = isset($namaArray[1]) ? $namaArray[1] : '';
            $ses_data = [
                'nama' => $namaDepan . " " . $namaBelakang,
                'npm' => $data['npm'],
                'email' => $data['email'],
                'password' => $data['password'],
                'table' => 'admin',
            ];
            // dd(session()->all());
            $request->session()->put($ses_data);
            return redirect()->route('admin.dashboard')->with($notification);
        } else {
            User::findOrFail($id)->update([
                'name' => $request->nama,
                'password' => Hash::make($request->password),
            ]);
            $notification = [
                'message' => 'Password berhasil diperbarui',
                'alert-type' => 'success'
            ];
            $data = User::where('id', $id)->first();
            $namaArray = explode(' ', $data['name']);
            // Mengambil dua kata pertama
            $namaDepan = $namaArray[0];
            $namaBelakang = isset($namaArray[1]) ? $namaArray[1] : '';

            $ses_data = [
                'nama' => $namaDepan . '' . $namaBelakang,
                'npm' => $data['npm'],
                'email' => $data['email'],
                'password' => $data['password'],
                'role' => $data['role'],
                'table' => 'user',
            ];
            // dd(session()->all());
            $request->session()->put($ses_data);
            if (session('role') == 'sekret')
                return redirect()->route('admin.timeline')->with($notification);
            else
                return redirect()->route('admin.kelompok')->with($notification);
        }
    }

    public function tugas()
    {
        $tugas = Tugas::get();
        // dd($tugas);
        return view('admin.tugas.tugas', compact('tugas'));
    }

    // saveTugas1
    public function saveTugas(Request $request)
    {
        $request->validate(
            [
                'judul' => 'required',
                'deskripsi' => 'required',
                'file' => 'nullable|mimes:pdf,docx',
                'link' => 'nullable|url',
                'start_date' => 'nullable|required_with:link|before_or_equal:end_date',
                'end_date' => 'nullable|required_with:link|after_or_equal:start_date',
            ],
            [
                'judul.required' => 'Input judul tugas',
                'deskripsi.required' => 'Input deskripsi tugas',
                'file.mimes' => 'Format file file harus docx atau pdf',
                'link.url' => 'Format link tidak valid',
                'start_date.required_with' => 'Opened date harus diisi jika ada Link',
                'end_date.required_with' => 'Due date harus diisi jika ada Link',
                'start_date.before_or_equal' => 'Opened date harus lebih awal atau sama dengan Due date',
                'end_date.after_or_equal' => 'Due date harus lebih akhir atau sama dengan Opened date',
            ]
        );
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            // Simpan berkas di direktori storage/app/public/tugas
            $file->move('upload/tugas', $name_gen);
            // Simpan URL berkas yang dapat diakses
            $file_url = 'upload/tugas/' . $name_gen;
        } else {
            $file_url = null;
        }

        $start_date = $request->start_date ?? null;
        $end_date = $request->end_date ?? null;
        $link = $request->link ?? null;

        Tugas::insert([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file' => $file_url,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'link' => $link
        ]);

        $notification = [
            'message' => 'Berhasil Input Data!',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function editTugas($id)
    {
        $id = decrypt($id);
        $tugas = Tugas::where('id', $id)->first();
        // dd($akun);
        return view('admin.tugas.editTugas', compact('tugas'));
    }

    public function updateTugas(Request $request, $id)
    {
        $request->validate(
            [
                'judul' => 'required',
                'deskripsi' => 'required',
                'file' => 'nullable|mimes:pdf,docx',
                'link' => 'nullable|url',
                'start_date' => 'nullable|required_with:link|before_or_equal:end_date',
                'end_date' => 'nullable|required_with:link|after_or_equal:start_date',
            ],
            [
                'judul.required' => 'Input judul tugas',
                'deskripsi.required' => 'Input deskripsi tugas',
                'file.mimes' => 'Format file file harus docx atau pdf',
                'link.url' => 'Format link tidak valid',
                'start_date.required_with' => 'Opened date harus diisi jika ada Link',
                'end_date.required_with' => 'Due date harus diisi jika ada Link',
                'start_date.before_or_equal' => 'Opened date harus lebih awal atau sama dengan Due date',
                'end_date.after_or_equal' => 'Due date harus lebih akhir atau sama dengan Opened date',
            ]
        );
        $id = decrypt($id);
        $tugas = Tugas::findOrFail($id);

        // Menghapus file yang ada saat mengunggah file baru
        if ($request->hasFile('file')) {
            if ($tugas->file)
                unlink($tugas->file); // Hapus file yang ada sebelumnya
            $file = $request->file('file');
            $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            // Simpan berkas di direktori storage/app/public/tugas
            $file->move('upload/tugas', $name_gen);
            // Simpan path relatif berkas yang dapat diakses
            $file_url = 'upload/tugas/' . $name_gen;
        } else {
            $file_url = $tugas->file; // Tetapkan path relatif file yang ada sebelumnya
        }

        Tugas::findOrFail($id)->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file' => $file_url,
            'start_date' => $request->start_date ?? null,
            'end_date' => $request->end_date ?? null,
            'link' => $request->link ?? null,
        ]);
        $notification = [
            'message' => 'Data berhasil diupdate',
            'alert-type' => 'success'
        ];
        return redirect()->route('admin.tugas')->with($notification);
    }

    public function exportFileTugas($id)
    {
        $id = decrypt($id);
        $tugas = Tugas::findOrFail($id);
        if (!$tugas->file) {
            return back()->with('error', 'File tugas tidak ditemukan.');
        }
        $file = $tugas->file;
        $fileExtension = pathinfo($file, PATHINFO_EXTENSION);

        // Tetapkan header sesuai dengan jenis file
        $headers = [
            'Content-Type' => 'application/' . $fileExtension,
        ];

        // Lakukan pengecekan ekstensi dan proses download
        if (in_array($fileExtension, ['pdf', 'docx'])) {
            return response()->download(public_path($file), $tugas->judul . '.' . $fileExtension, $headers);
        } else {
            return redirect()->back()->with('error', 'Format file tidak valid.');
        }
    }

    public function tugasHapus($id)
    {
        $tugas = Tugas::findOrFail($id);
        // Hapus file terlebih dahulu jika ada
        if ($tugas->file) {
            unlink($tugas->file);
        }
        Tugas::findOrFail($id)->delete();
        $notification = [
            'message' => 'Tugas deleted successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function atribut()
    {
        $atribut = Atribut::get();

        return view('admin.atribut.atribut', compact('atribut'));
    }

    public function saveAtribut(Request $request)
    {
        $request->validate(
            [
                'judul' => 'required',
                'deskripsi' => 'required',
                'file' => 'nullable|mimes:pdf,docx',
            ],
            [
                'judul.required' => 'Input judul',
                'deskripsi.required' => 'Input deskripsi',
                'file.mimes' => 'Format file file harus docx atau pdf',
            ]
        );

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            // Simpan berkas di direktori storage/app/public/tugas
            $file->move('upload/atribut', $name_gen);
            // Simpan URL berkas yang dapat diakses
            $file_url = 'upload/atribut/' . $name_gen;
        } else {
            $file_url = null;
        }

        Atribut::insert([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file' => $file_url,
        ]);

        $notification = [
            'message' => 'Berhasil Input Data!',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function editAtribut($id)
    {
        $id = decrypt($id);
        $atribut = Atribut::where('id', $id)->first();
        // dd($akun);
        return view('admin.atribut.editAtribut', compact('atribut'));
    }

    public function updateAtribut(Request $request, $id)
    {
        $request->validate(
            [
                'judul' => 'required',
                'deskripsi' => 'required',
                'file' => 'nullable|mimes:pdf,docx',
            ],
            [
                'judul.required' => 'Input judul tugas',
                'deskripsi.required' => 'Input deskripsi tugas',
                'file.mimes' => 'Format file file harus docx atau pdf',
            ]
        );
        $id = decrypt($id);
        $atribut = Atribut::findOrFail($id);

        // Menghapus file yang ada saat mengunggah file baru
        if ($request->hasFile('file')) {
            if ($atribut->file)
                unlink($atribut->file); // Hapus file yang ada sebelumnya
            $file = $request->file('file');
            $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            // Simpan berkas di direktori storage/app/public/atribut
            $file->move('upload/atribut', $name_gen);
            // Simpan path relatif berkas yang dapat diakses
            $file_url = 'upload/atribut/' . $name_gen;
        } else {
            $file_url = $atribut->file; // Tetapkan path relatif file yang ada sebelumnya
        }

        Atribut::findOrFail($id)->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file' => $file_url,
        ]);
        $notification = [
            'message' => 'Data berhasil diupdate',
            'alert-type' => 'success'
        ];
        return redirect()->route('admin.atribut')->with($notification);
    }

    public function hapusAtribut($id)
    {
        $atribut = Atribut::findOrFail($id);
        // Hapus file terlebih dahulu jika ada
        if ($atribut->file) {
            unlink($atribut->file);
        }
        Atribut::findOrFail($id)->delete();
        $notification = [
            'message' => 'Atribut deleted successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function exportFileAtribut($id)
    {
        $atribut = Atribut::findOrFail($id);
        if (!$atribut->file) {
            return back()->with('error', 'File atribut tidak ditemukan.');
        }
        $file = $atribut->file;
        $fileExtension = pathinfo($file, PATHINFO_EXTENSION);

        // Tetapkan header sesuai dengan jenis file
        $headers = [
            'Content-Type' => 'application/' . $fileExtension,
        ];

        // Lakukan pengecekan ekstensi dan proses download
        if (in_array($fileExtension, ['pdf', 'docx'])) {
            return response()->download(public_path($file), $atribut->judul . '.' . $fileExtension, $headers);
        } else {
            return redirect()->back()->with('error', 'Format file tidak valid.');
        }
    }
}
