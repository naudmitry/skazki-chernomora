@foreach ([
    'eye',
    'laptop',
    'shopping-cart',
    'umbrella',
    'thumbs-o-up',
    'star',
] as $iteratedIcon)
    <option
            value="{{ $iteratedIcon }}"
            @if (isset($icon) && ($icon == $iteratedIcon)) selected @endif
    >{{ $iteratedIcon }}</option>
@endforeach
