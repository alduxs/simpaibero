@include('layouts.header')

<div class="container-fluid">

                <div class="page-title-head d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h4 class="fs-sm text-uppercase fw-bold m-0">Categorías</h4>
                    </div>

                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>

                            <li class="breadcrumb-item"><a href="javascript: void(0);">Categorías</a></li>
                            <!--
                            <li class="breadcrumb-item active">Tour</li>-->
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Editar categoría</h4>
                            </div>

                            <div class="card-body">
                                <form action="/category/{{ $category->categoryId }}/update" method="post">
                                    @csrf
                                    @method('put')

                                    <div class="mb-3">
                                        <label for="categoryName" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="categoryName" name="categoryName" value="{{ old('categoryName',$category->categoryName) }}">
                                        <input type="hidden" name="categoryId" value="{{ $category->categoryId  }}">
                                        @if ($errors->has('categoryName'))
                                            <div class="invalid-feedback" style="display: block">{{ $errors->first('categoryName') }}</div>
                                        @endif
                                    </div>

                                    <p class="text-center"><button type="submit" class="btn btn-primary">Modificar</button></p>

                                </form>
                            </div> <!-- end card-body -->
                        </div> <!-- end card-->

                    </div><!-- end col -->
                </div><!-- end row -->



            </div>
            <!-- container -->

@include('layouts.footer')
