<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Tienda;             // <-- AÑADIR
use Illuminate\Support\Str;        // <-- AÑADIR
use Illuminate\Support\Facades\DB; // <-- AÑADIR

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    // 1. VALIDACIÓN
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'nombre_tienda' => ['required', 'string', 'max:255', 'unique:tiendas,nombre_tienda'], // <-- VALIDACIÓN AÑADIDA
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    // 2. CREACIÓN (CON TRANSACCIÓN)
    // Usamos una transacción para asegurarnos de que si algo falla,
    // no se cree ni el usuario ni la tienda. O todo, o nada.
    try {

        $user = DB::transaction(function () use ($request) {

            // 2a. Crear el Usuario
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // 2b. Crear la Tienda asociada al usuario
            $tienda = $user->tienda()->create([
                'nombre_tienda' => $request->nombre_tienda,
                'slug' => Str::slug($request->nombre_tienda), // Crea un 'slug' amigable
                // Los campos "upgrade god" usarán sus valores por defecto
            ]);

            // 2c. Asignar el Rol de "dueño_tienda"
            $user->assignRole('dueño_tienda');

            return $user; // Devuelve el usuario si todo fue exitoso
        });

    } catch (\Exception $e) {
        // Si algo falló en la transacción, redirige de vuelta con un error
        // (Puedes loggear $e->getMessage() para depurar)
        return back()->withInput()->withErrors(['email' => 'No se pudo crear la cuenta. Inténtalo de nuevo.']);
    }


    // 3. LOGIN Y REDIRECCIÓN
    Auth::login($user);

    return redirect(route('dashboard', absolute: false));
}
}
