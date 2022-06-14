@props(['active','href'])

@php
$classes = ($active ?? false)
            ? 'border-l-4 border-primary bg-gray-200'
            : '';
@endphp
<li>
  <a href="{{$href}}" {{ $attributes->merge(['class' => $classes]) }} >{{ $slot }}</a>
</li>



