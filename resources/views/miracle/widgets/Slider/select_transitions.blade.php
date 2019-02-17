@foreach ([
    'zoomin',
    'zoomout',
    'slidedown'
] as $iteratedTransition)
    <option
            value="{{ $iteratedTransition }}"
            @if (isset($transition) && ($transition == $iteratedTransition)) selected @endif
    >{{ $iteratedTransition }}</option>
@endforeach
