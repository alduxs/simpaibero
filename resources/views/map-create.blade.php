@include('layouts.header')

<div class="container-fluid">

    <div class="page-title-head d-flex align-items-center">
        <div class="flex-grow-1">
            <h4 class="fs-sm text-uppercase fw-bold m-0">Mapas</h4>
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
                    <h4 class="card-title">Nuevo mapa</h4>
                </div>

                <div class="card-body">
                    <form action="/map/store" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="mapName" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="mapName" name="mapName"
                                value="{{ old('mapName') }}">
                            @if ($errors->has('mapName'))
                            <div class="invalid-feedback" style="display: block">{{ $errors->first('mapName') }}</div>
                            @endif
                        </div>
                        <div class="border-top border-dashed my-3"></div>
                        <div class="mb-3">
                            <h5>Publicado</h5>
                            <div class="form-check fs-lg form-check-inline">
                                <input class="form-check-input" type="radio" name="mapActivo" id="mSi"
                                    value="1" checked>
                                <label class="form-check-label fs-base" for="mSi">Si</label>
                            </div>
                            <div class="form-check fs-lg form-check-inline">
                                <input class="form-check-input" type="radio" name="mapActivo" id="mNo"
                                    value="0">
                                <label class="form-check-label fs-base" for="mNo">No</label>
                            </div>
                        </div>



                        <p class="text-center"><button type="submit" class="btn btn-primary">Insertar</button></p>


                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card-->

        </div><!-- end col -->
    </div><!-- end row -->



</div>
<!-- container -->

@include('layouts.footer')
