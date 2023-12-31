<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\lampiran;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class LampiranController extends Controller
{
    protected function stroeFunction($store, string $type, string $owner)
    {
        $w = $type == 'id-card' ? 638 : ($type == 'foto-karyawan' ? 354 : ($type == 'kk'? 2175 :1011) );
        $h = $type == 'id-card' ? 1011 : ($type == 'foto-karyawan' ? 473  : ( $type =="kk" ? 1560  : 638) );

        $quality = $type == 'kk' ? 100 : 80;

        if($store)
        {
            $store_path ='/storage';
            $img = Image::make($store)->resize($w, $h);
            $extention = $store->getClientOriginalExtension();
            // $nameFile = now()->timestamp.'-'.$type.'-'.$owner.'.'.$extention;
            $nameFile = now()->timestamp.'-'.$type.'-'.$owner.'.webp';
            // $store->storeAs($type, $nameFile);
            $img->save(public_path($store_path.'/'.$type.'/'.$nameFile, $quality));
            return $nameFile;
        }

        return null;

    }

    public function create($id)
    {
        return view('lampiran.add', ['id'=>$id]);
    }

    public function store($id, Request $request)
    {

        $karyawan_nama = karyawan::where('id', $id)->get('nama')->first();
        $request->validate([
            'foto_karyawan' => 'mimes:jpg,bmp,png,svg,jpeg,heif,hevc|max:10240',
            'ktp' => 'mimes:jpg,bmp,png,svg,jpeg,heif,hevc|max:10240',
            'jamsostek' => 'mimes:jpg,bmp,png,svg,jpeg,heif,hevc|max:10240',
            'jpk' => 'mimes:jpg,bmp,png,svg,jpeg,heif,hevc|max:10240',
            'id_card' => 'mimes:jpg,bmp,png,svg,jpeg,heif,hevc|max:10240',
            'kk' => 'mimes:jpg,bmp,png,svg,jpeg,heif,hevc|max:10240',
        ],[
            'foto_karyawan.mimes' => 'Gambar harus berformat jpg, bmp, png, svg, jpeg, heif, hevc!',
            'foto_karyawan.max' => 'Gambar maksimal 10MB!',

            'ktp.mimes' => 'Gambar harus berformat jpg, bmp, png, svg, jpeg, heif, hevc!',
            'ktp.max' => 'Gambar maksimal 10MB!',

            'jamsostek.mimes' => 'Gambar harus berformat jpg, bmp, png, svg, jpeg, heif, hevc!',
            'jamsostek.max' => 'Gambar maksimal 10MB!',

            'jpk.mimes' => 'Gambar harus berformat jpg, bmp, png, svg, jpeg, heif, hevc!',
            'jpk.max' => 'Gambar maksimal 10MB!',

            'id_card.mimes' => 'Gambar harus berformat jpg, bmp, png, svg, jpeg, heif, hevc!',
            'id_card.max' => 'Gambar maksimal 10MB!',

            'kk.mimes' => 'Gambar harus berformat jpg, bmp, png, svg, jpeg, heif, hevc!',
            'kk.max' => 'Gambar maksimal 10MB!',
        ]);

        if($request->foto_karyawan != '') {

        }


        $foto_karyawan = $this->stroeFunction($request->file('foto_karyawan'), 'foto-karyawan', $karyawan_nama->nama );
        $ktp = $this->stroeFunction($request->file('ktp'), 'KTP', $karyawan_nama->nama );
        $jamsostek = $this->stroeFunction($request->file('jamsostek'), 'jamsostek', $karyawan_nama->nama );
        $jpk = $this->stroeFunction($request->file('jpk'), 'jpk', $karyawan_nama->nama );
        $id_card = $this->stroeFunction($request->file('id_card'), 'id-card', $karyawan_nama->nama );
        $kk = $this->stroeFunction($request->file('kk'), 'kk', $karyawan_nama->nama );

        $lampiran = lampiran::create([
            'foto_karyawan' => $foto_karyawan,
            'ktp' =>$ktp,
            'jamsostek' => $jamsostek,
            'jpk' => $jpk,
            'id_card' => $id_card,
            'kk' => $kk,
            'id_karyawan' => $id
        ]);

        $karyawan = karyawan::find($id);
        $karyawan->touch();

        return redirect()->route('karyawan.show', ['karyawan' => $id])->with('success', 'dokuman lampiran karyawan telah ditambahkan');
    }

    public function edit($id, $lampiran)
    {
        $lampirandata = lampiran::findOrFail($lampiran);

        // dd($lampirandata);
        return view('lampiran.edit', ['id' => $id, 'lampiran'=>$lampirandata]);
    }

    public function update(Request $request, $id, $lampiran)
    {
        $karyawan_nama = karyawan::where('id', $id)->get('nama')->first();
        $request->validate([
            'foto_karyawan' => 'mimes:jpg,bmp,png,svg,jpeg,heif,hevc|max:10240',
            'ktp' => 'mimes:jpg,bmp,png,svg,jpeg,heif,hevc|max:10240',
            'jamsostek' => 'mimes:jpg,bmp,png,svg,jpeg,heif,hevc|max:10240',
            'jpk' => 'mimes:jpg,bmp,png,svg,jpeg,heif,hevc|max:10240',
            'id_card' => 'mimes:jpg,bmp,png,svg,jpeg,heif,hevc|max:10240',
            'kk' => 'mimes:jpg,bmp,png,svg,jpeg,heif,hevc|max:10240',
        ],[
            'foto_karyawan.mimes' => 'Gambar harus berformat jpg, bmp, png, svg, jpeg, heif, hevc!',
            'foto_karyawan.max' => 'Gambar maksimal 10MB!',

            'ktp.mimes' => 'Gambar harus berformat jpg, bmp, png, svg, jpeg, heif, hevc!',
            'ktp.max' => 'Gambar maksimal 10MB!',

            'jamsostek.mimes' => 'Gambar harus berformat jpg, bmp, png, svg, jpeg, heif, hevc!',
            'jamsostek.max' => 'Gambar maksimal 10MB!',

            'jpk.mimes' => 'Gambar harus berformat jpg, bmp, png, svg, jpeg, heif, hevc!',
            'jpk.max' => 'Gambar maksimal 10MB!',

            'id_card.mimes' => 'Gambar harus berformat jpg, bmp, png, svg, jpeg, heif, hevc!',
            'id_card.max' => 'Gambar maksimal 10MB!',

            'kk.mimes' => 'Gambar harus berformat jpg, bmp, png, svg, jpeg, heif, hevc!',
            'kk.max' => 'Gambar maksimal 10MB!',
        ]);

        $lampiran = lampiran::findOrFail($lampiran);

        $foto_karyawan = $request->file('foto_karyawan') ? $this->stroeFunction($request->file('foto_karyawan'), 'foto-karyawan', $karyawan_nama->nama ) : $lampiran->foto_karyawan;
        $ktp = $request->file('ktp') ? $this->stroeFunction($request->file('ktp'), 'KTP', $karyawan_nama->nama ) : $lampiran->ktp;
        $jamsostek = $request->file('jamsostek') ? $this->stroeFunction($request->file('jamsostek'), 'jamsostek', $karyawan_nama->nama ) : $lampiran->jamsostek;
        $jpk = $request->file('jpk') ? $this->stroeFunction($request->file('jpk'), 'jpk', $karyawan_nama->nama ) : $lampiran->jpk;
        $id_card = $request->file('id_card') ? $this->stroeFunction($request->file('id_card'), 'id-card', $karyawan_nama->nama ) : $lampiran->id_card;
        $kk = $request->file('kk') ? $this->stroeFunction($request->file('kk'), 'kk', $karyawan_nama->nama ) : $lampiran->kk;


        $lampiran->update([
            'foto_karyawan' => $foto_karyawan,
            'ktp' =>$ktp,
            'jamsostek' => $jamsostek,
            'jpk' => $jpk,
            'id_card' => $id_card,
            'kk' => $kk,
            'id_karyawan' => $id
        ]);

        $karyawan = karyawan::find($id);
        $karyawan->touch();

        return redirect()->route('karyawan.show', ['karyawan' => $id])->with('success', 'dokuman lampiran karyawan telah di perbarui');
    }

}
