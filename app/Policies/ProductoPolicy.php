<?php
namespace App\Policies;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductoPolicy
{
    // Un usuario puede VER un producto si es de su tienda
    public function view(User $user, Producto $producto): bool
    {
        return $user->tienda->id === $producto->tienda_id;
    }

    // Un usuario puede ACTUALIZAR un producto si es de su tienda
    public function update(User $user, Producto $producto): bool
    {
        return $user->tienda->id === $producto->tienda_id;
    }

    // Un usuario puede BORRAR un producto si es de su tienda
    public function delete(User $user, Producto $producto): bool
    {
        return $user->tienda->id === $producto->tienda_id;
    }
}