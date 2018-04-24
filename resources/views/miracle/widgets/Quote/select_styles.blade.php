@foreach ([
    'style1',
    'style2',
    'style3'
] as $iteratedStyle)
    <option
            value="{{ $iteratedStyle }}"
            @if (isset($style) && ($style == $iteratedStyle)) selected @endif
    >{{ trans('widgets.Quote.' . $iteratedStyle) }}</option>
@endforeach
