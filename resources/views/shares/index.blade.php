@extends('shares.layout')

@section('content')
<style type="text/css">
	.uper {
		margin-top: 40px;
	}
</style>
<div class="uper">
	@if (session()->get('success'))
		<div class="alert alert-success">
			{{ session()->get('success') }}
		</div><br>
	@endif
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="{{ url('/') }}">Navbar</a>


	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="{{ url('/shares/create') }}">Create <span class="sr-only">(current)</span></a>
	      </li>
	    </ul>
	  </div>
	</nav>
	<br>
	<table class="table table-dark table-striped">
		<thead>
			<tr>
				<td>ID</td>
				<td>Stock Name</td>
				<td>Stock Price</td>
				<td>Stock Quantity</td>
				<td colspan="2">Action</td>
			</tr>
		</thead>
		<tbody>
			@foreach($shares as $share)
			<tr>
				<td>{{ $share->id }}</td>
				<td>{{ $share->share_name }}</td>
				<td>{{ $share->share_price }}</td>
				<td>{{ $share->share_qty }}</td>
				<td><a href="{{ route('shares.edit',$share->id) }}" class="btn btn-primary">Edit</a></td>
				<td>
					<form action="{{ route('shares.destroy', $share->id) }}" method="post">
						@csrf
						@method('DELETE')
						<button class="btn btn-danger" type="submit">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection