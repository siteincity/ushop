<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
    <i class="fa fa-plus-circle"></i> Новый товар
</button>
<div class="dropdown-menu dropdown-default">
	@php
		$groups = App\Group::all();	
	@endphp
	@foreach ($groups as $item)
		<a class="dropdown-item" href="{{ route('product.create') }}?group_id={{ $item->id }}">{{ $item->title }}</a>	
	@endforeach
</div>

{{ $slot }}