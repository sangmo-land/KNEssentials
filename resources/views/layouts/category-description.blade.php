{{-- resources/views/components/category-description.blade.php --}}
@props(['category', 'tracks'])
{{-- @dump($tracks) --}}
@switch(strtolower($category->name))
@case('music')
<x-categories.music :category="$category" :tracks="$tracks"/>
@break

@case('food delivery')
<x-categories.food :category="$category" />
@break

@case('health care')
<x-categories.health :category="$category" />
@break

@case('fashion')
<x-categories.fashion :category="$category" />
@break

@default
<x-categories.default :category="$category" />
@endswitch