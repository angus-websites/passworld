@props(['active','href'])

@php
$classes = ($active ?? false)
            ? 'border-l-4 border-indigo-400 bg-gray-200'
            : '';
$hrefStr = ($active ?? false)
            ? ""
            : "href=$href";
@endphp
<li>
  <a {{$hrefStr}} {{ $attributes->merge(['class' => $classes]) }} >{{ $slot }}</a>
</li>

