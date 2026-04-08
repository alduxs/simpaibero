@include('layouts.header')

<div class="container-fluid">

                <div class="page-title-head d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h4 class="fs-sm text-uppercase fw-bold m-0">Galerías</h4>
                    </div>

                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>

                            <li class="breadcrumb-item"><a href="javascript: void(0);">Galerías</a></li>
                            <!--
                            <li class="breadcrumb-item active">Tour</li>-->
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Borrar galería</h4>
                            </div>

                            <div class="card-body">
                                <form action="/gallery/{{ $gallery->galleryId }}/destroy" method="post">
                                    @csrf
                                    @method('delete')

                                    <p>¿Está seguro que desea borrar la galería:  <span class="text-danger"><strong>{{ $gallery->galleryName }}</strong></span>?</p>

                                    <p class="text-center"><button type="submit" class="btn btn-danger">Borrar</button> <a href="/galleries" class="btn btn-primary">Cancelar</a> </p>

                                </form>
                            </div> <!-- end card-body -->
                        </div> <!-- end card-->

                    </div><!-- end col -->
                </div><!-- end row -->



            </div>
            <!-- container -->

@include('layouts.footer')
