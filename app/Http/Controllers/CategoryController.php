<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoryRequest;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class CategoryController extends Controller
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
        $categories = Category::orderBy('categoryId')->get();

        return view('categories', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {

        return view('category-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request): RedirectResponse
    {

        $categoryName = $request->categoryName;

        try {
            $category = new category;
            // asignamos atributos
            $category->categoryName = $categoryName;

            $category->save();
            return redirect('/categories')
                ->with(
                    [
                        'mensaje' => 'Categoría ' . $categoryName . ' agregada correctamente.',
                        'css' => 'alert-primary'
                    ]
                );
        } catch (Throwable $th) {
            return redirect('/categories')
                ->with(
                    [
                        'mensaje' => 'No se pudo agregar la categoría: ' . $categoryName,
                        'css' => 'alert-danger'
                    ]
                );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category): View
    {
        return view('category-edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, category $category)
    {
        $categoryName = $request->categoryName;


        try {
            //asignamos atributos
            $category->categoryName = $categoryName;
            $category->save();

            return redirect('/categories')
                ->with(
                    [
                        'mensaje' => 'Categoría ' . $categoryName . ' modificado correctamente.',
                        'css' => 'alert-primary'
                    ]
                );
        } catch (Throwable $th) {
            return redirect('/categories')
                ->with(
                    [
                        'mensaje' => 'No se pudo modificar la categoría ' . $categoryName,
                        'css' => 'alert-danger'
                    ]
                );
        }
    }

    public function confirm(category $category): View
    {
        return view('category-confirm', ['category' => $category]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        $categoryName = $category->categoryName;
        try {
            $category->delete();
            return redirect('/categories')
                ->with(
                    [
                        'mensaje' => 'Categoría ' . $categoryName . ' eliminada correctamente.',
                        'css' => 'alert-primary'
                    ]
                );
        } catch (Throwable $th) {
            return redirect('/categories')
                ->with(
                    [
                        'mensaje' => 'No se pudo eliminar la categoría ' . $categoryName,
                        'css' => 'alert-danger'
                    ]
                );
        }
    }
}
