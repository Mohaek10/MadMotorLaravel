<?php

namespace App\Policies;

use App\Models\Clientes;
use Illuminate\Auth\Access\Response;

class ClientePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Clientes $clientes): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Clientes $clientes, Clientes $clientes1)
    {
        return $clientes->id == $clientes1->id ? Response::allow() : Response::denyWithStatus(404);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Clientes $clientes): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Clientes $clientes, Clientes $clientes1)
    {
        return $clientes->id == $clientes1->id ? Response::allow() : Response::denyWithStatus(404);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Clientes $clientes, Clientes $clientes1): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Clientes $clientes, Clientes $clientes1): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Clientes $clientes, Clientes $clientes1): bool
    {
        //
    }
}
