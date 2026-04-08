@include('layouts.header')

<div class="container-fluid">

                <div class="page-title-head d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h4 class="fs-sm text-uppercase fw-bold m-0">Galerías</h4>
                    </div>

                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>

                            <li class="breadcrumb-item"><a href="javascript: void(0);">Textos</a></li>
                            <!--
                            <li class="breadcrumb-item active">Tour</li>-->
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Editar texto</h4>
                            </div>

                            <div class="card-body">
                                <form action="/text/{{ $text->textId }}/update" method="post">
                                    @csrf
                                    @method('put')

                                    <div class="mb-3">
                                        <label for="textName" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="textName" name="textName" value="{{ old('textName',$text->textName) }}">
                                        <input type="hidden" name="textId" value="{{ $text->textId  }}">
                                        @if ($errors->has('textName'))
                                            <div class="invalid-feedback" style="display: block">{{ $errors->first('textName') }}</div>
                                        @endif
                                    </div>

                                    <div class="border-top border-dashed my-3"></div>

                                    <div class="mb-3">
                                        <label for="textContent" class="form-label">Contenido</label>
                                        <textarea class="form-control" id="txtEditor" name="textContent" rows="4">{{ old('textContent',$text->textContent) }}</textarea>
                                        @if ($errors->has('textContent'))
                                            <div class="invalid-feedback" style="display: block">{{ $errors->first('textContent') }}</div>
                                        @endif
                                    </div>

                                    <div class="border-top border-dashed my-3"></div>

                                    <div class="mb-3">
                                        <h5>Nombre Activo</h5>
                                        <div class="form-check fs-lg form-check-inline">
                                            <input class="form-check-input" type="radio" name="nameActiv" id="nSi"
                                                value="1" {{ old('nameActiv', $text->nameActiv) == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label fs-base" for="nSi">Si</label>
                                        </div>
                                        <div class="form-check fs-lg form-check-inline">
                                            <input class="form-check-input" type="radio" name="nameActiv" id="nNo"
                                                value="0" {{ old('nameActiv', $text->nameActiv) == '0' ? 'checked' : '' }}>
                                            <label class="form-check-label fs-base" for="nNo">No</label>
                                        </div>
                                    </div>

                                    <div class="border-top border-dashed my-3"></div>

                                    <div class="mb-3">
                                        <h5>Publicado</h5>
                                        <div class="form-check fs-lg form-check-inline">
                                            <input class="form-check-input" type="radio" name="textActiv" id="mSi"
                                                value="1" {{ old('textActiv', $text->textActiv) == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label fs-base" for="mSi">Si</label>
                                        </div>
                                        <div class="form-check fs-lg form-check-inline">
                                            <input class="form-check-input" type="radio" name="textActiv" id="mNo"
                                                value="0" {{ old('textActiv', $text->textActiv) == '0' ? 'checked' : '' }}>
                                            <label class="form-check-label fs-base" for="mNo">No</label>
                                        </div>
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
