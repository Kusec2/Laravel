<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();

        return view('users.index',['users'=> $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'email' => 'required|email|unique:users,email',
            'password'=> 'required|string|min:8|unique:users,password',
            'phone'=> 'required|string|max:15',
            'birth_date' => 'nullable|date',
            'height' => 'nullable|numeric',       // Nullable i brojčani unos
            'weight' => 'nullable|numeric',       // Nullable i brojčani unos
            'gender' => 'nullable|in:male,female', // Nullable, ali ako je prisutan, mora biti ili 'male' ili 'female'
            'goal' => 'nullable|string|max:700',  // Nullable, može biti string, maksimalna dužina 700 karaktera
        ]);

        $data['password']=bcrypt($data['password']); // Hashiraj lozinku prije pohrane
        if (User::create($data)) {
            return redirect()->route('users.index')->with('success', 'User created successfully');
        }
        return redirect()->route('users.index')->with('error', 'Error creating the user');
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
    public function edit(User $user)
    {   
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'phone' => 'required|string|max:15',
            'birth_date' => 'nullable|date',
            'height' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'gender' => 'nullable|in:male,female',
            'goal' => 'nullable|string|max:700',
        ]);
           // Hashiranje lozinke ako je unesena
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']); // Ako lozinka nije postavljena, izbriši je iz podataka
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
        }

    /** 
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
