{{--
@props( ['active'=>true] )

<a {{ $attributes }} class="{{
             ( $active )
                ? 'bg-gray-900 text-white'
                : 'text-gray-300 hover:bg-gray-700 hover:text-white'

          }} rounded-md px-3 py-2 text-sm font-medium
             ">
    {{ $slot }}
</a>
--}}
<li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#{{$namelink}}" aria-expanded="false" aria-controls="{{$namelink}}"
        class="side-nav-link collapsed">
        <span class="menu-icon"><i class="ti ti-files"></i></span>
        <span class="menu-text" data-lang="{{$namelink}}">{{$namelink}}</span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="{{$namelink}}" style="">
        <ul class="sub-menu">
            <li class="side-nav-item">
                <a href="{{$linkList}}" class="side-nav-link">
                    <span class="menu-text" data-lang="listar">Listar</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{$linkAdd}}" class="side-nav-link">
                    <span class="menu-text" data-lang="agregar">Agregar</span>
                </a>
            </li>

        </ul>
    </div>
</li>
