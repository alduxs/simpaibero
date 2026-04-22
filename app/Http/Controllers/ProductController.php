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

        $find = 2;
        $productos = Product::orderBy('productActiv','desc')
                            ->orderBy('productCategoryId','asc')
                            ->orderBy('productPosition','asc')
                            //->with(['getCategoria', 'getGallery'])
                            ->with(['getCategoria', 'portada'])
                            ->get();

        return view('wp-productos', ['productos' => $productos, 'find' => $find]);
    }

    /**
     * Search products by name or description for public site.
     */
    /*
    public function search(Request $request) : View
    {
        $term = trim($request->query('q', ''));
        $find = 1;
        if ($term == '') {
            $find = 0;
        }


        $productos = Product::where('productActiv', 1)
            ->where(function($q) use ($term) {
                $q->where('productName', 'like', '%'.$term.'%')
                  ->orWhere('productDescription', 'like', '%'.$term.'%');
            })
            ->orderBy('productActiv','desc')
            ->orderBy('productCategoryId','asc')
            ->orderBy('productPosition','asc')
            ->with(['getCategoria', 'portada'])
            ->get();

        return view('wp-productos', ['productos' => $productos, 'find' => $find, 'searchTerm' => $term]);
    }
    public function search(Request $request) : View
    {
        $term = trim($request->query('q', ''));
        $find = !empty($term) ? 1 : 0;
        $flag = 0;

        if ($find === 1) {
            // 1. Lista de preposiciones y palabras comunes a ignorar
            $stopWords = [
                'a', 'ante', 'bajo', 'cabe', 'con', 'contra', 'de', 'desde', 'durante',
                'en', 'entre', 'hacia', 'hasta', 'mediante', 'para', 'por', 'segun',
                'sin', 'so', 'sobre', 'tras', 'versus', 'via', 'el', 'la', 'los', 'las',
                'un', 'una', 'unos', 'unas', 'y', 'e', 'ni', 'que'
            ];

            // 2. Procesar el término de búsqueda
            // Convertimos a minúsculas y dividimos por espacios o guiones
            $words = collect(explode(' ', mb_strtolower($term)))
                ->filter(function($word) use ($stopWords) {
                    // Limpiamos la palabra de símbolos y verificamos que no sea una stopWord
                    $cleanWord = preg_replace('/[^a-z0-9áéíóúñ]/u', '', $word);
                    return !empty($cleanWord) && !in_array($cleanWord, $stopWords) && mb_strlen($cleanWord) > 1;
                });



            $query = Product::where('productActiv', 1);

            // 3. Aplicar filtros por cada palabra válida
            if ($words->isNotEmpty()) {

                $query->where(function($q) use ($words) {
                    foreach ($words as $word) {
                        // Esto asegura que CADA palabra deba estar presente
                        // ya sea en el nombre o en la descripción
                        $q->where(function($sub) use ($word) {
                            $sub->where('productName', 'like', '%' . $word . '%')
                                ->orWhere('productDescription', 'like', '%' . $word . '%');
                        });
                    }
                });
            } elseif ($find === 1) {

                // Si había término pero eran solo preposiciones, buscamos el término literal
                $query->where(function($q) use ($term) {
                    $q->where('productName', 'like', '%' . $term . '%')
                    ->orWhere('productDescription', 'like', '%' . $term . '%');
                });
            }


            $productos = $query->orderBy('productActiv', 'desc')
                ->orderBy('productCategoryId', 'asc')
                ->orderBy('productPosition', 'asc')
                ->with(['getCategoria', 'portada'])
                ->get();
        } else {
            $productos = array();
            $flag = 1; // Indicamos que no se realizó búsqueda por falta de término válido
        }


        return view('wp-productos', [
            'productos' => $productos,
            'find' => $find,
            'searchTerm' => $term,
            'flag' => $flag
        ]);
    }

     public function search(Request $request) : View
    {
        $term = trim($request->query('q', ''));
        $find = !empty($term) ? 1 : 0;
        $flag = 0;

        // 1. Limpieza y separación de palabras
        // Quitamos preposiciones comunes
        $stopWords = ['de', 'con', 'para', 'en', 'y', 'la', 'el', 'los', 'las', 'un', 'una'];

        // Convertimos el string en un array de palabras
        $words = explode(' ', $term);

        $query = Product::where('productActiv', 1);

        if ($find) {
            $query->where(function($q) use ($words, $stopWords) {
                foreach ($words as $word) {
                    $word = trim($word);
                    // Ignoramos palabras muy cortas o preposiciones
                    if (strlen($word) < 2 || in_array(mb_strtolower($word), $stopWords)) {
                        continue;
                    }

                    // CADA palabra debe existir en el nombre O en la descripción
                    $q->where(function($subQuery) use ($word) {
                        $subQuery->where('productName', 'like', '%' . $word . '%')
                                ->orWhere('productDescription', 'like', '%' . $word . '%');
                    });
                }
            });


        $productos = $query->orderBy('productActiv', 'desc')
            ->orderBy('productCategoryId', 'asc')
            ->orderBy('productPosition', 'asc')
            ->with(['getCategoria', 'portada'])
            ->get();


        } else {
            $productos = array();
            $flag = 1; // Indicamos que no se realizó búsqueda por falta de término válido
        }

        return view('wp-productos', [
            'productos' => $productos,
            'find' => $find,
            'searchTerm' => $term,
            'flag' => $flag
        ]);
    }*/

        public function search(Request $request) : View
{
    $term = trim($request->query('q', ''));
    $find = !empty($term) ? 1 : 0;
    $flag = 0;

    // 1. Lista de preposiciones a remover
    $stopWords = [
        'a', 'ante', 'bajo', 'con', 'contra', 'de', 'desde', 'en', 'entre',
        'para', 'por', 'segun', 'sin', 'sobre', 'tras', 'el', 'la', 'los',
        'las', 'un', 'una', 'unos', 'unas', 'y', 'e', 'ni', 'que'
    ];

    // 2. Limpiamos y preparamos las palabras
    $words = collect(explode(' ', $term))
        ->map(fn($w) => mb_strtolower(trim($w)))
        ->filter(fn($w) => !empty($w) && !in_array($w, $stopWords))
        ->values();

    $query = Product::where('productActiv', 1);

    if ($find) {

    // 3. Aplicamos la lógica OR entre términos
    if ($words->isNotEmpty()) {
        $query->where(function($q) use ($words) {
            foreach ($words as $word) {
                // Usamos orWhere para que si encuentra CUALQUIERA de las palabras, sea válido
                $q->orWhere(function($sub) use ($word) {
                    $sub->where('productName', 'like', '%' . $word . '%')
                        ->orWhere('productDescription', 'like', '%' . $word . '%');
                });
            }
        });
    }

    $productos = $query->orderBy('productActiv', 'desc')
        ->orderBy('productCategoryId', 'asc')
        ->orderBy('productPosition', 'asc')
        ->with(['getCategoria', 'portada'])
        ->get();

        } else {
            $productos = array();
            $flag = 1; // Indicamos que no se realizó búsqueda por falta de término válido
        }

    return view('wp-productos', [
        'productos' => $productos,
        'find' => $find,
        'searchTerm' => $term,
        'flag' => $flag
    ]);
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
