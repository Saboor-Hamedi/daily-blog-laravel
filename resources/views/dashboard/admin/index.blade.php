@extends('layouts.admin.main')
@section('title', 'Dashboard')
@section('content') 

<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">DataTable with minimal features & hover style</h3>
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
@if(count($posts) > 0)
@foreach($posts as $post)
  <tr>
      <td>{{ $post->title }}</td>
      <td>{{ $post->slug }}</td>
      <td>{{ strip_tags(Str::limit($post->body_post,100)) }}</td>
      <td >
      <a href="{{ route('posts.show', $post) }}">
         <img src="{{ asset('/storage/postImages/'. $post->image) }}" style="height: 50px; width: 50px; border-radius: 50%;">
      </a>
     @foreach ($post->categories as $cat)
       <td>{{ $cat->name }}</td>
     @endforeach
  </tr>
  @endforeach
  @else 
     <tr>
      <td colspan="6">
          <h5 class="text-center">No posts found.</h5>
      </td>
   </tr>
  @endif

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