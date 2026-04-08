<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Gallery;
use App\Models\category;
use App\Models\Product;
use App\Models\RelatedProduct;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Throwable;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Str; // Importante para generar el slug

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['index','create', 'store', 'edit', 'update', 'confirm', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('productActiv','desc')
                            ->orderBy('productCategoryId','asc')
                            ->orderBy('productPosition','asc')
                            ->with(['getCategoria', 'getGallery'])->get();

        //dd($products);
        return view('products', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::orderBy('categoryId')->get();
        $galleries = Gallery::orderBy('galleryName')->get();
        return view(
            'product-create',
            [
                'categories' => $categories,
                'galleries' => $galleries
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request): RedirectResponse
    {


        $productName = $request->productName;
        $productDescription = $request->productDescription;
        $productPosition = $request->productPosition;
        $productCategoryId = $request->productCategoryId;
        $productGalleryId = $request->productGalleryId;
        $productActiv = $request->productActiv;
        $productHash = Str::slug($request->productName, '-');


        try {
            $product = new Product;
            // asignamos atributos
            $product->productName = $productName;
            $product->productDescription = $productDescription;
            $product->productPosition = $productPosition;
            $product->productCategoryId = $productCategoryId;
            $product->productGalleryId = $productGalleryId;
            $product->productActiv = $productActiv;
            $product->productHash = $productHash;

            // --- LÓGICA PARA EL ARCHIVO PDF FICHA TÉCNICA ---
            if ($request->hasFile('productFichaTecnica')) {
                $file = $request->file('productFichaTecnica');

                // Creamos un nombre único: slug-del-producto + timestamp
                $fileName = 'fichas-tecnica-'.$productHash . '-' . time() . '.' . $file->getClientOriginalExtension();

                // Movemos el archivo a public/assets/files
                $file->move(public_path('assets/files'), $fileName);

                // Guardamos el nombre del archivo en la base de datos
                // Asegúrate de tener esta columna en tu migración
                $product->productFichaTecnica = $fileName;
            }

             // --- LÓGICA PARA EL ARCHIVO PDF MANUAL ---
            if ($request->hasFile('productManual')) {
                $file = $request->file('productManual');

                // Creamos un nombre único: slug-del-producto + timestamp
                $fileName = 'manual-'.$productHash . '-' . time() . '.' . $file->getClientOriginalExtension();

                // Movemos el archivo a public/assets/files
                $file->move(public_path('assets/files'), $fileName);

                // Guardamos el nombre del archivo en la base de datos
                // Asegúrate de tener esta columna en tu migración
                $product->productManual = $fileName;
            }


            $product->save();
            return redirect('/products')
                ->with(
                    [
                        'mensaje' => 'Producto ' . $productName . ' agregado correctamente.',
                        'css' => 'alert-primary'
                    ]
                );
        } catch (Throwable $th) {
            return redirect('/products')
                ->with(
                    [
                        'mensaje' => 'Error al agregar el producto ' . $productName . '.',
                        'css' => 'alert-danger'
                    ]
                );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        $categories = Category::orderBy('categoryId')->get();
        $galleries = Gallery::orderBy('galleryName')->get();


        return view(
            'product-edit',
            [
                'product' => $product,
                'categories' => $categories,
                'galleries' => $galleries
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $productName = $request->productName;
        $productDescription = $request->productDescription;
        $productPosition = $request->productPosition;
        $productCategoryId = $request->productCategoryId;
        $productGalleryId = $request->productGalleryId;
        $productActiv = $request->productActiv;
        $productHash = Str::slug($request->productName, '-');

        try {
            //asignamos atributos
            $product->productName = $productName;
            $product->productDescription = $productDescription;
            $product->productPosition = $productPosition;
            $product->productCategoryId = $productCategoryId;
            $product->productGalleryId = $productGalleryId;
            $product->productActiv = $productActiv;
            $product->productHash = $productHash;

            // --- LÓGICA PARA ACTUALIZAR EL PDF ---
            if ($request->hasFile('productFichaTecnica')) {
                $destinationPath = public_path('assets/files');

                // 1. Si ya existe un archivo previo, lo borramos del servidor
                if (!empty($product->productFichaTecnica)) {
                    $oldFile = $destinationPath . '/' . $product->productFichaTecnica;
                    if (file_exists($oldFile)) {
                        unlink($oldFile);
                    }
                }

                // 2. Procesamos el nuevo archivo
                $file = $request->file('productFichaTecnica');
                $fileName = 'fichas-tecnica-'.$productHash . '-' . time() . '.' . $file->getClientOriginalExtension();
                $file->move($destinationPath, $fileName);

                // 3. Actualizamos el nombre en el modelo
                $product->productFichaTecnica = $fileName;
            }

            // --- LÓGICA PARA ACTUALIZAR EL PDF ---
            if ($request->hasFile('productManual')) {
                $destinationPath = public_path('assets/files');

                // 1. Si ya existe un archivo previo, lo borramos del servidor
                if (!empty($product->productManual)) {
                    $oldFile = $destinationPath . '/' . $product->productManual;
                    if (file_exists($oldFile)) {
                        unlink($oldFile);
                    }
                }

                // 2. Procesamos el nuevo archivo
                $file = $request->file('productManual');
                $fileName = 'manual-'.$productHash . '-' . time() . '.' . $file->getClientOriginalExtension();
                $file->move($destinationPath, $fileName);

                // 3. Actualizamos el nombre en el modelo
                $product->productManual = $fileName;
            }

            $product->save();
            return redirect('/products')
                ->with(
                    [
                        'mensaje' => 'Producto: ' . $productName . ' modificado correctamente.',
                        'css' => 'green'
                    ]
                );
        } catch (Throwable $th) {
            return redirect('/products')
                ->with(
                    [
                        'mensaje' => 'No se pudo modificar el producto: ' . $productName,
                        'css' => 'red'
                    ]
                );
        }
    }

    public function confirm(Product $product): View
    {
        return view('product-confirm', ['product' => $product]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product,RelatedProduct $relatedProduct): RedirectResponse
    {
        $productName = $product->productName;

        $relatedProducts = RelatedProduct::where('relatedProductOriginalId', $product->productId)->get();

        if ($relatedProducts->isNotEmpty()) {
            foreach ($relatedProducts as $relatedProduct) {
                $relatedProduct->delete();
            }
        }


        try {

            // 1. Borrado físico del archivo PDF
            if (!empty($product->productFichaTecnica)) {
                $filePath = public_path('assets/files/' . $product->productFichaTecnica);

                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            // 1. Borrado físico del archivo PDF
            if (!empty($product->productManual)) {
                $filePath = public_path('assets/files/' . $product->productManual);

                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            $product->delete();
            return redirect('/products')
                ->with(
                    [
                        'mensaje' => 'Producto: ' . $productName . ' eliminar correctamente.',
                        'css' => 'green'
                    ]
                );
        } catch (Throwable $th) {
            return redirect('/productos')
                ->with(
                    [
                        'mensaje' => 'No se pudo eliminar el producto: ' . $productName,
                        'css' => 'red'
                    ]
                );
        }
    }

    /**
     * Todos los productos para la parte pública.
     */
    public function allproducts() : View
    {
        $productos = Product::orderBy('productActiv','desc')
                            ->orderBy('productCategoryId','asc')
                            ->orderBy('productPosition','asc')
                            //->with(['getCategoria', 'getGallery'])
                            ->with(['getCategoria', 'portada'])
                            ->get();

        return view('wp-productos', ['productos' => $productos]);
    }

    public function getProduct(string $category, string $hash) : View
    {
        $images = array();
        //$relatedProducts = array();

        $producto = Product::where('productHash', $hash)
                            ->with(['getCategoria', 'imagenes','relacionados'])
                            ->first();

        foreach($producto->imagenes as $imagen) {
            $images[] = [
                'imageId' => $imagen->imageId,
                'imageName' => $imagen->imageName
            ];
        }

        return view('wp-producto', ['producto' => $producto, 'images' => $images]);
    }
}
