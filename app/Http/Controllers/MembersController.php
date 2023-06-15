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
    }

    public function show(Members $member)
    {
        // Logic untuk menampilkan detail data member tertentu
    }

    public function edit(Members $member)
    {
        // Logic untuk menampilkan form pengeditan data member
    }

    public function update(Request $request, Members $member)
    {
        // Logic untuk mengupdate data member yang sudah ada
    }

    public function destroy(Members $member)
    {
        // Logic untuk menghapus data member
    }
}
