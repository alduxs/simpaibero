@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://simpaibero.com/public/assets/images/logo-black.png" class="logo" alt="Simpa Iberoamericana S.A.">
@else
{!! $slot !!}
@endif
</a>
</td>
</tr>
