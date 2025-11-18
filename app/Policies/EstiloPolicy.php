<?php

namespace App\Policies;

use App\Models\Estilo;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EstiloPolicy
{
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Estilo $estilo): bool
    {
        // El usuario solo puede actualizar si el estilo es de SU tienda
        return $user->tienda->id === $estilo->tienda_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Estilo $estilo): bool
    {
        // El usuario solo puede borrar si el estilo es de SU tienda
        return $user->tienda->id === $estilo->tienda_id;
    }
}