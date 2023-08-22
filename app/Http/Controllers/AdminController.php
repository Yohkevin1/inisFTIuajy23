<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Timeline;
use App\Models\SosialMedia;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Hash;
use Auth;
use Image;


class AdminController extends Controller
{
    public function Login()
    {
        if (session('table') == 'admin')
            return redirect()->route('admin.dashboard');
        elseif (session('table') == 'user' && session('role') == 'acara')
            return redirect()->route('admin.timeline');
        elseif (session('table') == 'user' && session('role') == 'sekret')
            return redirect()->route('admin.kelompok');
        else
            return view('admin.login');
    }
    public function Dashboard()
    {
        $sosmed = SosialMedia::orderBy('id', 'ASC')->get();

        return view('admin.index', compact('sosmed'));
    }
    //login yg lama
    // public function StoreLogin(Request $request)
    // {
    //     $check = $request->all();

    //     if (Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']]) || Auth::guard('admin')->attempt(['npm' => $check['email'], 'password' => $check['password']])) {
    //         $data = Auth::guard('admin')->user();
    //         $namaArray = explode(' ', $data['name']);
    //         // Mengambil dua kata pertama
    //         $namaDepan = $namaArray[0];
    //         $namaBelakang = isset($namaArray[1]) ? $namaArray[1] : '';
    //         $ses_data = [
    //             'nama' => $namaDepan . " " . $namaBelakang,
    //             'npm' => $data['npm'],
    //             'email' => $data['email'],
    //             'password' => $data['password'],
    //             'table' => 'admin',
    //         ];
    //         // dd($ses_data);
    //         $request->session()->put($ses_data);
    //         return redirect()->route('admin.dashboard');
    //     } else {
    //         if (Auth::guard('user')->attempt(['email' => $check['email'], 'password' => $check['password']]) || Auth::guard('user')->attempt(['npm' => $check['email'], 'password' => $check['password']])) {
    //             $data = Auth::guard('user')->user();
    //             $namaArray = explode(' ', $data['name']);
    //             // Mengambil dua kata pertama
    //             $namaDepan = $namaArray[0];
    //             $namaBelakang = isset($namaArray[1]) ? $namaArray[1] : '';

    //             $ses_data = [
    //                 'nama' => $namaDepan . '' . $namaBelakang,
    //                 'npm' => $data['npm'],
    //                 'email' => $data['email'],
    //                 'password' => $data['password'],
    //                 'role' => $data['role'],
    //                 'table' => 'user',
    //             ];
    //             // dd($ses_data);
    //             $request->session()->put($ses_data);
    //         }
    //         if (session('role') == 'acara') {
    //             return redirect()->route('admin.timeline');
    //         } else
    //             return redirect()->route('admin.kelompok');
    //     }
    //     return redirect()->route('admin.login')->with('error', 'Invalid Email/NPM or Password');
    // }

    //login yang baru
    public function StoreLogin(Request $request)
    {
        $check = $request->all();

        // Coba login dengan menggunakan email atau npm untuk admin
        $isAdminLogin = Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']]) || Auth::guard('admin')->attempt(['npm' => $check['email'], 'password' => $check['password']]);

        if ($isAdminLogin) {
            $data = Auth::guard('admin')->user();
        } else {
            // Coba login dengan menggunakan email atau npm untuk user
            $isUserLogin = Auth::guard('user')->attempt(['email' => $check['email'], 'password' => $check['password']]) || Auth::guard('user')->attempt(['npm' => $check['email'], 'password' => $check['password']]);
            if ($isUserLogin) {
                $data = Auth::guard('user')->user();
            } else {
                return redirect()->route('admin.login')->with('error', 'Invalid Email/NPM or Password');
            }
        }

        $namaArray = explode(' ', $data['name']);
        $namaDepan = $namaArray[0];
        $namaBelakang = isset($namaArray[1]) ? $namaArray[1] : '';

        // Data session yang ingin disimpan
        $ses_data = [
            'nama' => $namaDepan . ' ' . $namaBelakang,
            'npm' => $data['npm'],
            'email' => $data['email'],
            'password' => $data['password'],
            'table' => $isAdminLogin ? 'admin' : 'user',
        ];

        if (!$isAdminLogin) {
            $ses_data['role'] = $data['role'];
        }
        // dd($ses_data);
        // Menyimpan data session
        $request->session()->put($ses_data);

        // Redirect sesuai role atau role admin jika tidak ada role pada user
        if ($isAdminLogin)
            return redirect()->route('admin.dashboard');
        else if ($data['role'] == 'acara') {
            return redirect()->route('admin.timeline');
        } else if ($data['role'] == 'sekret') {
            return redirect()->route('admin.kelompok');
        } else {
            return redirect()->route('admin.tugas');
        }
    }

