@include('layouts.header')

<div class="container-fluid">

    <div class="page-title-head d-flex align-items-center">
        <div class="flex-grow-1">
            <h4 class="fs-sm text-uppercase fw-bold m-0">Categorías</h4>
        </div>

        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>

                <li class="breadcrumb-item"><a href="javascript: void(0);">Mapas</a></li>
                <!--
                            <li class="breadcrumb-item active">Tour</li>-->
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div data-table data-table-rows-per-page="5" class="card">

                <div class="card-header">
                    <h4 class="card-title">Listado</h4>
                </div>

                @if( session('mensaje') )
                    <x-alert></x-alert>
                @endif

                <div class="card-header border-light justify-content-between">

                    <div class="d-flex gap-2">
                        <div class="app-search">
                            <input data-table-search type="search" class="form-control"
                                placeholder="Buscar mapa...">
                            <i data-lucide="search" class="app-search-icon text-muted"></i>
                        </div>
                        <button data-table-delete-selected class="btn btn-danger d-none">Borrar</button>
                    </div>

                    <!-- Records Per Page -->
                    <div>
                        <select data-table-set-rows-per-page class="form-select form-control my-1 my-md-0">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                        </select>
                    </div>

                </div>

                <div class="table-responsive">
                    <table class="table table-custom table-centered table-select table-hover w-100 mb-0">
                        <thead class="bg-light align-middle bg-opacity-25 thead-sm">
                            <tr class="text-uppercase fs-xxs">
                                <th class="ps-3" style="width: 1%;">
                                    <input data-table-select-all
                                        class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox"
                                        value="option">
                                </th>
                                <th data-table-sort="nombre">Nombre</th>

                                <th data-table-sort="publicado">Publicado</th>

                                <th class="text-center" style="width: 1%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>



                            <!-- Product Row -->
                            @foreach( $maps as $map )
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                        type="checkbox" value="option">
                                </td>

                                <td>{{ $map->mapName }}</td>

                                <td>@if($map->mapActivo == 1)<i class="ti ti-square-check-filled fs-xxl" style="color: green">@else <i class="ti ti-square fs-xxl"></i>@endif</td>

                                <td>
                                    <div class="d-flex justify-content-center gap-1">

                                        <x-botones href="/points/{{ $map->mapId }}/list" button="btn-light">
                                            <i class="ti ti-map-pin fs-lg"></i>
                                        </x-botones>

                                         <x-botones href="#" button="btn-light see-map-btn" data-map-id="{{ $map->mapId }}" data-map-name="{{ $map->mapName }}">
                                            <i class="ti ti-map-2 fs-lg"></i>
                                        </x-botones>

                                         <x-botones href="/map/{{ $map->mapId }}/edit" button="btn-light">
                                            <i class="ti ti-edit fs-lg"></i>
                                        </x-botones>

                                        <x-botones href="/map/{{ $map->mapId }}/delete" button="btn-danger">
                                            <i class="ti ti-trash fs-lg"></i>
                                        </x-botones>

                                    </div>
                                </td>
                            </tr>
                            @endforeach


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
    </div><!-- end row -->



</div>
<!-- container -->


<!-- Map modal content -->
<div id="map-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="map-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="map-modalLabel">Ver Mapa</h4>
            </div>
            <div class="modal-body">
                <div id="map-container" style="height: 500px;"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@include('layouts.footer')
