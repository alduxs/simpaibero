@include('layouts.header')

<div class="container-fluid">

                <div class="page-title-head d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h4 class="fs-sm text-uppercase fw-bold m-0">Perfil</h4>
                    </div>

                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>

                            <li class="breadcrumb-item"><a href="javascript: void(0);">Perfil</a></li>
                            <!--
                            <li class="breadcrumb-item active">Tour</li>-->
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Editar perfil</h4>
                            </div>

                            @if( session('mensaje') )
                                <x-alert></x-alert>
                            @endif

                            <div class="card-body">
                                <form action="/user/{{ $user->id }}/profile/update" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')

                                    <div class="mb-3">
                                        <label for="image" class="form-label">Imagen</label>
                                        <input type="file" name="image" id="image" class="form-control">
                                    </div>
                                    <h5>Imagen actual</h5>
                                    <div class="avatar avatar-xxl">
                                        @if($user->image)
                                        <img src="/assets/images/users/{{$user->image}}" alt="avatar-2" class="img-fluid img-thumbnail rounded-circle">
                                        @else
                                        <img src="/assets/images/users/usernoimge.jpg" alt="avatar-2" class="img-fluid img-thumbnail rounded-circle">
                                        @endif
                                    </div>

                                     <div class="border-top border-dashed my-3"></div>

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
                                        @if ($errors->has('name'))
                                            <div class="invalid-feedback" style="display: block">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>

                                     <div class="border-top border-dashed my-3"></div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Usuario (Email)</label>
                                        <input type="email" class="form-control" id="emailactual" name="emailactual" value="{{ old('email', $user->email) }}" disabled>
                                        <input type="hidden" class="form-control" id="email" name="email" value="{{ $user->email }}">
                                    </div>

                                     <div class="border-top border-dashed my-3"></div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                        @if ($errors->has('password'))
                                            <div class="invalid-feedback" style="display: block">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                    </div>

                                     <div class="border-top border-dashed my-3"></div>

                                    <p class="text-center"><button type="submit" class="btn btn-primary">Modificar</button></p>

                                </form>
                            </div> <!-- end card-body -->
                        </div> <!-- end card-->

                    </div><!-- end col -->
                </div><!-- end row -->



            </div>
            <!-- container -->

@include('layouts.footer')
