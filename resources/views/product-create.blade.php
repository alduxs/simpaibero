@include('layouts.header')

<div class="container-fluid">

    <div class="page-title-head d-flex align-items-center">
        <div class="flex-grow-1">
            <h4 class="fs-sm text-uppercase fw-bold m-0">Productos</h4>
        </div>

        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>

                <li class="breadcrumb-item"><a href="javascript: void(0);">Productos</a></li>
                <!--
                            <li class="breadcrumb-item active">Tour</li>-->
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Nuevo producto</h4>
                </div>

                <div class="card-body">
                    <form action="/product/store" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="productCategoryId" class="form-label">Categoría</label>
                            <select name="productCategoryId" id="productCategoryId" class="form-select form-control">
                                <option value="">Seleccione una categoría</option>
                                @foreach( $categories as $category )
                                <option @selected( old('productCategoryId')==$category->categoryId ) value="{{
                                    $category->categoryId }}">{{
                                    $category->categoryName }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('productCategoryId'))
                            <div class="invalid-feedback" style="display: block">{{ $errors->first('productCategoryId') }}
                            </div>
                            @endif
                        </div>

                        <div class="border-top border-dashed my-3"></div>

                        <div class="mb-3">
                            <label for="productName" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="productName" name="productName"
                                value="{{ old('productName') }}">
                            @if ($errors->has('productName'))
                            <div class="invalid-feedback" style="display: block">{{ $errors->first('productName') }}
                            </div>
                            @endif

                        </div>

                        <div class="border-top border-dashed my-3"></div>

                        <div class="mb-3">
                            <label for="productDescription" class="form-label">Descripción</label>
                            <textarea class="form-control" id="txtEditor" name="productDescription"
                                rows="4">{{ old('productDescription') }}</textarea>
                            @if ($errors->has('productDescription'))
                            <div class="invalid-feedback" style="display: block">{{ $errors->first('productDescription')
                                }}</div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="productPosition" class="form-label">Posición</label>
                            <input type="text" class="form-control" id="productPosition" name="productPosition">
                            @if ($errors->has('productPosition'))
                            <div class="invalid-feedback" style="display: block">{{ $errors->first('productPosition')
                                }}</div>
                            @endif
                        </div>

                        <div class="border-top border-dashed my-3"></div>

                         <div class="mb-3">
                            <label for="productGalleryId" class="form-label">Galería</label>
                            <select name="productGalleryId" id="productGalleryId" class="form-select form-control">
                                <option value="">Seleccione una galería</option>
                                @foreach( $galleries as $gallery )
                                <option @selected( old('productGalleryId')==$gallery->galleryId ) value="{{$gallery->galleryId
                                    }}">{{$gallery->galleryName }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('productGalleryId'))
                            <div class="invalid-feedback" style="display: block">{{ $errors->first('productGalleryId') }}</div>
                            @endif
                        </div>

                        <div class="border-top border-dashed my-3"></div>


                        <div class="mb-3">
                            <label for="productFichaTecnica" class="form-label">Ficha técnica (PDF)</label>
                            <input type="file" class="form-control" id="productFichaTecnica" name="productFichaTecnica">
                            @if ($errors->has('productFichaTecnica'))
                            <div class="invalid-feedback" style="display: block">{{ $errors->first('productFichaTecnica') }}</div>
                            @endif
                        </div>

                        <div class="border-top border-dashed my-3"></div>

                         <div class="mb-3">
                            <label for="productManual" class="form-label">Manual (PDF)</label>
                            <input type="file" class="form-control" id="productManual" name="productManual">
                            @if ($errors->has('productManual'))
                            <div class="invalid-feedback" style="display: block">{{ $errors->first('productManual') }}</div>
                            @endif
                        </div>

                        <div class="border-top border-dashed my-3"></div>

                        <div class="mb-3">
                            <h5>Publicado</h5>
                            <div class="form-check fs-lg form-check-inline">
                                <input class="form-check-input" type="radio" name="productActiv" id="mSi" value="1"
                                    checked>
                                <label class="form-check-label fs-base" for="mSi">Si</label>
                            </div>
                            <div class="form-check fs-lg form-check-inline">
                                <input class="form-check-input" type="radio" name="productActiv" id="mNo" value="0">
                                <label class="form-check-label fs-base" for="mNo">No</label>
                            </div>
                        </div>
                        <div class="border-top border-dashed my-3"></div>



                        <p class="text-center"><button type="submit" class="btn btn-primary">Insertar</button></p>


                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card-->

        </div><!-- end col -->
    </div><!-- end row -->



</div>
<!-- container -->

@include('layouts.footer')
