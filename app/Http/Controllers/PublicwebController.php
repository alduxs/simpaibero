<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Text;
use App\Models\Map;
use App\Models\Point;

class PublicwebController extends Controller
{
    public function index()
    {

        $texts = Text::orderBy('textId')->get();
        $maps = Map::orderBy('mapId')->with('mapsPoints')->get();



        return view('wp-home', ['texts' => $texts, 'maps' => $maps]);
    }
}
