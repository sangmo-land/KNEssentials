{{-- resources/views/components/dynamic-icon.blade.php --}}
@props(['category'])

@php
$icon = config("category_themes.{$category->name}.icon", 'question-mark-circle');
$icons = [
'Food' => 'heroicon-o-cake',
'music' => 'heroicon-o-musical-note',
'tech' => 'heroicon-o-cpu-chip',
'travel' => 'heroicon-o-globe-alt',
'Health' => 'heroicon-o-heart',
'Fashion' => 'heroicon-o-arrows-pointing-out',
'education' => 'heroicon-o-academic-cap',
'default' => 'heroicon-o-question-mark-circle',
];
$iconClass = $icons[$icon] ?? $icons['default'];
@endphp

<x-icon :name="$iconClass" {{ $attributes->merge(['class' => 'flex-shrink-0']) }} />