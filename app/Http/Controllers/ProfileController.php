<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    //
    public function viewProfile() {
        $user = Auth::user();
        return view('pages.Profile', compact('user'));
    }

    public function changeFotoProfile(Request $request)
    {
        // dd($request->image);
        try {
        
            $request->validate([
                'image' => 'required|image|mimes: jpg,png,svg,jpeg|max:20348'
            ]);

            $oldImage = $request->image->getClientOriginalName();

            $request->image->storeAs('profile_image_file', $oldImage);

            $user = User::all()->where('id', Auth::user()->id)->first();

            // Storage::disk('public')->delete("/profile_image_file/. $user->foto_profile");

            $user->foto_profile = $oldImage;
            $user->updated_at = date(now());
            $user->save();

            return redirect('profile-diri')->with('success','Profile Berhasil Diubah');
            
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function changeDataProfile(Request $request)
    
    {
        try {
            $user = User::all()->where('id', auth()->user()->id)->first();
            
            $user->name = $request->name;
            $user->email = $request->email;
            $user->alamat = $request->alamat;
            $user->no_telepon = $request->no_telepon;
            $user->about = $request->about;
            $user->updated_at = date(now());
            $user->save();

            return redirect('profile-diri')->with('info','Data Berhasil Diubah');;
        } catch (\Throwable $th) {
            throw $th;
        }
       
    }
}

