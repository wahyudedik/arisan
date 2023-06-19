<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'max:50',
            'email' => 'email|max:50',
            'alamat' => 'max:255',
            'no_hp' => 'max:12',
            'no_rekening' => 'max:16',
        ]);

        $member = Member::findOrFail($id);

        // Update data pada tabel members
        $member->alamat = $request->alamat;
        $member->no_hp = $request->no_hp;
        $member->no_rekening = $request->no_rekening;
        $member->save();

        // Update data pada tabel users
        $user = User::findOrFail($member->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('member.profile')->with('success', 'Profil berhasil diperbarui');
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation rules for the image
        ]);

        $member = Member::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('images'), $gambarName);

            // Update the profile image
            $member->gambar = $gambarName;
            $member->save();
        }

        return redirect()->back()->with('success', 'Profile updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function profile()
    {

        $user = Auth::user();
        $member = Member::where('user_id', $user->id)->first();

        // Mengambil nama dan email dari tabel users
        $nama = $user->name;
        $email = $user->email;

        return view('member.profile', ['member' => $member, 'nama' => $nama, 'email' => $email]);
    }
}
