@include('layouts.wp-header-int')

<main>


    <section class="section-unproducto">
        <div class="container">

            <div class="row">

                <div class="col-12 col-md-12 col-lg-10 offset-lg-1">
                    <p> <a href="javascript:history.go(-1)" class="back"><i class="fa-solid fa-chevron-left"></i> Volver</a> </p>
                </div>
                @if((count($images)>0))

                <div class="col-12 col-md-6 col-lg-5 offset-lg-1" data-aos="fade-right" data-aos-delay="50"
                    data-aos-duration="1000">
                    <div class="imagenes">
                        <div class="imagen-pincipal"
                            style="background-image: url('../../../../assets/productos/big/{{ $images[0]['imageName'] }}');"
                            id="imagen-principal-{{ $images[0]['imageId'] }}"></div>
                        @for($i = 1; $i < count($images); $i++) <div class="imagen-pincipal"
                            style="background-image: url('../../../../assets/productos/big/{{ $images[$i]['imageName'] }}'); display:none;"
                            id="imagen-principal-{{ $images[$i]['imageId'] }}">
                    </div>

                    @endfor

                    <div class="imagen-thumbs">
                        <div class="imagen-thumb"
                            style="background-image: url('../../../../assets/productos/small/{{ $images[0]['imageName'] }}');"
                            id="thumb-{{ $images[0]['imageId'] }}"></div>
                        @for($i = 1; $i < count($images); $i++) <div class="imagen-thumb"
                            style="background-image: url('../../../../assets/productos/small/{{ $images[$i]['imageName'] }}');"
                            id="thumb-{{ $images[$i]['imageId'] }}">
                    </div>
                    @endfor
                </div>
            </div>

        </div>
        @endif

        <div class="col-12 col-md-6 col-lg-5" data-aos="fade-left" data-aos-delay="50" data-aos-duration="1000">
            <div class="texto">
                <h1>{{ $producto->productName }}</h1>
                <p>{!! $producto->productDescription !!}</p>
                <p style="margin-top: 30px;">
                    @if($producto->productFichaTecnica)
                    <a href="{{ asset('assets/files/' . $producto->productFichaTecnica) }}" class="btn-accion"
                        target="_blank">Ficha técnica</a>
                    @endif
                    @if($producto->productManual)
                    <a href="{{ asset('assets/files/' . $producto->productManual) }}" class="btn-accion"
                        target="_blank">Manual</a>
                    @endif
                </p>
            </div>

        </div>


        </div>
    </section>

    @if($producto->relacionados->isNotEmpty())
    <!--Seccion 10-->
    <section class="section-productos">
        <div class="container">

            <div class="row">

                <div class="col-12 col-lg-10 offset-lg-1">

                    <!-- AMASADORAS -->
                    <div class="row" data-aos="fade-right" data-aos-delay="50" data-aos-duration="1000">

                        <div class="col-12">
                            <h2>RELACIONADOS</h2>
                        </div>

                       @foreach($producto->relacionados as $relacionado)
                        <div class="col-6 col-md-4">
                            <div class="card  separacion-2-columnas" style="border-radius: 0;">
                                <img src="{{ asset('assets/productos/big/' . $relacionado->portada->imageName) }}" class="card-img-top" style="border-radius: 0;">
                                <div class="card-body">
                                    <p><a href="/productos/{{ Str::lower(Str::ascii($relacionado->getCategoria->categoryName)) }}/{{ $relacionado->productHash }}" class="link-buton-block">Ver más</a></p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- Fin Seccion 10-->
    @endif




</main>

@include('layouts.wp-footer')
