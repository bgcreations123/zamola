@foreach($items as $menu_item)
    {{-- <li>
    	<a href="/home{{ $menu_item->link() }}">{{ $menu_item->title }}</a>
    </li> --}}
    
    @php
        $submenu = $menu_item->children;
    @endphp

    @if($submenu->count() > 0)
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $menu_item->title }}<span class="caret"></span></a>
			<ul class="dropdown-menu">
				@foreach($submenu as $item)
	                <li><a href="{{$item->url}}">{{$item->title}}</a></li>
	            @endforeach
			</ul>
		</li>
    @else
	    <li>
	        <a href="{{ $menu_item->url }}">{{ $menu_item->title }}</a>
	    </li>
    @endif

@endforeach