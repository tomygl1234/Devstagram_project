<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('profile.index');
    }
    public function store(Request $request)
    {
        //Modificar el request
        $request->request->add(['username' => Str::slug($request->username)]);

        //Validar
        $this->validate($request, [
            'username' => ['required', 'unique:users,username,' . auth()->user()->id, 'min:3', 'max:20', 'not_in:update-profile',],
        ]);
        if ($request->image) {
            $image = $request->file('image');
            $ImageName = Str::uuid() . "." . $image->extension();

            $imageServidor = Image::make($image);
            $imageServidor->fit(1000, 1000);

            $imagePath = public_path('profiles') . '/' . $ImageName;
            $imageServidor->save($imagePath);
        }
        //Guardar cambios
        $user = User::find(auth()->user()->id);
        $user->username = $request->username;
        $user->image = $ImageName ?? auth()->user()->image ?? null;
        $user->save();

        //Redirect
        return redirect()->route('posts.index', $user->username)->with('success', 'Your profile was succesfully updated');
    }
}
