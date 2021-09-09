
@extends('layouts.admin.main')
@section('title', 'Show')
@section('content')

<div class="row">
<div class="col-12">
<div class="card p-0">
<div class="card-header">
	<h3 class="card-title">{{ $post->title }}</h3>
</div>

	<img src="{{ asset('/storage/postImages/'. $post->image) }}" 
		class="img-thumbnail" style="height: 300px;">
	<div class="card-body">
		<div class="d-block" >
			<h2 style="font-size: 18px;">Author: {{ ucfirst($post->user->name) }}</h2>
			<small>
				<i class="far fa-clock"></i>
				{{ $post->created_at->diffForHumans() }}
			</small>
		</div>

		<div>
		 	{!! $post->body_post !!}
		 	<br>
				@foreach ($post->tags as $tag)
					<span class="badge badge-secondary">
						{{ $tag->name }}
					</span>
			    @endforeach
		</div>
	</div>

	<div style="display:flex;  padding: 10px; ">
			{{-- @if ($post->user->id == Auth::user()->id) --}}
			@if($post->if_User())
				<a href="{{ route('posts.edit', $post->slug) }}" class="btn btn-danger btn-sm">
				  <i class="fas fa-edit" style="margin-right: 5px;"></i>
				  Edit
			   </a>
			   @endif
			{{-- @endif --}}
			
			<form action="{{ route('posts.destroy', $post->slug) }}" method="post">
				@csrf
				@method('DELETE')
				<button type="submit" name="postDeleteBtn" id="postDeleteBtn" class="btn btn-danger btn-sm ml-2">
				<i class="fas fa-trash" style="margin-right: 5px;"></i>
					Delete
				</button>
			</form>
	</div>
</div>
</div>
</div>
@endsection