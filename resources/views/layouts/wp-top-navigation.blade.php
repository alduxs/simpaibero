<div class="top-navigation">
    <div class="logo"><a href="/"><img src={{ url('/assets/images/wp-logo.png') }} alt="" class="img-fluid"></a></div>
    <nav class="menu" id="menu">
        <ul>
            <li><a href={{ url('/#home') }}>Home</a></li>
            <li><a href={{ url('/#empresa') }}>Simpa</a></li>
            <li><a href={{ url('/#servicios') }}>Servicios</a></li>
            <li><a href={{ url('/#productos') }}>Productos</a></li>
            <li><a href={{ url('/#posventa') }}>Posventa</a></li>
            <li><a href={{ url('/#contacto') }}>Contactos</a></li>
        </ul>
    </nav>


    <div class="btn11" data-menu="11" id="bt-hamburger">
        <div class="icon-left"></div>
        <div class="icon-right"></div>
    </div>

    <div class="fifty">
        <img src={{ url('/assets/images/50anios.png') }} alt="">
    </div>

    <div class="find" id="bt-find">
        <i class="fa-solid fa-magnifying-glass"></i>
    </div>

    <div class="idiomatop">
        <ul>
            <li><a href="#" target="_blank"><img src={{ url('/assets/images/barg.png') }} alt="" class="img-fluid"></a></li>
            <li><a href="#" target="_blank"><img src={{ url('/assets/images/bbra.png') }} alt="" class="img-fluid"></a></li>
        </ul>
    </div>

</div>
<div class="find-container" id="findcontainer">
    <div class="find-box">
        <form action="/search" method="get">
            <input type="text" name="q" id="search-input" placeholder="Buscar..." value="{{ request('q') }}">
            <button type="submit">Buscar</button>
        </form>
    </div>
</div>
