@include('layouts.wp-header')

<main>
    <!--Seccion 1-->
    <section class="model1" style="background-image: url('assets/images/logo-fondo-linea.png');background-repeat: no-repeat;background-position: left center;">
        <div class="container">

            <div class="row">

                <div class="col-12 col-lg-10 offset-lg-1">

                    <div class="contenido shadow-box logo-gris">
                        <div class="contenido-imagen" style="background-image: url('assets/images/batidora.jpg');"
                            data-aos="fade-in" data-aos-delay="50" data-aos-duration="1000">
                            <!--<img src="assets/img/batidora.jpg" alt="" class="img-fluid">-->
                        </div>
                        <div class="contenido-texto" data-aos="fade-in" data-aos-delay="50" data-aos-duration="1000">
                            <h2>{{ $texts[0]->textName; }}</h2>
                            <p>{!! $texts[0]->textContent; !!}</p>
                        </div>
                    </div>


                </div>



            </div>

        </div>

    </section>
    <!-- Fin Seccion 1-->

    <!--Seccion 2-->
    <section class="model2" style="background-image: url('assets/images/bgrd01.jpg');background-repeat: no-repeat;background-position: left center;">
        <div class="container logo-color">

            <div class="row">

                <div class="col-12 col-md-6 col-lg-5 offset-lg-1">

                    <div class="contenido-texto" data-aos="fade-right" data-aos-delay="50" data-aos-duration="1000">
                        <h2>{{ $texts[1]->textName; }}</h2>
                        <p>{!! $texts[1]->textContent; !!}</p>
                        <p><a href="/productos#amasadoras" class="link-buton">Nuestros Equipos</a></p>
                    </div>


                </div>

                <div class="col-12 col-md-6 col-lg-5">
                    <img src="assets/images/maquina-contorno01.png" alt="" class="img-fluid">
                </div>

            </div>

        </div>

    </section>
    <!-- Fin Seccion 2-->

    <!--Seccion 3-->
    <section class="model2" style="background-image: url('assets/images/bgrd02.jpg');background-repeat: no-repeat;background-position: left center;">
        <div class="container logo-color">

            <div class="row">

                <div class="col-12 col-md-6 col-lg-5 offset-lg-1">

                    <div class="contenido-texto" data-aos="fade-right" data-aos-delay="50" data-aos-duration="1000">
                        <h2>{{ $texts[2]->textName; }}</h2>
                        <p>{!! $texts[2]->textContent; !!}</p>
                        <p><a href="/productos#maquinas" class="link-buton">Nuestros Equipos</a></p>
                    </div>

                </div>

                <div class="col-12 col-md-6 col-lg-5">
                    <img src="assets/images/maquina-contorno02.png" alt="" class="img-fluid">
                </div>

            </div>

        </div>

    </section>
    <!-- Fin Seccion 3-->

    <!--Seccion 4-->
    <section class="model2" style="background-image: url('assets/images/bgrd03.jpg');background-repeat: no-repeat;background-position: left center;">
        <div class="container logo-color">

            <div class="row">

                <div class="col-12 col-md-6 col-lg-5 offset-lg-1">

                    <div class="contenido-texto" data-aos="fade-right" data-aos-delay="50" data-aos-duration="1000">
                        <h2>{{ $texts[3]->textName; }}</h2>
                        <p>{!! $texts[3]->textContent; !!}</p>
                        <p><a href="/productos#batidoras" class="link-buton">Nuestros Equipos</a></p>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5">
                    <img src="assets/images/maquina-contorno03.png" alt="" class="img-fluid">
                </div>

            </div>

        </div>

    </section>
    <!-- Fin Seccion 4-->

    <!--Seccion 5-->
    <section class="model2 "
        style="background-image: url('assets/images/bgrd04.jpg');background-repeat: no-repeat;background-position: left center;">
        <div class="container logo-color">

            <div class="row">

                <div class="col-12 col-md-6 col-lg-5 offset-lg-1">

                    <div class="contenido-texto" data-aos="fade-right" data-aos-delay="50" data-aos-duration="1000">
                        <h2>{{ $texts[4]->textName; }}</h2>
                        <p>{!! $texts[4]->textContent; !!}</p>
                        <p><a href="/productos#hornos" class="link-buton">Nuestros Equipos</a></p>
                    </div>

                </div>

                <div class="col-12 col-md-6 col-lg-5">
                    <img src="assets/images/maquina-contorno04.png" alt="" class="img-fluid">
                </div>

            </div>

        </div>

    </section>
    <!-- Fin Seccion 5-->

    <!--Seccion 6-->
    <section class="model1b"
        style="background-image: url('assets/images/logo-fondo-linea.png');background-repeat: no-repeat;background-position: left center;"
        id="servicios" data-aos="fade-right" data-aos-delay="50" data-aos-duration="1000">
        <div class="container">

            <div class="row">

                <div class="col-12">
                    <div class="card mb-3 shadow-box border-color-secondary" style="border-radius: 0;"
                        >
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="assets/images/preventa.jpg" class="card-img-top" style="border-radius: 0;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $texts[5]->textName; }}</h5>
                                    <p class="card-text">{!! $texts[5]->textContent; !!}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12" id="posventa">
                    <div class="card mb-3 shadow-box border-color-secondary" style="border-radius: 0;"
                        >
                        <div class="row g-0">
                            <div class="col-md-4" >
                                <img src="assets/images/postventa.jpg" class="card-img-top" style="border-radius: 0;" id="imgposventa">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="card-cont" id="cardcontent">
                                        <h5 class="card-title">{{ $texts[6]->textName; }}</h5>
                                        <p class="card-text">{!! $texts[6]->textContent; !!}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- Fin Seccion 6-->

    <!--Seccion 7-->
    <section class="model3">
        <div class="contenedor-a"
            style="background-image: url('assets/images/pan.jpg');background-repeat: no-repeat; background-size: cover;">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-10 offset-lg-1" data-aos="fade-right" data-aos-delay="50"
                        data-aos-duration="1000">
                        <h2>{{ $texts[7]->textName; }}</h2>
                        <p>{!! $texts[7]->textContent; !!}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="contenedor-b">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-10 offset-lg-1" data-aos="fade-right" data-aos-delay="50"
                        data-aos-duration="1000">
                        {!! $texts[8]->textContent; !!}
                    </div>
                </div>
            </div>
        </div>


    </section>
    <!-- Fin Seccion 7-->

    <!--Seccion 8-->
    <section class="model22 "
        style="background-image: url('assets/images/bgrd-envio.jpg');background-repeat: no-repeat;background-position: center center;background-size: cover;">
        <div class="container logo-color">

            <div class="row">

                <div class="col-12 col-lg-8 offset-lg-1">

                    <div class="contenido-texto" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500">
                        <h2>{{ $texts[9]->textName; }}</h2>
                        {!! $texts[9]->textContent; !!}
                        <p data-aos="fade" data-aos-delay="100" data-aos-duration="500"><a href="/#contacto"
                                class="link-buton">Formulario</a></p>
                    </div>

                </div>




            </div>

        </div>

    </section>
    <!-- Fin Seccion 8-->

    <!--Seccion 9-->
    <section class="model1b"
        style="background-image: url('assets/images/fondo-logo-gris-big.png');background-repeat: no-repeat;background-position: right center;">
        <div class="container">

            <div class="row">

                <div class="col-12 col-md-6 col-lg-7 offset-lg-1 separacion-2-columnas" data-aos="fade-right"
                    data-aos-delay="50" data-aos-duration="1000">

                    <h2>{{ $texts[10]->textName; }}</h2>
                    {!! $texts[10]->textContent; !!}

                </div>

                <div class="col-12 col-md-6 col-lg-3" data-aos="fade-left" data-aos-delay="50" data-aos-duration="1000">
                    <img src="assets/images/que-es-mercancia-aduana.jpg" alt=""
                        class="img-fluid shadow-box border-color-secondary rounded30">

                </div>


            </div>
        </div>
    </section>
    <!-- Fin Seccion 9-->

    <!--Seccion 10-->
    <section class="model1b"
        style="background-image: url('assets/images/degradado-gris.png');background-repeat: no-repeat;background-position: right center;"
        id="productos">
        <div class="container">

            <div class="row">

                <div class="col-12 col-lg-10 offset-lg-1" data-aos="fade-right" data-aos-delay="50"
                    data-aos-duration="500">

                    <h2>{{ $texts[11]->textName; }}</h2>
                    <p style="margin-bottom: 30px;">{!! $texts[11]->textContent; !!}</p>


                </div>

                <div class="col-12 col-lg-10 offset-lg-1">
                    <div class="row">

                        <div class="col-12 col-md-6 col-lg-3" data-aos="fade-right" data-aos-delay="100"
                            data-aos-duration="500">
                            <h3>AMASADORAS</h3>
                            <div class="card shadow-box separacion-2-columnas" style="border-radius: 0;">
                                <img src="assets/images/maquina-muestra1.png" class="card-img-top"
                                    style="border-radius: 0;">
                                <div class="card-body">
                                    <p><a href="/productos#amasadoras" class="link-buton-block">Ver más</a></p>
                                </div>
                            </div>

                        </div>

                        <div class="col-12 col-md-6 col-lg-3" data-aos="fade-right" data-aos-delay="600"
                            data-aos-duration="500">
                            <h3>BATIDORAS</h3>
                            <div class="card shadow-box separacion-2-columnas" style="border-radius: 0;">
                                <img src="assets/images/maquina-muestra2.png" class="card-img-top"
                                    style="border-radius: 0;">
                                <div class="card-body">
                                    <p><a href="/productos#batidoras" class="link-buton-block">Ver más</a></p>
                                </div>
                            </div>

                        </div>

                        <div class="col-12 col-md-6 col-lg-3" data-aos="fade-right" data-aos-delay="1100"
                            data-aos-duration="500">
                            <h3>MÁQUINAS</h3>
                            <div class="card shadow-box separacion-2-columnas" style="border-radius: 0;">
                                <img src="assets/images/maquina-muestra3.png" class="card-img-top"
                                    style="border-radius: 0;">
                                <div class="card-body">
                                    <p><a href="/productos#maquinas" class="link-buton-block">Ver más</a></p>
                                </div>
                            </div>

                        </div>

                        <div class="col-12 col-md-6 col-lg-3" data-aos="fade-right" data-aos-delay="1700"
                            data-aos-duration="500">
                            <h3>HORNOS</h3>
                            <div class="card shadow-box separacion-2-columnas" style="border-radius: 0;">
                                <img src="assets/images/maquina-muestra4.png" class="card-img-top"
                                    style="border-radius: 0;">
                                <div class="card-body">
                                    <p><a href="/productos#hornos" class="link-buton-block">Ver más</a></p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>




            </div>
        </div>
    </section>
    <!-- Fin Seccion 10-->

    <!--Seccion 11-->
    <section class="model22 "
        style="background-image: url('assets/images/bgrd-empresa.jpg');background-repeat: no-repeat;background-position: center center;"
        id="empresa">
        <div class="container">

            <div class="row">

                <div class="col-12 col-md-8 col-lg-6 offset-lg-1" data-aos="fade-right" data-aos-delay="50"
                    data-aos-duration="1000">

                    <div class="contenido-texto">
                        <h2>{{ $texts[12]->textName; }}</h2>
                        {!! $texts[12]->textContent; !!}

                    </div>

                </div>

                <civ class="col-12 col-md-4 col-lg-4" data-aos="fade-left" data-aos-delay="50" data-aos-duration="1000">
                    <div id="map"></div>
                </civ>


            </div>

        </div>

    </section>
    <!-- Fin Seccion 11-->

    <!--Seccion 12-->
    <section class="model4 "
        style="background-image: url('assets/images/bgrd-contacto.jpg');background-repeat: no-repeat;background-position: center center;"
        id="contacto">
        <div class="container">

            <div class="row">

                <div class="col-12 col-md-8 col-lg-6 offset-lg-1" data-aos="fade-right" data-aos-delay="50"
                    data-aos-duration="1000">
                    <div class="contenido-texto">
                        <h2>CONTACTO</h2>

                        <form id="contactForm" action="/assets/send/envio.php" method="post">

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre y Apellido</label>
                                <input type="text" name="name" class="form-control" id="nombre">
                                <div class="invalid-feedback" id="invalid-name"></div>
                            </div>

                            <div class=" mb-3">
                                <label for="localidad" class="form-label">Localidad</label>
                                <input type="text" name="localidad" class="form-control" id="localidad">

                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email">
                                <div class="invalid-feedback" id="invalid-email"></div>
                            </div>

                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" name="telefono" class="form-control" id="telefono">
                            </div>

                            <div class="mb-3">
                                <label for="asunto" class="form-label">Asunto</label>
                                <input type="text" name="casunto" class="form-control" id="asunto">
                                <div class="invalid-feedback" id="invalid-subject"></div>
                            </div>

                            <div class="mb-3">
                                <label for="consulta" class="form-label">Consulta</label>
                                <textarea class="form-control" id="consulta" rows="3" name="comment"></textarea>
                                <div class="invalid-feedback" id="invalid-message"></div>
                            </div>

                            <!---->
                            <p class="text-end"><button type="submit" class="link-buton">Enviar</button></p>

                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-4 col-lg-4" data-aos="fade-left" data-aos-delay="50" data-aos-duration="1000">
                    <div id="map2"></div>
                </div>


            </div>

        </div>

    </section>
    <!-- Fin Seccion 12-->

