<?php

namespace App\Http\Controllers;

use App\Models\letterType;
use App\Models\Letter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
 
class UserController extends Controller
{
    public function authlogin(Request $request)
    {
       $request->validate([
           'email' => 'required|email:dns',
           'password' => 'required',
       ]);

       $user = $request->only(['email', 'password']);
       if (Auth::attempt($user)) {
           return redirect('/dashboard')->with('success', 'Login Berhasil');
       }else{
           return redirect()->back()->with('failed', 'Login gagal silahkan coba lagi');
       }
    }

    public function logout()
    {
       Auth::logout();
       return redirect()->route('login');
    }

    public function dataStaff()
    {
        $users = User::where('role', '=', 'staff')->orderBy('name', 'ASC')->simplePaginate(5);
        return view('user.staff.staff', compact('users'));
    }
    public function dataGuru()
    {
        $users = User::where('role', '=', 'guru')->orderBy('name', 'ASC')->simplePaginate(5);
        return view('user.guru.guru', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createStaff()
    {
        return view('user.staff.create');
    }
    public function createGuru()
    {
        return view('user.guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeStaff(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,',
        ]);

        $email = substr($request->email, 0, 3);
        $name = substr($request->name, 0, 3);
        $role = "staff";
        $hashedCreate = Hash::make($email . $name);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $role,
            'password' => $hashedCreate
        ]);
        
        return redirect()->back()->with('success', 'Berhasil menambahkan data user!');
    

    }
    public function storeGuru(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,',
        ]);

        $email = substr($request->email, 0, 3);
        $name = substr($request->name, 0, 3);
        $role = "guru";
        $hashedCreate = Hash::make($email . $name);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $role,
            'password' => $hashedCreate
        ]);
        
        return redirect()->back()->with('success', 'Berhasil menambahkan data user!');
    

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editStaff(String $id)
    {
        $user = User::find($id);
        return view('user.staff.edit', compact('user'));
    }
    public function editGuru(String $id)
    {
        $user = User::find($id);
        return view('user.staff.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStaff(Request $request, String $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);
        
        $hashed = Hash::make($request->password);
        User::where('id', $id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $hashed
    ]);

        return redirect()->route('account.user-staff')->with('success', 'Berhasil mengubah data user!');
    }
    public function updateGuru(Request $request, String $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);
        
        $hashed = Hash::make($request->password);
        User::where('id', $id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $hashed
    ]);

        return redirect()->route('account.user-staff')->with('success', 'Berhasil mengubah data user!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyStaff(String $id)
    {
        User::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data user!');
    }
    public function destroyGuru(String $id)
    {
        User::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data user!');
    }

    public function hitung()
    {
    $staffCount = User::where('role', 'staff')->count();
    $guruCount = User::where('role', 'guru')->count();
    $suratCount = letterType::count();
    $letterCount = Letter::count();

    return view('dashboard', compact('staffCount', 'guruCount', 'suratCount', 'letterCount'));
    }
}
