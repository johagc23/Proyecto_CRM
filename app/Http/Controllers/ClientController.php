<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Origin;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        // Listar clientes con sus relaciones (origen y usuario asignado)
        $clients = Client::with(['origin', 'user'])->paginate(10);
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        $origins = Origin::all();
        return view('clients.create', compact('origins'));
    }

    public function store(StoreClientRequest $request)
    {
        // Asignar el cliente al usuario autenticado actual
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        Client::create($data);

        return redirect()->route('clients.index')->with('success', 'Prospecto registrado exitosamente.');
    }

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        $origins = Origin::all();
        return view('clients.edit', compact('client', 'origins'));
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->validated());

        return redirect()->route('clients.index')->with('success', 'Prospecto actualizado exitosamente.');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Prospecto eliminado exitosamente.');
    }
}