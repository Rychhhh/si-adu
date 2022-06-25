<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade as PDF;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $pengajuans = Pengajuan::all();
   

        return view('pages.pengaduan.DataPengaduan', compact('pengajuans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.pengaduan.CreatePengaduan');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //

        if(!$request->hasFile('photo')){
            return back()->withErrors(['photo' => 'Gambar wajib diisi']);
        }

        // dd($request->photo);
        $file_name = $request->photo->getClientOriginalName();
        // $request->photo->storeAs(storage_path('laporan'), $file_name);
        $request->photo->move(storage_path('app/public/laporan'), $file_name);

        $newPengajuan = new Pengajuan();
        $newPengajuan->name = $request->name;
        $newPengajuan->laporan = $request->laporan;
        $newPengajuan->photo = $file_name;
        $newPengajuan->save();

        return redirect('all-pengaduan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $detail = Pengajuan::find($id);

        return view('pages.pengaduan.DetailPengaduan', compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function onlinePdf()
    {
        $laporan = Pengajuan::all();

        $pdf = PDF::loadView('pages.generate_pdf.CetakOnline', ['laporan' => $laporan]);

        // return $pdf->download('laporan-kafe.pdf');
        return $pdf->stream();
    }

    
    public function downloadPdf()
    {
        $laporan = Pengajuan::all();

        $pdf = PDF::loadView('pages.generate_pdf.CetakOnline', ['laporan' => $laporan]);

        // return $pdf->download('laporan-kafe.pdf');
        return $pdf->download('laporan.pdf');
    }


    public function menanggapi(Request $request, $id)
    {
        // $data['tanggapan'] = $request->tanggapan;
        // $data['status'] = $request->status;

        // Pengajuan::insert($data);

        $edit = Pengajuan::findOrFail($id);
        $edit->tanggapan = $request->tanggapan;
        $edit->status = $request->status;
        $edit->save();

        return redirect('all-pengaduan');
    }
}
