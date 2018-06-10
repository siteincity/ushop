<div class="app-action-title row no-gutters justify-content-between"> 
	
	<h3>
		{{ $name or ''}} 
		<small>
			{{ $description or ''}} 
		</small>
	</h3>

	<div class="btn-group-sm"> 

		<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
    		<i class="fa fa-plus-circle"></i> Новый товар
	    </button>
	    <div class="dropdown-menu dropdown-default">
	    	@foreach ($groupGetList as $id => $value)
	    		<a class="dropdown-item" href="{{ route('product.create') }}?group_id={{ $id }}">{{ $value }}</a>	
	    	@endforeach
	    </div>

	</div>

</div>