@props(['width' => 500, 'height' => 500, 'type' => 'default'])

@php
$class = '';
if ($type === 'absolute') {
$class .= ' -mt-10 z-1000 mx-auto w-[90%]';
}
@endphp

<img src="http://picsum.photos/seed/{{ rand(0, 100000) }}/{{ $width }}/{{ $height }}" alt="Placeholder Image" {{
    $attributes->merge(['class' => 'rounded-xl ' .
$class]) }}
>