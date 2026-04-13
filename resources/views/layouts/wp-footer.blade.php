<footer id="contacto">

    <div class="container">
        <div class="row">

            <div class="col-12 col-lg-10 offset-lg-1 separacion-2-columnas">
                <p><img src="{{ asset('assets/images/logo-footer-blanco.svg') }}" alt="" class="logo-footer"></p>
                <p>Simpa Iberoamericana S.A.</p>

            </div>

            <div class="col-12 col-md-6 col-lg-4 offset-lg-1 separacion-2-columnas">
                <h4>Argentina</h4>
                <p>Rueda 1331 - (2000) - Rosario - Santa Fe</p>
                <p>Tel: +54 341 777 7332 / 777 7329</p>
                <p>Whatsapp ventas: <a href="https://wa.me/543417456625" target="_blank">+54 341 7456625</a></p>
                <p>Whatsapp postventa: <a href="https://wa.me/543416675040" target="_blank">+54 341 6675040</a></p>
                <p><a href="mailto:info@simpaibero.com">info@simpaibero.com</a></p>
            </div>

            <div class="col-12 col-md-6 col-lg-3 separacion-2-columnas">
                <h4>Brasil</h4>
                <p>SAC Brasil</p>
                <p>Tel: (5511) 2985-8922</p>
                <p><a href="mailto:simpa@rg2brasil.com.br">simpa@rg2brasil.com.br</a></p>
            </div>

            <div class="col-12 col-md-6 col-lg-3 seguinos">
                <h5>Seguinos</h5>
                <ul>
                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a> <a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                </ul>
            </div>

        </div>
    </div>

</footer>

<div class="whatsapp whatm"><a href="https://wa.me/543417456625" target="_blank"><i class="fa-brands fa-whatsapp fa-2xl"></i></a></div>

<!-- BOOTSTRAP JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        @if (isset($maps))
            const mapData = @json($maps);
        @endif

        //console.log(mapData[0]); // Aquí verás el array de objetos JSON
    </script>
    <!-- Google maps -->
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8_03r9LkKX7DqnHDYfv8lbyvWH7gadwM&callback=initMap"></script>


    <!-- Main -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Main -->
    <script src="{{ asset('assets/js/animacion.js') }}"></script>

    <!-- Imagenes  -->
    <script src="{{ asset('assets/js/unproducto.js') }}"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>
