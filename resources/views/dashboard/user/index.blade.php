@extends('layouts.admin.main')
@section('title', 'Dashboard')
@section('content') 
<x-cards />
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">{{ ucfirst(auth()->user()->name) ?? '' }}</h3>
</div>
{{-- card body --}}
<div class="card-body" style="overflow: auto;">
<table id="example2" class="table table-bordered table-hover text-center" >
<thead>
  <tr>
    <th>Title</th>
    <th>Slug</th>
    <th>Text</th>
    <th>Image</th>
    <th>Category</th>
  </tr>
</thead>
<tbody>

@forelse($posts as $post)
  <tr @if($loop->first) class="bg-info" @endif>
      <td>{{ strip_tags(Str::limit($post->title,20)) }}</td>
      <td>{{ $post->slug }}</td>
      <td>{{ strip_tags(Str::limit($post->body_post,20)) }}</td>
      <td >
      <a href="{{ route('posts.show', $post) }}">
         <img src="{{ asset('/storage/postImages/'. $post->image) }}" style="height: 50px; width: 50px; border-radius: 50%;">
      </a>
     @forelse ($post->categories as $cat)
         <td>{{ $cat->name }}</td>
         @empty
        <td>
           <small>
             No category
           </small> 
        </td>
   
     @endforelse
  </tr>
  @empty
   <tr>
      <td colspan="6">
          <h5 class="text-center">No posts found.</h5>
      </td>
   </tr>
  @endforelse


</tbody>
</table>
  <div style="display: flex; justify-content: flex-end; margin-top: 1rem;">
    {{ $posts->links() }}
  </div>
</div>
</div>
</div>
</div>
@endsection