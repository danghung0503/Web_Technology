@extends('users.index')

@section('button_header')
	<div class="info_member">
		<div class = "fullname_member">
			<img src="{!!url('resources/upload/avatar')!!}/{!!Auth::user()->avatar!!}" alt="Avatar" class="avatar">
		</div>
		<ul>
			<li><a href="{!!url('member/update')!!}/{!!Auth::user()->id!!}">Cập nhật</a></li>
			<li><a href="{!!url('/auth/logout')!!}">Đăng xuất</a></li>
		</ul>
	</div>
	<span class="fullname">{!!Auth::user()->fullname!!}</span>
@stop
@section('content')
	@include ('users.content');
@stop