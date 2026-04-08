<!-- Sidenav Menu Start -->
        <div class="sidenav-menu">

            <!-- Brand Logo -->
            <a href="index2.html" class="logo">
                <span class="logo logo-light">
                    <span class="logo-lg"><img src="assets/images/logo.png" alt="logo"></span>
                    <span class="logo-sm"><img src="assets/images/logo-sm.png" alt="small logo"></span>
                </span>

            </a>

            <!-- Sidebar Hover Menu Toggle Button -->
            <button class="button-on-hover">
                <i class="ti ti-menu-4 fs-22 align-middle"></i>
            </button>

            <!-- Full Sidebar Menu Close Button -->
            <button class="button-close-offcanvas">
                <i class="ti ti-x align-middle"></i>
            </button>

            <div class="scrollbar" data-simplebar>



                <!--- Sidenav Menu -->
                <ul class="side-nav">
                    <li class="side-nav-title" data-lang="menu-title">Menu</li>

                    <x-nav-link namelink="Categoría" linkList="/categories" linkAdd="/category/create">
                    </x-nav-link>

                    <x-nav-link namelink="Galerías" linkList="/galleries" linkAdd="/gallery/create">
                    </x-nav-link>

                    <x-nav-link namelink="Mapas" linkList="/maps" linkAdd="/map/create">
                    </x-nav-link>

                    <x-nav-link-list namelink="Textos" linkList="/texts">
                    </x-nav-link-list>

                    <x-nav-link namelink="Productos" linkList="/products" linkAdd="/product/create">
                    </x-nav-link>

                    <x-nav-link namelink="Usuarios" linkList="/users" linkAdd="/user/create">
                    </x-nav-link>

                    {{--
                    <x-nav-link href="/marcas" :active="request()->is('/marcas')">
                        Marcas
                    </x-nav-link>
                    <x-nav-link href="/categorias" :active="request()->is('/categorias')">
                        Categorias
                    </x-nav-link>
                    <x-nav-link href="/productos" :active="request()->is('/productos')">
                        Productos
                    </x-nav-link>
                    --}}

                    {{--
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link collapsed">
                            <span class="menu-icon"><i class="ti ti-files"></i></span>
                            <span class="menu-text" data-lang="categorias">Categorías</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarPages" style="">
                            <ul class="sub-menu">
                                <li class="side-nav-item">
                                    <a href="pages-profile.html" class="side-nav-link">
                                        <span class="menu-text" data-lang="listas">Listar</span>
                                    </a>
                                </li>
                                <li class="side-nav-item">
                                    <a href="pages-faq.html" class="side-nav-link">
                                        <span class="menu-text" data-lang="agregar">Agregar</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    --}}


                </ul>
            </div>
        </div>
        <!-- Sidenav Menu End -->
