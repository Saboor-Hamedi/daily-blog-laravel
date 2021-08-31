
@extends('layouts.admin.main')
@section('title', 'Show')
@section('content')

<div class="row">
<div class="col-12">
<div class="card">
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

	<div class="mt-2">
		{{ strip_tags($post->body_post) }}
	</div>

	{{-- fetch tags of the current post --}}
		<div class="mt-2">
			<h5>Tags</h5>
			@foreach ($post->tags as $tag)
			<span class="badge badge-secondary">
					{{ $tag->name }}
			</span>
		   @endforeach
		</div>
	{{-- end  --}}
	</div>

	<div class="card-header d-flex">

		<div class="mr-3">
			<a href="{{ route('posts.edit', $post->slug) }}" class="btn btn-danger">
				<i class="fas fa-edit" style="margin-right: 5px;"></i>
				Edit
			</a>
		</div>

		<div>
			<form action="{{ route('posts.destroy', $post->slug) }}" method="post">
				@csrf
				@method('DELETE')
				<button type="submit" name="postDeleteBtn" id="postDeleteBtn" class="btn btn-danger">
				<i class="fas fa-trash" style="margin-right: 5px;"></i>
					Delete
				</button>
			</form>
		</div>

	</div>
</div>
</div>
</div>
@endsection