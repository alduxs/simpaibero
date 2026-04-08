@include('layouts.header')

<div class="container-fluid">

    <div class="page-title-head d-flex align-items-center">
        <div class="flex-grow-1">
            <h4 class="fs-sm text-uppercase fw-bold m-0">Imágenes</h4>
        </div>

        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0);">Galerías</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0);">Imágenes</a></li>
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
                    <h4>Para galería <span class="badge text-bg-primary">{{ $gallery->galleryName }}</span></h4>
                    </p>
                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Agregar imagen</h4>
                </div>

                @if( session('mensaje') )
                <x-alert></x-alert>
                @endif

                <div class="card-body">
                    <form action="/image/store" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row gy-2 gx-2 align-items-center">
                            <div class="col-md-4">
                                <label for="imageName" class="form-label">Imagen</label>
                                <input type="file" name="imageName" id="imageName" class="form-control">
                                @if ($errors->has('imageName'))
                                <div class="invalid-feedback" style="display: block">{{ $errors->first('imageName')
                                    }}</div>
                                @endif
                            </div>
                            <div class="col-md-1">
                                <label for="imagePosition" class="form-label">Posición</label>
                                <input type="text" class="form-control" id="imagePosition" name="imagePosition">
                                @if ($errors->has('imagePosition'))
                                <div class="invalid-feedback" style="display: block">{{ $errors->first('imagePosition')
                                    }}</div>
                                @endif
                            </div>

                            <input type="hidden" id="imageGalleryId" name="imageGalleryId"
                                value="{{ $gallery->galleryId }}">

                            <div class="col-auto">
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

                        @forelse( $images as $image )
                        <div class="col-sm-2 text-center">
                            <!-- .img-thumbnail -->
                            <img src="{{ asset('assets/productos/small/' . $image->imageName) }}" alt="image"
                                class="img-fluid img-thumbnail">
                            <div class="borrar-number-img">
                                <div><span class="badge badge-circle text-bg-primary">{{ $image->imagePosition }}</span>
                                </div>

                                <div> Borrar <button type="button" class="btn btn-primary btn-icon btn-sm" onclick="confirmDeleteAction('{{ $image->imageId }}','{{ $image->imageName }}')">
                                    <i class="ti ti-xbox-x fs-xxl" style="vertical-align: bottom;"></i>
                                </button></div>




                            </div>
                        </div>

                        @empty
                        <div class="col-12">
                            <p>No hay imágenes disponibles en este momento.</p>
                        </div>
                        @endforelse


                                <form action="" method="post" id="deleteForm">
                                    @csrf
                                    @method('delete')

                                </form>

                        <!--
                        <div class="col-sm-2 text-center">

                            <img src="{{ asset('assets/images/stock/small-5.jpg') }}" alt="image"
                                class="img-fluid img-thumbnail">
                            <div class="borrar-number-img">
                                <div><span class="badge badge-circle text-bg-primary">1</span></div>
                                <div><a href="#">Borrar <i class="ti ti-xbox-x fs-xxl"
                                            style="vertical-align: bottom;"></i></a></div>
                            </div>
                        </div>

                        <div class="col-sm-2 text-center">

                            <img src="{{ asset('assets/images/stock/small-5.jpg') }}" alt="image"
                                class="img-fluid img-thumbnail">
                            <div class="borrar-number-img">
                                <div><span class="badge badge-circle text-bg-primary">1</span></div>
                                <div><a href="#">Borrar <i class="ti ti-xbox-x fs-xxl"
                                            style="vertical-align: bottom;"></i></a></div>
                            </div>
                        </div>

                        <div class="col-sm-2 text-center">

                            <img src="{{ asset('assets/images/stock/small-5.jpg') }}" alt="image"
                                class="img-fluid img-thumbnail">
                            <div class="borrar-number-img">
                                <div><span class="badge badge-circle text-bg-primary">1</span></div>
                                <div><a href="#">Borrar <i class="ti ti-xbox-x fs-xxl"
                                            style="vertical-align: bottom;"></i></a></div>
                            </div>
                        </div>

                        <div class="col-sm-2 text-center">

                            <img src="{{ asset('assets/images/stock/small-5.jpg') }}" alt="image"
                                class="img-fluid img-thumbnail">
                            <div class="borrar-number-img">
                                <div><span class="badge badge-circle text-bg-primary">1</span></div>
                                <div><a href="#">Borrar <i class="ti ti-xbox-x fs-xxl"
                                            style="vertical-align: bottom;"></i></a></div>
                            </div>
                        </div>

                        <div class="col-sm-2 text-center">

                            <img src="{{ asset('assets/images/stock/small-5.jpg') }}" alt="image"
                                class="img-fluid img-thumbnail">
                            <div class="borrar-number-img">
                                <div><span class="badge badge-circle text-bg-primary">1</span></div>
                                <div><a href="#">Borrar <i class="ti ti-xbox-x fs-xxl"
                                            style="vertical-align: bottom;"></i></a></div>
                            </div>
                        </div>

                        <div class="col-sm-2 text-center">

                            <img src="{{ asset('assets/images/stock/small-5.jpg') }}" alt="image"
                                class="img-fluid img-thumbnail">
                            <div class="borrar-number-img">
                                <div><span class="badge badge-circle text-bg-primary">1</span></div>
                                <div><a href="#">Borrar <i class="ti ti-xbox-x fs-xxl"
                                            style="vertical-align: bottom;"></i></a></div>
                            </div>
                        </div>
                    -->


                    </div> <!-- end row-->
                </div> <!-- end card body-->
            </div>
        </div> <!-- end col -->






    </div> <!-- end row -->

</div>

<!-- Standard modal content -->
<div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delete-modalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="delete-modalLabel">Borrar Imagen</h4>
            </div>
            <div class="modal-body">
                <p>Desea eliminar la imagen "<span id="image-name"></span>"?</p>
                <hr>
                <img src="" alt="" id="imageCont" style="width: 300px;">
                <input type="hidden" name="imageIdForm" id="imageIdForm" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btDeleteImage">Borrar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@include('layouts.footer')
