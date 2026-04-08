@include('layouts.header')

<div class="container-fluid">

    <div class="page-title-head d-flex align-items-center">
        <div class="flex-grow-1">
            <h4 class="fs-sm text-uppercase fw-bold m-0">Puntos geográficos</h4>
        </div>

        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0);">Mapas</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0);">Puntos geográficos</a></li>
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
                    <h4>Para mapa <span class="badge text-bg-primary">{{ $map->mapName }}</span></h4>
                    </p>
                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Agregar punto geográfico</h4>
                </div>



                <div class="card-body">
                    <form action="/point/store" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row gy-2 gx-2 align-items-center">
                            <div class="col-12">
                                <label for="pointName" class="form-label">Nombre del punto</label>
                                <input type="text" name="pointName" id="pointName" class="form-control">
                                @if ($errors->has('pointName'))
                                <div class="invalid-feedback" style="display: block">{{ $errors->first('pointName')
                                    }}</div>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="pointAddress" class="form-label">Dirección del punto</label>
                                <input type="text" name="pointAddress" id="pointAddress" class="form-control">
                                @if ($errors->has('pointAddress'))
                                <div class="invalid-feedback" style="display: block">{{ $errors->first('pointAddress')
                                    }}</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="pointLat" class="form-label">Latitud</label>
                                <input type="text" class="form-control" id="pointLat" name="pointLat">
                                @if ($errors->has('pointLat'))
                                <div class="invalid-feedback" style="display: block">{{ $errors->first('pointLat')
                                    }}</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="pointLng" class="form-label">Longitud</label>
                                <input type="text" class="form-control" id="pointLng" name="pointLng">
                                @if ($errors->has('pointLng'))
                                <div class="invalid-feedback" style="display: block">{{ $errors->first('pointLng')
                                    }}</div>
                                @endif
                            </div>

                            <input type="hidden" id="mapId" name="mapId" value="{{ $map->mapId }}">

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
                                    <h4 class="card-title">Listado de puntos geográficos</h4>
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

                                                <th data-table-sort="direccion">Dirección</th>

                                                <th class="text-center" style="width: 1%;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>



                                            <!-- Product Row -->
                                            @forelse( $points as $point)
                                            <tr>
                                                <td class="ps-3">
                                                    <input
                                                        class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                                        type="checkbox" value="option">
                                                </td>

                                                <td>{{ $point->pointName }}</td>

                                                <td>{{ $point->pointAddress }}</td>


                                                <td>
                                                    <div class="d-flex justify-content-center gap-1">

                                                        <x-botones href="javascript:void(0)" button="btn-light" onclick="seeMap('{{ json_encode($point) }}')">
                                                            <i class="ti ti-eye fs-lg"></i>
                                                        </x-botones>
                                                        <x-botones href="javascript:void(0)" button="btn-danger" onclick="confirmDeleteMap('{{ json_encode($point) }}')">
                                                            <i class="ti ti-trash fs-lg"></i>
                                                        </x-botones>


                                                    </div>
                                                </td>
                                            </tr>
                                             @empty
                                            <tr>
                                                <td class=" text-center" colspan="4">No hay puntos geográficos registrados.</td>
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

                        <form action="" method="post" id="deletePointForm">
                            @csrf
                            @method('delete')

                        </form>

                    </div> <!-- end row-->
                </div> <!-- end card body-->
            </div>
        </div> <!-- end col -->






    </div> <!-- end row -->

</div>

<!-- Standard modal content -->
<div id="see-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="see-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="see-modalLabel">Ver Punto Geográfico</h4>
            </div>
            <div class="modal-body">
                <p><strong>Nombre del punto:</strong> <span id="point-name"></span></p>
                <p><strong>Dirección del punto:</strong> <span id="point-address"></span></p>
                <div id="map" style="height: 400px;"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Standard modal content -->
<div id="delete-point-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delete-point-modalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="delete-modalLabel">Borrar Punto Geográfico</h4>
            </div>
            <div class="modal-body">
                <p><strong>Nombre del punto:</strong> <span id="point-name2"></span></p>
                <p><strong>Dirección del punto:</strong> <span id="point-address2"></span></p>
                <div id="map2" style="height: 400px;"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btDeletePoint">Borrar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




@include('layouts.footer')
