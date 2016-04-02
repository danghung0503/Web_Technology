@if(Session::has('flash_message'))
	<div class = "alert alert-{!!Session::get('flash_level')!!} message">
		{!!Session::get('flash_message')!!}
	</div>
@endif