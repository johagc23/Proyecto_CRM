<?php

namespace App\Http\Controllers;

use App\Models\Interaction;
use App\Models\Client;
use App\Http\Requests\StoreInteractionRequest;

class InteractionController extends Controller
{
    public function index()
    {
        // Listar el historial de interacciones ordenadas por fecha
        $interactions = Interaction::with('client')->orderBy('fecha_seguimiento', 'desc')->paginate(10);
        return view('interactions.index', compact('interactions'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('interactions.create', compact('clients'));
    }

    public function store(StoreInteractionRequest $request)
    {
        Interaction::create($request->validated());

        return redirect()->route('interactions.index')->with('success', 'Seguimiento registrado exitosamente.');
    }

    public function destroy(Interaction $interaction)
    {
        $interaction->delete();

        return redirect()->route('interactions.index')->with('success', 'Interacción eliminada exitosamente.');
    }
}