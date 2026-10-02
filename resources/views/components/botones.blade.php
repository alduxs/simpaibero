<a href="{{ url($attributes->get('href')) }}" {{ $attributes->except('href') }} class="btn {{$button}} btn-icon btn-sm rounded-circle">{{ $slot }}</a>
