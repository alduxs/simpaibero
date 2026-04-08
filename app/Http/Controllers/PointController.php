<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\Map;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PointRequest;


class PointController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Map $map)
    {
        $points = Point::where('pointMapId', $map->mapId)->orderBy('pointName')->get();
        return view('points', ['map' => $map, 'points' => $points]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PointRequest $request) : RedirectResponse
    {

        try {
            $point = new Point;
            // asignamos atributos
            $point->pointName = $request->pointName;
            $point->pointAddress = $request->pointAddress;
            $point->pointLat = $request->pointLat;
            $point->pointLng = $request->pointLng;
            $point->pointMapId = $request->mapId;
            $point->save();
            return redirect('/points/' . $request->mapId.'/list')
                        ->with(
                            [
                                'mensaje'=>'Punto agregado correctamente.',
                                'css'=>'alert-primary'
                            ]
                        );

        }catch ( Throwable $th ){
            return redirect('/points/' . $request->mapId.'/list')
                ->with(
                    [
                        'mensaje'=>'No se pudo agregar el punto.',
                        'css'=>'alert-danger'
                    ]
                );
        }
    }

    public function destroy(Point $point)
    {

        $pointName = $point->pointName;


        try {
            $point->delete();
            return redirect('/points/' . $point->pointMapId . '/list')
                ->with(
                    [
                        'mensaje' => 'Punto ' . $pointName . ' eliminado correctamente.',
                        'css' => 'alert-primary'
                    ]
                );
        } catch (Throwable $th) {
            return redirect('/points/' . $point->pointMapId . '/list')
                ->with(
                    [
                        'mensaje' => 'No se pudo eliminar el punto ' . $pointName,
                        'css' => 'alert-danger'
                    ]
                );
        }
    }
}
