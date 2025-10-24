<?php

namespace App\Http\Controllers\Voyager;

use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Models\Archivo;

class ArchivoController extends VoyagerBaseController
{
     public function store(Request $request)
    {
        $archivo = $request->file('ruta');
        if (is_array($archivo)) {
            $archivo = $archivo[0];
        }

        $nombre = $archivo->getClientOriginalName();
        $path = $archivo->store('archivos', 'public');

        // Guardar en BD
        $registro = new Archivo();
        $registro->nombre = $nombre;
        $registro->ruta = $path;
        $registro->save();

        // Enviar a API
        $response = Http::attach(
            'archivo',
            fopen(storage_path("app/public/{$path}"), 'r'),
            $nombre
        )->post('https://erp2024.keyoficiales.com/api/Web/SubirArchivo');

        // Validación
        if ($response->successful()) {
            return redirect()->back()->with(['message' => 'Enviado correctamente', 'alert-type' => 'success']);
        }

        return redirect()->back()->with(['message' => 'Error al enviar', 'alert-type' => 'error']);
        
    }
}
