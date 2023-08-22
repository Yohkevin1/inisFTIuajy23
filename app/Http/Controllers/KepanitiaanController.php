<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bidang;
use App\Models\Admin;
use App\Models\SubBidang;
use App\Models\Panitia;
use Image;
use Hash;
use Illuminate\Support\Facades\Storage;

class KepanitiaanController extends Controller
{
    public function Bidang()
    {
        $bidang = Bidang::orderBy('id', 'ASC')->get();
        return view('admin.panitia.bidang', compact('bidang'));
    }
    public function StoreBidang(Request $request)
    {
        $request->validate(
            [
                'nama_bidang' => 'required',
                'logo_bidang' => 'required|mimes:jpeg,jpg,png',
                'prioritas' => 'required|numeric',
            ],
            [
                'nama_bidang.required' => 'Input nama bidang',
                'logo_bidang.required' => 'Input logo bidang',
                'logo_bidang.mimes' => 'Format file foto harus jpeg, jpg, atau png',
                'prioritas.required' => 'Input prioritas',
                'prioritas.numeric' => 'Inputan harus berupa angka',
            ]
        );

        $image = $request->file('logo_bidang');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->save('upload/panitia/' . $name_gen);
        $save_url = '/upload/panitia/' . $name_gen;

        Bidang::insert([
            'nama_bidang' => $request->nama_bidang,
            'logo_bidang' => $save_url,
            'prioritas' => $request->prioritas,
        ]);

        $notification = [
            'message' => 'Bidang sukses dibuat',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function EditBidang($id)
    {
        $id = decrypt($id);
        $bidang = Bidang::where('id', $id)->get();
        return view('admin.panitia.edit_bidang', compact('bidang'));
    }

    public function UpdateBidang(Request $request, $id)
    {
        $request->validate(
            [
                'nama_bidang' => 'required',
                // 'logo_bidang' => 'required',
                'prioritas' => 'required|numeric',
            ],
            [
                'nama_bidang.required' => 'Input nama bidang',
                // 'logo_bidang.required' => 'Input logo bidang',
                'prioritas.required' => 'Input prioritas',
                'prioritas.numeric' => 'Inputan harus berupa angka',
            ]
        );
        $old_img = $request->old_brand_image;
        $old_img = explode('/', $old_img, 2);
        $old_img = $old_img[1];
        if ($request->file('logo_bidang')) {
            unlink($old_img);
            $image = $request->file('logo_bidang');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('upload/panitia/' . $name_gen);
            $save_url = '/upload/panitia/' . $name_gen;
            $id = decrypt($id);
            Bidang::findOrFail($id)->update([
                'nama_bidang' => $request->nama_bidang,
                'logo_bidang' => $save_url,
                'prioritas' => $request->prioritas
            ]);

            $notification = [
                'message' => 'Bidang berhasil diupdate!',
                'alert-type' => 'success'
            ];
            return redirect()->route('admin.bidang')->with($notification);
        } else {
            $id = decrypt($id);
            Bidang::findOrFail($id)->update([
                'nama_bidang' => $request->nama_bidang,
                'prioritas' => $request->prioritas,
            ]);

            $notification = [
                'message' => 'Bidang berhasil diupdate!',
                'alert-type' => 'success'
            ];
            return redirect()->route('admin.bidang')->with($notification);
        }
        return redirect()->route('admin.bidang')->with($notification);
    }

    public function DeleteBidang($id)
    {
        $id = decrypt($id);
        $bidang = Bidang::findOrFail($id);
        $bidang_image = $bidang->logo_bidang;
        $bidang_image = explode('/', $bidang_image, 2);
        $bidang_image = $bidang_image[1];
        unlink($bidang_image);
        Bidang::findOrFail($id)->delete();

        $notification = [
            'message' => 'bidang deleted successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    // sub bidang
    public function SubBidang()
    {
        $bidang = Bidang::orderBy('id', 'DESC')->get();
        return view('admin.panitia.sub_bidang', compact('bidang'));
    }

    public function StoreSubBidang(Request $request)
    {
        $request->validate(
            [
                'bidang_id' => 'required',
                'nama_sub_bidang' => 'required',
                'prioritas' => 'required|numeric',
            ],
            [
                'bidang_id.required' => 'Pilih bidang',
                'nama_sub_bidang.required' => 'Input nama sub bidang',
                'prioritas.required' => 'Tentukan Prioritas',
                'prioritas.numeric' => 'Inputan harus berupa angka',
            ]
        );

        SubBidang::insert([
            'bidang_id' => $request->bidang_id,
            'nama_sub_bidang' => $request->nama_sub_bidang,
            'prioritas' => $request->prioritas
        ]);

        $notification = [
            'message' => 'Sub Bidang berhasil diinput!',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function DeleteSubBidang($id)
    {
        SubBidang::findOrFail($id)->delete();

        $notification = [
            'message' => 'bidang deleted successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    // panitia

    public function KelolaPanitia()
    {
        $bidang = Bidang::orderBy('prioritas', 'ASC')->get();
        $panitia = Panitia::orderBy('id', 'ASC')->get();
        $sub_bidang = SubBidang::orderBy('prioritas', 'ASC')->get();
        return view('admin.panitia.index', compact('bidang', 'panitia', 'sub_bidang'));
    }

    public function StorePanitia(Request $request)
    {
        $request->validate(
            [
                'bidang_id' => 'required',
                'sub_bidang_id' => 'required',
                'nama' => 'required|regex:/^[^\d]+$/i',
                'foto' => 'required|mimes:jpeg,jpg,png',
            ],
            [
                'bidang_id.required' => 'Input bidang',
                'sub_bidang_id.required' => 'Pilih sub bidang',
                'nama.required' => 'Input nama',
                'nama.regex' => 'Nama tidak boleh mengandung angka',
                'foto.required' => 'Input foto',
                'foto.mimes' => 'Format file foto harus jpeg, jpg, atau png',
            ]
        );

        $image = $request->file('foto');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->save('upload/panitia/' . $name_gen);
        $save_url = 'upload/panitia/' . $name_gen;

        Panitia::insert([
            'bidang_id' => $request->bidang_id,
            'sub_bidang_id' => $request->sub_bidang_id,
            'nama' => $request->nama,
            'foto' => $save_url,
        ]);

        $notification = [
            'message' => 'Berhasil Input Data!',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function PanitiaEdit($id)
    {
        $id = decrypt($id);
        $panitia = Panitia::findOrFail($id);
        $bidang = Bidang::findOrFail($panitia->bidang_id); // Menggunakan find
        $sub_bidang = SubBidang::where('bidang_id', $panitia->bidang_id)->get(); // Menggunakan find
        // dd($sub_bidang);
        return view('admin.panitia.edit', compact('panitia', 'bidang', 'sub_bidang'));
    }

    public function PanitiaUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'bidang_id' => 'required',
                'sub_bidang_id' => 'required',
                'nama' => 'required|regex:/^[^\d]+$/i',
                'foto' => 'mimes:jpeg,jpg,png',
            ],
            [
                'bidang_id.required' => 'Pilih bidang',
                'sub_bidang_id.required' => 'Pilih sub bidang',
                'nama.required' => 'Input nama',
                'nama.regex' => 'Nama tidak boleh mengandung angka',
                'foto.mimes' => 'Format file foto harus jpeg, jpg, atau png',
            ]
        );
        $id = decrypt($id);
        $panitia = Panitia::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($panitia->foto) {
                unlink($panitia->foto); // Delete the existing file
            }
            $image = $request->file('foto');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('upload/panitia/' . $name_gen);
            $save_url = 'upload/panitia/' . $name_gen;
        } else
            $save_url = $panitia->foto;

        Panitia::findOrFail($id)->update([
            'bidang_id' => $request->bidang_id,
            'sub_bidang_id' => $request->sub_bidang_id,
            'nama' => $request->nama,
            'foto' => $save_url,
        ]);

        $notification = [
            'message' => 'Berhasil Input Data!',
            'alert-type' => 'success'
        ];
        return redirect()->route('admin.panitia')->with($notification);
    }

    public function PanitiaHapus(Request $request, $id)
    {
        $panitia = Panitia::findOrFail($id);
        // Hapus file terlebih dahulu jika ada
        if ($panitia->foto) {
            unlink($panitia->foto);
        }
        panitia::findOrFail($id)->delete();
        $notification = [
            'message' => 'Panitia deleted successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }
}
