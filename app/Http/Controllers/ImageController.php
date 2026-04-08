<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;
use App\Models\Gallery;
use App\Models\Image;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
//use Intervention\Image\Drivers\Imagick\Driver;

class ImageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Gallery $gallery)
    {

        $images = Image::where('imageGalleryId', $gallery->galleryId)->orderBy('imagePosition')->get();
        //dd($images);
        return view('images', ['gallery' => $gallery, 'images' => $images]);

    }

    public function subirImagen( Request $request ) : string
    {


        //si enviaron imagen
        if( $request->hasFile('imageName') )
        {
            $file = $request->file('imageName');
            // renombramos arthivo
            $time = time();
            $extension = $file->getClientOriginalExtension();
            // $prdImagen = $time.'.'.$extension;
            $imageName = "{$time}.{$extension}";

            $manager = new ImageManager(new Driver());

            // --- 1. PROCESAR IMAGEN "ORIGINAL" (465x600) ---
            $imgOriginal = $manager->read($file);
            $imgOriginal->cover(465, 600); // Ajusta y recorta al tamaño exacto
            $imgOriginal->save(public_path('/assets/productos/big/' . $imageName));

            // --- 2. PROCESAR MINIATURA (96x124) ---
            $imgThumb = $manager->read($file);
            $imgThumb->cover(96, 124);
            $imgThumb->save(public_path('/assets/productos/small/' . $imageName));

            #####  subimos el archivo
            //$file->move( public_path('/assets/productos'), $imageName);
        }
        return $imageName;
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(ImageRequest $request) : RedirectResponse
    {

        // subir imagen
        $imageName = $this->subirImagen($request);

        try {
            $image = new Image;
            // asignamos atributos
            $image->imageName = $imageName;
            $image->imagePosition = $request->imagePosition;
            $image->imageGalleryId = $request->imageGalleryId;
            $image->save();
            return redirect('/images/' . $request->imageGalleryId.'/list')
                        ->with(
                            [
                                'mensaje'=>'Imagen agregada correctamente.',
                                'css'=>'alert-primary'
                            ]
                        );

        }catch ( Throwable $th ){
            return redirect('/images/' . $request->imageGalleryId.'/list')
                ->with(
                    [
                        'mensaje'=>'No se pudo agregar la imagen.',
                        'css'=>'alert-danger'
                    ]
                );
        }
    }

    public function destroy(Image $image)
    {

        $imageName = $image->imageName;

        //dd($imageName);

        if( $imageName !== 'noDisponible.svg' || $imageName !== '' ){
            unlink(public_path('/assets/productos/big/'. $imageName));
            unlink(public_path('/assets/productos/small/'. $imageName));
        }

        try {
            $image->delete();
            return redirect('/images/' . $image->imageGalleryId . '/list')
                ->with(
                    [
                        'mensaje' => 'Imagen ' . $imageName . ' eliminada correctamente.',
                        'css' => 'alert-primary'
                    ]
                );
        } catch (Throwable $th) {
            return redirect('/images/' . $image->imageGalleryId . '/list')
                ->with(
                    [
                        'mensaje' => 'No se pudo eliminar la imagen ' . $imageName,
                        'css' => 'alert-danger'
                    ]
                );
        }
    }
}
