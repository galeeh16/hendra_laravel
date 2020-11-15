<?php

namespace App\Http\Controllers;

use App\Nama;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HendraController extends Controller
{
    //
    public function getData()
    {
    	$users = User::all();
    	return response()->json($users);
    }

    public function tambahUser(Request $request)
    {
    	$validasi = Validator::make($request->all(), [
    		'nama' => 'required|string',
    		'nik' => 'required|string|unique:nama,nik',
    		'alamat' => 'required|string',
    		'no_hp' => 'required|string|unique:nama,no_hp'
    	]);

    	if($validasi->fails()) {
    		return response()->json($validasi->messages(), 400);
    	}
    	
    	Nama::create([
    		'nama' => $request->nama,
    		'nik' => $request->nik,
    		'alamat' => $request->alamat,
    		'no_hp' => $request->no_hp
    	]);

    	return response()->json('Sukses menambah data user!!', 200);
    }

    public function detailUser($id)
    {
    	$user = Nama::where('id', '=', $id)->first();
    	return response()->json($user);
    }

    public function ubahUser(Request $request, $id)
    {
    	$validasi = Validator::make($request->all(), [
    		'nama' => 'required|string',
    		'nik' => 'required|string|unique:nama,nik',
    		'alamat' => 'required|string',
    		'no_hp' => 'required|string|unique:nama,no_hp'
    	]);

    	if($validasi->fails()) {
    		return response()->json($validasi->messages(), 400);
    	}

    	$update = Nama::where('id', $id)
		    			->update([
				    		'nama' => $request->nama,
				    		'nik' => $request->nik,
				    		'alamat' => $request->alamat,
				    		'no_hp' => $request->no_hp
				    	]);

    	return response()->json('Berhasil mengubah data user!!');
    }

    public function hapusUser($id) 
    {
    	$delete = Nama::where('id', $id)->delete();
    	return response()->json('Berhasil hapus data user!!');
    }

}
