@include('layouts.header')

<div class="container-fluid">

    <div class="page-title-head d-flex align-items-center">
        <div class="flex-grow-1">
            <h4 class="fs-sm text-uppercase fw-bold m-0">Categorías</h4>
        </div>

        <div class="text-end">
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>

                <li class="breadcrumb-item"><a href="javascript: void(0);">Usuarios</a></li>
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
                                placeholder="Buscar categoría...">
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
                                <th data-table-sort="usuario">Usuario</th>

                                <th class="text-center" style="width: 1%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>



                            <!-- Product Row -->
                            @foreach( $users as $user )
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0"
                                        type="checkbox" value="option">
                                </td>

                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>

                                <td>
                                    <div class="d-flex justify-content-center gap-1">

                                        <x-botones href="/user/{{ $user->id }}/edit" button="btn-light">
                                            <i class="ti ti-edit fs-lg"></i>
                                        </x-botones>

                                        <x-botones href="/user/{{ $user->id  }}/delete" button="btn-danger">
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

@include('layouts.footer')
