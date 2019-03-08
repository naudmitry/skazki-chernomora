@foreach ([
    'search',
    'pencil',
    'hand-o-up',
    'check'
] as $iteratedIcon)
    <option
            value="{{ $iteratedIcon }}"
            @if (isset($icon) && ($icon == $iteratedIcon)) selected @endif
    >{{ $iteratedIcon }}</option>
@endforeach
