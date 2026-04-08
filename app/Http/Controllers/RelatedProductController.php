<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\RelatedProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\RelatedProductRequest;
use Throwable;
use Illuminate\Support\Str;


class RelatedProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        $products = Product::where('productCategoryId', $product->productCategoryId)
                    ->where('productId', '!=', $product->productId)
                    ->orderBy('productPosition','asc')
                    ->get();

        //$relatedProducts = RelatedProduct::where('relatedProductOriginalId', $product->productId)->get();

        $relatedProducts = RelatedProduct::with('product')
                            ->where('relatedProductOriginalId', $product->productId)
                            ->get();


        return view('related-products', ['relatedProducts' => $relatedProducts,'products' => $products,'product' => $product]);
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
    public function store(RelatedProductRequest $request) : RedirectResponse
    {
        $relatedProductOriginalId = $request->originalProductId ;
        $relatedProductRelatedId = $request->relatedProduct;

        $productName = Product::where('productId', $relatedProductOriginalId)->first()->productName;
        $relatedProductName = Product::where('productId', $relatedProductRelatedId)->first()->productName;

        //dd($productName,$relatedProductName);

        try {
            $related_product = new RelatedProduct;
            // asignamos atributos
            $related_product->relatedProductOriginalId = $relatedProductOriginalId;
            $related_product->relatedProductRelatedId = $relatedProductRelatedId;


            $related_product->save();

            return redirect('/related-products/' . $relatedProductOriginalId . '/list')
                ->with(
                    [
                        'mensaje' => 'El producto ' . $relatedProductName . ' fue corectamente relacionado a ' . $productName . '.',
                        'css' => 'alert-primary'
                    ]
                );
        } catch (Throwable $th) {
            return redirect('/related-products/' . $relatedProductOriginalId . '/list')
                ->with(
                    [
                        'mensaje' => 'No se pudo relacionar el producto ' . $relatedProductName . ' con ' . $productName ,
                        'css' => 'alert-danger'
                    ]
                );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(RelatedProduct $relatedProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RelatedProduct $relatedProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RelatedProduct $relatedProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RelatedProduct $relatedProduct)
    {

        $relatedProductOriginalId = $relatedProduct->relatedProductOriginalId ;
        $relatedProductRelatedId = $relatedProduct->relatedProductRelatedId;

        $productName = Product::where('productId', $relatedProductOriginalId)->first()->productName;
        $relatedProductName = Product::where('productId', $relatedProductRelatedId)->first()->productName;

        //$pointName = $point->pointName;

        //dd($relatedProduct);

        try {
            $relatedProduct->delete();
            return redirect('/related-products/' . $relatedProductOriginalId . '/list')
                ->with(
                    [
                        'mensaje' => 'El producto ' . $relatedProductName . ' fue corectamente desvinculado de ' . $productName . '.',
                        'css' => 'alert-primary'
                    ]
                );
        } catch (Throwable $th) {
            return redirect('/related-products/' . $relatedProductOriginalId . '/list')
                ->with(
                    [
                        'mensaje' => 'No se pudo desvincular el producto ' . $relatedProductName . ' de ' . $productName,
                        'css' => 'alert-danger'
                    ]
                );
        }
    }
}
