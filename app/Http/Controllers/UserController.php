<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Throwable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        $users = User::orderBy('id')->get();

        return view('users', ['users' => $users]);
    }

    /**Category::orderBy('categoryId')->get();

        return view('categories', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {

        return view('user-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request): RedirectResponse
    {

       //dd($request->all());

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;


        try {
            $user = new User;
            // asignamos atributos
            $user->name = $name;
            $user->email = $email;
            $user->password = Hash::make($password);

            $user->save();
            return redirect('/users')
                ->with(
                    [
                        'mensaje' => 'Usuario ' . $name . ' agregado correctamente.',
                        'css' => 'alert-primary'
                    ]
                );
        } catch (Throwable $th) {
            return redirect('/users')
                ->with(
                    [
                        'mensaje' => 'No se pudo agregar el usuario: ' . $name,
                        'css' => 'alert-danger'
                    ]
                );
        }
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
    public function edit(User $user): View
    {
        return view('user-edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        try {
            //asignamos atributos
            $user->name = $name;
            $user->email = $email;
            if ($request->filled('password')) {
                $user->password = Hash::make($password);
            }

            $user->save();

            return redirect('/users')
                ->with(
                    [
                        'mensaje' => 'Usuario ' . $name . ' modificado correctamente.',
                        'css' => 'alert-primary'
                    ]
                );
        } catch (Throwable $th) {
            return redirect('/users')
                ->with(
                    [
                        'mensaje' => 'No se pudo modificar el usuario ' . $name,
                        'css' => 'alert-danger'
                    ]
                );
        }
    }

    public function confirm(User $user): View
    {
        return view('user-confirm', ['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

        if( $user->image !== NULL && $user->image !== "" ){
            unlink(public_path('/assets/images/users/'. $user->image));
        }

        $userName = $user->name;
        try {
            $user->delete();
            return redirect('/users')
                ->with(
                    [
                        'mensaje' => 'Usuario ' . $userName . ' eliminado correctamente.',
                        'css' => 'alert-primary'
                    ]
                );
        } catch (Throwable $th) {
            return redirect('/users')
                ->with(
                    [
                        'mensaje' => 'No se pudo eliminar el usuario ' . $userName,
                        'css' => 'alert-danger'
                    ]
                );
        }
    }

    public function subirImagen( Request $request ) : string
    {

        //dd($request);

        //si enviaron imagen

            $file = $request->file('image');
            // renombramos arthivo
            $time = time();
            $extension = $file->getClientOriginalExtension();
            // $prdImagen = $time.'.'.$extension;
            $imageName = "{$time}.{$extension}";

            $manager = new ImageManager(new Driver());

            // --- 1. PROCESAR IMAGEN "ORIGINAL" (465x600) ---
            $imgOriginal = $manager->read($file);
            $imgOriginal->cover(150, 150); // Ajusta y recorta al tamaño exacto
            $imgOriginal->save(public_path('/assets/images/users/' . $imageName));


        return $imageName;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editprofile(User $user): View
    {
        // Obtener todo lo que hay en la sesión
        return view('profile-edit', ['user' => $user]);
    }
     /**
     * Update the specified resource in storage.
     */
    public function updateprofile(UserRequest $request, User $user)
    {

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        if( $request->hasFile('image') ) {
            if( $user->image !== NULL && $user->image !== "" ){
                //dd($user->image);
                unlink(public_path('/assets/images/users/'. $user->image));
            }
            $imageName = $this->subirImagen($request);
        } else {
            $imageName = $user->image;
        }



        try {
            //asignamos atributos
            $user->name = $name;
            $user->email = $email;
            if ($request->filled('password')) {
                $user->password = Hash::make($password);
            }
            $user->image = $imageName;
            $user->save();

            return redirect('/user/'.$user->id.'/profile/edit')
                ->with(
                    [
                        'mensaje' => 'El perfil del usuario ' . $name . ' fue modificado correctamente.',
                        'css' => 'alert-primary'
                    ]
                );
        } catch (Throwable $th) {
            return redirect('/user/'.$user->id.'/profile/edit')
                ->with(
                    [
                        'mensaje' => 'No se pudo modificar el perfil del usuario ' . $name,
                        'css' => 'alert-danger'
                    ]
                );
        }
    }
}
