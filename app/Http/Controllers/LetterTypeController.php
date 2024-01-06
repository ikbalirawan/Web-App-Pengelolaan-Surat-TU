<?php

namespace App\Http\Controllers;

use App\Models\letterType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\LetterTypeExport;
use Excel;
use PDF;

class LetterTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $letters = LetterType::withCount('letter')->orderBy('letter_code', 'ASC')->simplePaginate(5);
        return view('letterType.letterType', compact('letters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::get();
        return view('letterType.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'klasifikasi' => 'required',
        ]);

        letterType::create([
            'letter_code' => $request->code,
            'name_type' => $request->klasifikasi,
        ]);
        
        return redirect()->back()->with('success', 'Berhasil menambahkan data surat!');
    

    }

    /**
     * Display the specified resource.
     */
    public function show(letterType $letterType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function detail(String $id)
    {
        $letter = letterType::find($id);
        $user = User::where('role', 'guru')->get();
        return view('letterType.detail', compact('letter', 'user'));
    }
    public function edit(String $id)
    {
        $letterType = letterType::find($id);
        return view('letterType.edit', compact('letterType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $request->validate([
            'code' => 'required',
            'klasifikasi' => 'required',
        ]);
        
        letterType::where('id', $id)->update([
        'letter_code' => $request->code,
        'name_type' => $request->klasifikasi,
    ]);

        return redirect()->route('letterType.index')->with('success', 'Berhasil mengubah data user!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        letterType::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data user!');
    }

    public function downloadExcel()
    {
        return Excel::download(new LetterTypeExport, 'Klasifikasi Surat.xlsx');
    }

    public function cek()
    {
    }
    public function downloadPDF(String $id)
    {
        $data = [
            'imagePath' => asset('logowk.webp'),
        ];

        $letterType = letterType::find($id)->toArray();
        view()->share('order', $letterType);
        
        $pdf = PDF::loadView('letterType.cetak', $letterType, $data);
        $nameForm = $letterType['name_type'].".pdf";
        
        return $pdf->download($nameForm);
}
    
}
