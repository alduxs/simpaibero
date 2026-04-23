@component('mail::message')

**Nombre y Apellido:** {{ $data['name'] }}

**Localidad:** {{ $data['localidad'] ?? '-' }}

**Email:** {{ $data['email'] }}

**Teléfono:** {{ $data['telefono'] ?? '-' }}

**Mensaje:**

{{ $data['comment'] }}

@endcomponent
