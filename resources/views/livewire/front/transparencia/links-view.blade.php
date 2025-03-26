<div>
    @if ($linksTransp and count($linksTransp) > 0)
        @foreach ($linksTransp as $link)
	@php
            $blank = '';
            if ($link->link != 'https://www.stacatarina.gob.mx/pbr'){
                $blank = 'target=_blank';
            }
        @endphp
        <li><a class="dropdown-item" href="{{$link->link}}" {{$blank}}>{{$link->nombre}}</a></li>
        @endforeach
    @endif
    
</div>