    public function Logout()
    {
        Session::flush();

        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }

    public function Timeline()
    {
        $timelines = Timeline::orderBy('tanggal_pelaksanaan', 'ASC')->get();
        return view('admin.timeline.index', compact('timelines'));
    }
    public function StoreTimeline(Request $request)
    {
        $request->validate(
            [
                'nama_event' => 'required',
                'tanggal_pelaksanaan' => 'required',
            ],
            [
                'nama_event.required' => 'Input nama event',
                'tanggal_pelaksanaan.required' => 'Input tanggal pelaksanaan',
            ]
        );

        Timeline::insert([
            'nama_event' => $request->nama_event,
            'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan,
        ]);

        $notification = [
            'message' => 'Event sukses dibuat',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }
    public function EditTimeline($id)
    {
        $id = decrypt($id);
        $timeline = Timeline::where('id', $id)->first();
        return view('admin.timeline.edit', compact('timeline'));
    }
    public function UpdateTimeline(Request $request, $id)
    {
        $request->validate(
            [
                'nama_event' => 'required',
                'tanggal_pelaksanaan' => 'required',
            ],
            [
                'nama_event.required' => 'Input nama event',
                'tanggal_pelaksanaan.required' => 'Input tanggal pelaksanaan',
            ]
        );
        $id = decrypt($id);
        Timeline::findOrFail($id)->update([
            'nama_event' => $request->nama_event,
            'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan,
        ]);

        $notification = [
            'message' => 'Event sukses diupdate',
            'alert-type' => 'success'
        ];
        return redirect()->route('admin.timeline')->with($notification);
    }

    public function TimelineDelete($id)
    {
        $id = decrypt($id);
        Timeline::findOrFail($id)->delete();
        $notification = [
            'message' => 'Event sukses dihapus',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }
    public function StoreSosmed(Request $request)
    {
        $request->validate(
            [
                'nama_sosmed' => 'required',
                'logo' => 'required|mimes:jpeg,jpg,png',
                'link' => 'required|url',
            ],
            [
                'nama_sosmed.required' => 'Input nama sosmed',
                'logo.required' => 'Input logo',
                'logo.mimes' => 'Format file foto harus jpeg, jpg, atau png',
                'link.required' => 'Input link',
                'link.url' => 'Format link tidak valid',
            ]
        );

        $image = $request->file('logo');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->save('upload/sosmed/' . $name_gen);
        $save_url = '/upload/sosmed/' . $name_gen;

        SosialMedia::insert([
            'nama_sosmed' => $request->nama_sosmed,
            'logo' => $save_url,
            'link' => $request->link,
        ]);

        $notification = [
            'message' => 'Sosial Media Sukses Dibuat',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function DeleteSosmed($id)
    {
        $id = decrypt($id);
        $sosmed = SosialMedia::findOrFail($id);
        $sosmed_image = $sosmed->logo;
        $sosmed_image = explode('/', $sosmed_image, 2);
        $sosmed_image = $sosmed_image[1];
        unlink($sosmed_image);
        SosialMedia::findOrFail($id)->delete();

        $notification = [
            'message' => 'Event sukses dihapus',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function UserPage()
    {
        $data = User::get();
        // dd($data);
        return view('admin.user.AccUser', compact('data'));
    }

    public function AddUser(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:10|same:pass_confirm',
            'pass_confirm' => 'required',
            'role' => 'required',
        ], [
            'nama.required' => 'Input nama diperlukan',
            'email.required' => 'Input email diperlukan',
            'email.unique' => 'Email sudah digunakan oleh pengguna lain',
            'password.required' => 'Input password diperlukan',
            'password.min' => 'Password minimal 10 karakter',
            'password.same' => 'Password dan Password Konfirmasi tidak cocok',
            'pass_confirm.required' => 'Password Konfirmasi diperlukan',
            'role.required' => 'Role harus dipilih',
        ]);
        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        $notification = [
            'message' => 'Akun berhasil ditambahkan',
            'alert-type' => 'success'
        ];
        return back()->with($notification);
    }

    public function delete($id)
    {
        $id = decrypt($id);
        User::findOrFail($id)->delete();
        $notification = [
            'message' => 'Akun sukses dihapus',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function UpdateUserPage($id)
    {
        $id = decrypt($id);
        $user = User::where('id', $id)->first();
        $akun = $admin ?? $user;
        // dd($akun);
        return view('admin.user.UpdateUser', compact('akun'));
    }

    public function updateUser(Request $request, $id)
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
        User::findOrFail($id)->update([
            'name' => $request->nama,
            'password' => Hash::make($request->password),
        ]);
        $notification = [
            'message' => 'Password berhasil diperbarui',
            'alert-type' => 'success'
        ];
        return redirect()->route('admin.account_user')->with($notification);
    }
}
