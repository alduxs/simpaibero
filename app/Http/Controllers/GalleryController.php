<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Image;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Throwable;
use Illuminate\Http\Request;


class GalleryController extends Controller
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
        $galleries = Gallery::orderBy('galleryId')->get();

        return view('galleries', ['galleries' => $galleries]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        $products = Product::orderBy('productCategoryId','asc')->orderBy('productPosition','asc')->get();

        return view('gallery-create', ['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryRequest $request):RedirectResponse
    {
        $galleryName = $request->galleryName;

        try {
            $gallery = new Gallery;
            // asignamos atributos
            $gallery->galleryName = $galleryName;

            $gallery->save();
            return redirect('/galleries')
                ->with(
                    [
                        'mensaje' => 'Galería ' . $galleryName . ' agregada correctamente.',
                        'css' => 'alert-primary'
                    ]
                );
        } catch (Throwable $th) {
            return redirect('/galleries')
                ->with(
                    [
                        'mensaje' => 'No se pudo agregar la galería: ' . $galleryName,
                        'css' => 'alert-danger'
                    ]
                );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery):View
    {

        $products = Product::orderBy('productCategoryId','asc')->orderBy('productPosition','asc')->get();
        return view('gallery-edit', ['gallery' => $gallery, 'products' => $products]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GalleryRequest $request, Gallery $gallery):RedirectResponse
    {
        $galleryName = $request->galleryName;


        try {
            //asignamos atributos
            $gallery->galleryName = $galleryName;
            $gallery->save();

            return redirect('/galleries')
                ->with(
                    [
                        'mensaje' => 'Galería ' . $galleryName . ' modificado correctamente.',
                        'css' => 'alert-primary'
                    ]
                );
        } catch (Throwable $th) {
            return redirect('/galleries')
                ->with(
                    [
                        'mensaje' => 'No se pudo modificar la galería ' . $galleryName,
                        'css' => 'alert-danger'
                    ]
                );
        }
    }

    public function confirm(Gallery $gallery): View
    {
        return view('gallery-confirm', ['gallery' => $gallery]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery,Image $image)
    {
        $galleryName = $gallery->galleryName;
        $images = Image::where('imageGalleryId', $gallery->galleryId)
               ->orderBy('imagePosition')
               ->get();

        if ($images->isNotEmpty()) {
            foreach ($images as $image) {
                $imageName = $image->imageName;
                if ($imageName !== 'noDisponible.svg' || $imageName !== '') {
                    unlink(public_path('/assets/productos/big/' . $imageName));
                    unlink(public_path('/assets/productos/small/' . $imageName));
                }
                $image->delete();
            }
        }



        try {
            $gallery->delete();
            return redirect('/galleries')
                ->with(
                    [
                        'mensaje' => 'Galería ' . $galleryName . ' eliminada correctamente.',
                        'css' => 'alert-primary'
                    ]
                );
        } catch (Throwable $th) {
            return redirect('/galleries')
                ->with(
                    [
                        'mensaje' => 'No se pudo eliminar la galería ' . $galleryName,
                        'css' => 'alert-danger'
                    ]
                );
        }
    }
}
