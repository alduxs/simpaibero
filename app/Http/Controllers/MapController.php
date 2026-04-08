<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Map;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Throwable;
use Illuminate\Http\Request;
use App\Http\Requests\MapRequest;
use App\Models\Point;


class MapController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Map::orderBy('mapId')->get();

        return view('maps', ['maps' => $galleries]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {

        return view('map-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MapRequest $request): RedirectResponse
    {

        $mapName = $request->mapName;
        $mapActivo = $request->mapActivo;


        try {
            $map = new Map;
            // asignamos atributos
            $map->mapName = $mapName;
            $map->mapActivo = $mapActivo;


            $map->save();
            return redirect('/maps')
                ->with(
                    [
                        'mensaje' => 'Mapa ' . $mapName . ' agregado correctamente.',
                        'css' => 'alert-primary'
                    ]
                );
        } catch (Throwable $th) {
            return redirect('/maps')
                ->with(
                    [
                        'mensaje' => 'No se pudo agregar el mapa: ' . $mapName,
                        'css' => 'alert-danger'
                    ]
                );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Map $map)
    {
        //
    }

     /**
     * Show the form for editing the specified resource.
     */
    public function edit(Map $map): View
    {
        return view('map-edit', ['map' => $map]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MapRequest $request, Map $map)
    {
        $mapName = $request->mapName;
        $mapActivo = $request->mapActivo;

        try {
            // asignamos atributos
            $map->mapName = $mapName;
            $map->mapActivo = $mapActivo;
            $map->save();

            return redirect('/maps')
                ->with(
                    [
                        'mensaje' => 'Mapa ' . $mapName . ' modificado correctamente.',
                        'css' => 'alert-primary'
                    ]
                );
        } catch (Throwable $th) {
            return redirect('/maps')
                ->with(
                    [
                        'mensaje' => 'No se pudo modificar el mapa: ' . $mapName,
                        'css' => 'alert-danger'
                    ]
                );
        }
    }

    public function confirm(Map $map): View
    {
        return view('map-confirm', ['map' => $map]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Map $map, Point $point)
    {
        $mapName = $map->mapName;

        $points = Point::where('pointMapId', $map->mapId)
               ->orderBy('pointId')
               ->get();

        if ($points->isNotEmpty()) {
            foreach ($points as $point) {
                $point->delete();
            }
        }


        try {
            $map->delete();
            return redirect('/maps')
                ->with(
                    [
                        'mensaje' => 'Mapa ' . $mapName . ' eliminado correctamente.',
                        'css' => 'alert-primary'
                    ]
                );
        } catch (Throwable $th) {
            return redirect('/maps')
                ->with(
                    [
                        'mensaje' => 'No se pudo eliminar el mapa: ' . $mapName,
                        'css' => 'alert-danger'
                    ]
                );
        }
    }

    public function getPoints(Map $map)
    {
        $points = Point::where('pointMapId', $map->mapId)->get();
        return response()->json($points);
    }

}
