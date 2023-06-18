<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function index()
    {
        // Logic untuk menampilkan semua data member
    }

    public function create()
    {
        // Logic untuk menampilkan form pembuatan member
    }

    public function store(Request $request)
    {
        // Logic untuk menyimpan data member yang baru dibuat

        $member = Members::create([
            // Data member yang disimpan
        ]);

        // Set kolom 'ikut_arisan' menjadi true
        $member->ikut_arisan = true;
        $member->save();

    // Redirect atau berikan respons sesuai kebutuhan
    }

    public function show(Members $members)
    {
        // Logic untuk menampilkan detail data member tertentu
    }

    public function edit(Members $members)
    {
        // Logic untuk menampilkan form pengeditan data member
    }

    public function update(Request $request, Members $members)
    {
        // Logic untuk mengupdate data member yang sudah ada
    }

    public function destroy(Members $members)
    {
        // Logic untuk menghapus data member
    }

    public function approveMember(Members $members)
    {
        $members->ikut_arisan = true;
        $members->save();

        // Redirect atau berikan respons sesuai kebutuhan
    }
}
