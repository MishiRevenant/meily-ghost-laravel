<?php

namespace App\Policies;

use App\Models\Categoria;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CategoriaPolicy
{
  public function update(User $user, Categoria $categoria): bool
{
    return $user->tienda->id === $categoria->tienda_id;
}

// Un usuario puede BORRAR si la categoría es de su tienda
public function delete(User $user, Categoria $categoria): bool
{
    return $user->tienda->id === $categoria->tienda_id;
}
}
