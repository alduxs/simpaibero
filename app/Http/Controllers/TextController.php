<?php

namespace App\Http\Controllers;

use App\Models\Text;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TextRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Throwable;

class TextController extends Controller
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
        $texts = Text::orderBy('textId')->get();

        return view('texts', ['texts' => $texts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Text $text)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Text $text): View
    {
        return view('text-edit', ['text' => $text]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TextRequest $request, Text $text)
    {
        $textName = $request->textName;
        $textContent = $request->textContent;
        $textActiv = $request->textActiv;
        $nameActiv = $request->nameActiv;


        try {
            //asignamos atributos
            $text->textName = $textName;
            $text->textContent = $textContent;
            $text->nameActiv = $nameActiv;
            $text->textActiv = $textActiv;

            $text->save();

            return redirect('/texts')
                ->with(
                    [
                        'mensaje' => 'Texto ' . $textName . ' modificado correctamente.',
                        'css' => 'alert-primary'
                    ]
                );
        } catch (Throwable $th) {
            return redirect('/texts')
                ->with(
                    [
                        'mensaje' => 'No se pudo modificar el texto ' . $textName,
                        'css' => 'alert-danger'
                    ]
                );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Text $text)
    {
        //
    }
}
