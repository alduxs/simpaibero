@include('layouts.header')

<div class="container-fluid">

    <div class="page-title-head d-flex align-items-center">
        <div class="flex-grow-1">
            <h4 class="fs-sm text-uppercase fw-bold m-0">Productos relacionados</h4>
        </div>

        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0);">Mapas</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0);">Productos relacionados</a></li>
            </ol>
        </div>
    </div>

</div>
<!-- container -->

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">

                <div class="card-body">
                    <p class="text-muted mb-0">
                    <h4>Para producto <span class="badge text-bg-primary">{{ $product->productName }}</span></h4>
                    </p>
                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Agregar producto relacionado</h4>
                </div>



                <div class="card-body">
                    <form action="/related-product/store" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row gy-2 gx-2 align-items-center">
                            <div class="col-12">
                                <label for="relatedProduct" class="form-label">Producto Relacionado</label>
                                <select name="relatedProduct" id="relatedProduct"
                                    class="form-select form-control">
                                    <option value="">Seleccione un producto</option>
                                    @foreach( $products as $productList )
                                    <option  value="{{$productList->productId }}">{{$productList->productName }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('relatedProduct'))
                                <div class="invalid-feedback" style="display: block">{{ $errors->first('relatedProduct')
                                    }}</div>
                                @endif
                            </div>

                            <input type="hidden" id="originalProductId" name="originalProductId" value="{{ $product->productId }}">


                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary" style="margin-top: 25px;">Agregar</button>
                            </div>
                        </div>


                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card-->

        </div><!-- end col -->



        <div class="col-xl-12">
            <div class="card">


                <div class="card-body">


                    <div class="row">

                        <div class="col-12">
                            <div data-table data-table-rows-per-page="5" class="card">

                                <div class="card-header">
                                    <h4 class="card-title">Listado de productos relacionados</h4>
                                </div>

                                @if( session('mensaje') )
                                <x-alert></x-alert>
                                @endif

                                <div class="table-responsive">
                                    <table
                                        class="table table-custom table-centered table-select table-hover w-100 mb-0">
                                        <thead class="bg-light align-middle bg-opacity-25 thead-sm">
                                            <tr class="text-uppercase fs-xxs">
                                                <th class="ps-3" style="width: 1%;">
                                                    <input data-table-select-all
                                                        class="form-check-input form-check-input-light fs-14 mt-0"
                                                        type="checkbox" value="option">
                                                </th>
                                                <th data-table-sort="nombre">Nombre</th>


                                                <th class="text-center" style="width: 1%;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>



                                            <!-- Product Row -->
                                            @forelse( $relatedProducts as $relatedProduct)

                                            @php
                                                 $dataRelatedProduct = [
                                                    'relatedProductRegisterId'=> $relatedProduct->relatedProductId,
                                                    'productName'=> $relatedProduct->product->productName,
                                                ]
                                            @endphp


                                            <tr>
                                                <td class="ps-3">
                                                    <input
                                                        class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                                        type="checkbox" value="option">
                                                </td>

                                                <td>{{ $relatedProduct->product->productName }}</td>




                                                <td>
                                                    <div class="d-flex justify-content-center gap-1">

                                                        <x-botones href="javascript:void(0)" button="btn-danger"
                                                            onclick="confirmDeleteRelatedProduct('{{ json_encode($dataRelatedProduct) }}')">
                                                            <i class="ti ti-trash fs-lg"></i>
                                                        </x-botones>


                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td class=" text-center" colspan="4">No hay productos relacionados.</td>
                                            </tr>
                                            @endforelse


                                        </tbody>
                                    </table>

                                </div>
                                <div class="card-footer border-0">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div data-table-pagination-info="products"></div>
                                        <div data-table-pagination></div>
                                    </div>
                                </div>

                            </div>

                        </div><!-- end col -->

                        <form action="" method="post" id="deleteRelatedProductForm">
                            @csrf
                            @method('delete')
                        </form>

                    </div> <!-- end row-->
                </div> <!-- end card body-->
            </div>
        </div> <!-- end col -->

        -




    </div> <!-- end row -->

</div>



<!-- Standard modal content -->
<div id="delete-related-product-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delete-related-product-modalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="delete-modalLabel">Borrar Producto Relacionado</h4>
            </div>
            <div class="modal-body">
                <p><strong>Nombre del producto:</strong> <span id="related-product-register-name"></span></p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btDeleteRelatedProduct">Borrar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




@include('layouts.footer')
