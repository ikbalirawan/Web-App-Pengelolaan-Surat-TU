<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\letterType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $letters = Letter::orderBy('id', 'ASC')->simplePaginate(5);
        $letterType = letterType::orderBy('id', 'ASC')->simplePaginate(5);
        $user = User::orderBy('name', 'ASC')->simplePaginate(5);
        return view('letter.letter', compact('letters', 'letterType', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $users = User::get();
        $letterType = letterType::get();
        return view('letter.create', compact('users', 'letterType'));
    }

    /**
     * Store a newly created resource in storage.
     */
    protected $casts = [
        'notulis' => 'string',
    ];
    
    public function store(Request $request)
    {
        // $request->validate([
        //     'perihal' => 'required',
        //     'klasifikasi' => 'required',
        //     'content' => 'required',
        //     'recipients' => 'required',
        //     'lampiran' => '',
        //     'notulis' => 'required',
        // ]);

        $arrayDistinct = array_count_values($request->recipients);
        $arrayAssoc = [];

        foreach ($arrayDistinct as $id => $count) {
            $user = User::find($id);

            if ($user) {
                $arrayItem = [
                    "id" => $id,
                    "name" => $user->name,
                ];

                array_push($arrayAssoc, $arrayItem);
            }
        }

        $request['recipients'] = $arrayAssoc;

        Letter::create([
            'letter_perihal' => $request->perihal,
            'letter_type_id' => $request->klasifikasi,
            'content' => $request->content,
            'recipients' => $request->recipients,
            'attachment' => $request->lampiran,
            'notulis' => $request->notulis
        ]);

        return redirect()->route('letter.index')->with('success', 'Berhasil Menambah Data');
    

    }

    /**
     * Display the specified resource.
     */
    public function show(letter $letter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $letters = Letter::find($id);
        $letterType = letterType::orderBy('id', 'ASC')->simplePaginate(5);
        $user = User::orderBy('name', 'ASC')->simplePaginate(5);
        return view('letter.edit', compact('letters', 'letterType', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $arrayDistinct = array_count_values($request->recipients);
        $arrayAssoc = [];

        foreach ($arrayDistinct as $id => $count) {
            $user = User::find($id);

            if ($user) {
                $arrayItem = [
                    "id" => $id,
                    "name" => $user->name,
                ];

                array_push($arrayAssoc, $arrayItem);
            }
        }

        $request['recipients'] = $arrayAssoc;
        
        Letter::where('id', $id)->update([
            'letter_perihal' => $request->perihal,
            'letter_type_id' => $request->klasifikasi,
            'content' => $request->content,
            'recipients' => $request->recipients,
            'attachment' => $request->lampiran,
            'notulis' => $request->notulis
        ]);

        return redirect()->route('letter.index')->with('success', 'Berhasil Mengubah Data');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        letterType::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data user!');
    }

    // public function downloadPDF()
    // {
    //     return Excel::download(new LetterExport, 'Klasifikasi Surat.xlsx');
    // }
}
