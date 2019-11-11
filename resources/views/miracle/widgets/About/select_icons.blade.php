@foreach ([
    'twitter',
    'facebook',
    'google-plus',
    'linkedin',
    'skype',
    'dribbble',
    'tumblr',
    'vk',
    'instagram',
    'odnoklassniki'
] as $iteratedIcon)
    <option
            value="{{ $iteratedIcon }}"
            data-icon="{{ $iteratedIcon }}"
            data-with-icons="true"
            @if (isset($icon) && ($icon == $iteratedIcon)) selected @endif
    >{{ $iteratedIcon }}</option>
@endforeach
