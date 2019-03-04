@foreach ([
    'twitter',
    'facebook',
    'google-plus',
    'linkedin',
    'skype',
    'skype',
    'dribbble',
    'tumblr',
] as $iteratedIcon)
    <option
            value="{{ $iteratedIcon }}"
            data-icon="{{ $iteratedIcon }}"
            @if (isset($icon) && ($icon == $iteratedIcon)) selected @endif
    >{{ $iteratedIcon }}</option>
@endforeach
