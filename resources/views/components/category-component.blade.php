@foreach($categories as $row)
	
	    <a class="nav-link ml-2" href="{{route('bycategory',$row->id)}}">{{$row->name}}</a>

@endforeach