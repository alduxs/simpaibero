@include('layouts.wp-header-int')

<main>


        <!--Seccion 10-->
        <section class="section-productos">
            <div class="container">

                <div class="row">

                    <div class="col-12 col-lg-10 offset-lg-1">
                        @php
                            $categoria = 0;
                        @endphp
                        <!-- AMASADORAS -->
                        @foreach( $productos as $producto )
                            @if($categoria != $producto->getCategoria->categoryId)


                                @if($categoria == 0)
                                    <div class="row" data-aos="fade-right" data-aos-delay="50" data-aos-duration="1000" id="{{ Str::lower(Str::ascii($producto->getCategoria->categoryName)) }}">

                                    <div class="col-12">
                                        <h2>{{ Str::upper($producto->getCategoria->categoryName) }}</h2>
                                    </div>
                                    @php
                                        $categoria = $producto->getCategoria->categoryId;
                                    @endphp
                                    <div class="col-6 col-md-4">
                                        <div class="card  separacion-2-columnas" style="border-radius: 0;">
                                            <img src="assets/productos/big/{{ $producto->portada->imageName }}" class="card-img-top" style="border-radius: 0;">
                                            <h3>{{ $producto->productName }}</h3>
                                            <div class="card-body">
                                                <p><a href="/productos/{{ Str::lower(Str::ascii($producto->getCategoria->categoryName)) }}/{{ $producto->productHash }}" class="link-buton-block">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    </div>
                                    <div class="row" data-aos="fade-right" data-aos-delay="50" data-aos-duration="1000" id="{{ Str::lower(Str::ascii($producto->getCategoria->categoryName)) }}">

                                        <div class="col-12">
                                            <h2>{{ Str::upper($producto->getCategoria->categoryName) }}</h2>
                                        </div>
                                        @php
                                            $categoria = $producto->getCategoria->categoryId;
                                        @endphp
                                        <div class="col-6 col-md-4">
                                            <div class="card  separacion-2-columnas" style="border-radius: 0;">
                                                <img src="assets/productos/big/{{ $producto->portada->imageName }}" class="card-img-top" style="border-radius: 0;">
                                                <h3>{{ $producto->productName }}</h3>
                                                <div class="card-body">
                                                    <p><a href="/productos/{{ Str::lower(Str::ascii($producto->getCategoria->categoryName)) }}/{{ $producto->productHash }}" class="link-buton-block">Ver más</a></p>
                                                </div>
                                            </div>
                                        </div>
                                @endif
                            @else
                                <div class="col-6 col-md-4">
                                    <div class="card  separacion-2-columnas" style="border-radius: 0;">
                                        <img src="assets/productos/big/{{ $producto->portada->imageName }}" class="card-img-top" style="border-radius: 0;">
                                        <h3>{{ $producto->productName }}</h3>
                                        <div class="card-body">
                                            <p><a href="/productos/{{ Str::lower(Str::ascii($producto->getCategoria->categoryName)) }}/{{ $producto->productHash }}" class="link-buton-block">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>

                            @endif


                            {{--
                        <div class="row" data-aos="fade-right" data-aos-delay="50" data-aos-duration="1000" id="amasadoras">

                            <div class="col-12">
                                <h2>AMASADORAS</h2>
                            </div>


                                <div class="col-6 col-md-4">
                                    <div class="card  separacion-2-columnas" style="border-radius: 0;">
                                        <img src="assets/productos/big/{{ $producto->portada->imageName }}" class="card-img-top" style="border-radius: 0;">
                                        <div class="card-body">
                                            <p><a href="/unproducto/{{ Str::lower(Str::ascii($producto->getCategoria->categoryName)) }}/{{ $producto->productHash }}" class="link-buton-block">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        --}}
                         @endforeach

                        </div>

                    </div>


                </div>
        </section>
        <!-- Fin Seccion 10-->


    </main>

@include('layouts.wp-footer')
