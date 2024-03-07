<?php

namespace App\Policies;

use App\Models\Clientes;
use App\Models\Pedido;
use Illuminate\Auth\Access\Response;

class PedidoPolicy
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
    public function view(Clientes $clientes, Pedido $pedido)
    {
        return $clientes->id == $pedido->idCliente ? Response::allow() : Response::denyWithStatus(404);
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
    public function update(Clientes $clientes, Pedido $pedido): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Clientes $clientes, Pedido $pedido): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Clientes $clientes, Pedido $pedido): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Clientes $clientes, Pedido $pedido): bool
    {
        //
    }
}
