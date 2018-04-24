@foreach ([
    'check',
    'eye',
    'tint'
] as $iteratedIcon)
    <option
            value="{{ $iteratedIcon }}"
            data-icon="{{ $iteratedIcon }}"
            @if (isset($icon) && ($icon == $iteratedIcon)) selected @endif
    >{{ $iteratedIcon }}</option>
@endforeach
