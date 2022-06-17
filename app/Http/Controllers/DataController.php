<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DataController extends Controller
{

 //    ------------------------- Petugas

   public function DataMasyarakat()
   {
       $masyarakat = User::all()->where('role', 'pengaju');
       return view('pages.data.Petugas.DataMasyarakat', compact('masyarakat'));
   }

   public function EditDataMasyarakat($id)
   {
       $value = User::find($id);

       return view('pages.data.Petugas.EditMasyarakat')->with([
           'value' => $value
       ]);

   }

   public function UpdateDataMasyarakat(Request $request, $id)
   {
       $value = User::findOrFail($id);
       $value->name = $request->name;  
       $value->email = $request->email; 
       $value->save(); 
   }
  


//    --------------------------- Admin

    public function DataAdmin()
    {
        $allData = User::all();
        return view('pages.data.Admin.DataUser', compact('allData'));
    }

//  Edit Delete User

    public function EditDataAdmin($id) { 
        $editData = User::find($id);

        return view('pages.data.Admin.EditUser')->with([
            'edit' =>  $editData
        ]);
    }

    public function UpdateDataAdmin(Request $request, $id)
    {
        $edit = User::findOrFail($id);

        $edit->name = $request->name;
        $edit->email = $request->email;
        $edit->role = $request->role;
        $edit->save();
    }

    public function DeleteDataAdmin($id)
    {
        $data = User::findOrFail($id);
        $data->delete();

        return redirect('data-semua-user')->with('success', 'Berhasil Delete Data User');
    }

//    Menambah petugas

    public function tambahDataPetugas() {
        return view('pages.data.Admin.TambahPetugas');
    }

    public function storeDataPetugas(Request $request) {
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['role'] = $request->role;

        User::insert($data);
    }

  
}

