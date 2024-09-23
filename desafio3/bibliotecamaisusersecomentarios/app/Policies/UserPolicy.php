<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function isCliente(User $user): bool
    {
        return $user->role == 'cliente';
    }
    public function isBibliotecario(User $user): bool
    {
        return $user->role == 'bibliotecario';
    }
    public function isAdmin(User $user): bool
    {
        return $user->role == 'admin';
    }
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        // Código aqui, se necessário
    }
}