</main>

<!-- Modal -->
<div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">

        <div id="contactMessage"></div>
      </div>
      <div class="modal-footer" style="justify-content: center;">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closebutton" style="display: none">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){

    const emailModal = document.getElementById("emailModal");
    const sendModal = new bootstrap.Modal(emailModal, {
        keyboard: false,
        backdrop: 'static'
    });

    let campoName = document.getElementById('nombre');
    let campoEmail = document.getElementById('email');
    let campoSubject = document.getElementById('asunto');
    let campoMessage = document.getElementById('consulta');
    const msgDiv = document.getElementById('contactMessage');
    let closebutton = document.getElementById('closebutton');

    const form = document.getElementById('contactForm');
    if(!form) return;

    form.addEventListener('submit', async function(e){
        e.preventDefault();
        //msgDiv.innerHTML = '';
        const name = campoName.value?.trim();
        const email = campoEmail.value?.trim();
        const casunto = campoSubject.value?.trim();
        const comment = campoMessage.value?.trim();
        const errors = [];

        if(!name) errors.push({ field: 'name', message: 'Ingrese Nombre y Apellido.' });
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if(!email || !emailRegex.test(email)) errors.push({ field: 'email', message: 'Email inválido.' });
        if(!casunto) errors.push({ field: 'subject', message: 'Ingrese un Asunto.' });
        if(!comment) errors.push({ field: 'message', message: 'Ingrese una Consulta.' });



        if (errors.length) {

            const nameErr = errors.find(e => e.field === 'name')?.message;
            const emailErr = errors.find(e => e.field === 'email')?.message;
            const subjectErr = errors.find(e => e.field === 'subject')?.message;
            const messageErr = errors.find(e => e.field === 'message')?.message;



            if (nameErr) {
                document.getElementById('invalid-name').classList.remove('invalid-feedback');
                document.getElementById('invalid-name').innerHTML = '<div class="alert alert-danger" style="padding: 8px;font-size: 12px;">' + nameErr + '</div>';
            }
            if (emailErr) {
                document.getElementById('invalid-email').classList.remove('invalid-feedback');
                document.getElementById('invalid-email').innerHTML = '<div class="alert alert-danger" style="padding: 8px;font-size: 12px;">' + emailErr + '</div>';
            }
            if (subjectErr) {
                document.getElementById('invalid-subject').classList.remove('invalid-feedback');
                document.getElementById('invalid-subject').innerHTML = '<div class="alert alert-danger" style="padding: 8px;font-size: 12px;">' + subjectErr + '</div>';
            }
            if (messageErr) {
                document.getElementById('invalid-message').classList.remove('invalid-feedback');
                document.getElementById('invalid-message').innerHTML = '<div class="alert alert-danger" style="padding: 8px;font-size: 12px;">' + messageErr + '</div>';
            }
            return;
        }

        msgDiv.innerHTML = '<p>Estamos enviando su consulta. Espere un momento <i class="fa-solid fa-arrows-rotate fa-spin"></i></p>';
        sendModal.show();

        const fd = new FormData(form);

        try{
            const resp = await fetch(form.action, {method:'POST', body: fd});
            const data = await resp.json().catch(()=>null);
            if(data && data.success){
                msgDiv.innerHTML = '<div class="alert alert-success">'+(data.message||'Mensaje enviado correctamente.Nos pondremos en contacto con usted a la brevedad.')+'</div>';
                form.reset();
            } else if (data){
                const details = data.errors ? data.errors.join('<br>') : (data.error || data.message || 'Error al enviar.');
                msgDiv.innerHTML = '<div class="alert alert-danger">'+details+'</div>';
            } else {
                msgDiv.innerHTML = '<div class="alert alert-danger">Respuesta inesperada del servidor.</div>';
            }
            closebutton.style.display = 'block';
        } catch(err){
            msgDiv.innerHTML = '<div class="alert alert-danger">Error de red. Intente más tarde.</div>';
            closebutton.style.display = 'block';
        }
    });

    campoEmail.addEventListener('input', function(){
        document.getElementById('invalid-email').classList.add('invalid-feedback');
        document.getElementById('invalid-email').innerHTML = '';
    });
    campoName.addEventListener('input', function(){
        document.getElementById('invalid-name').classList.add('invalid-feedback');
        document.getElementById('invalid-name').innerHTML = '';
    });
    campoSubject.addEventListener('input', function(){
        document.getElementById('invalid-subject').classList.add('invalid-feedback');
        document.getElementById('invalid-subject').innerHTML = '';
    });
    campoMessage.addEventListener('input', function(){
        document.getElementById('invalid-message').classList.add('invalid-feedback');
        document.getElementById('invalid-message').innerHTML = '';
    });

});
</script>

@include('layouts.wp-footer')
