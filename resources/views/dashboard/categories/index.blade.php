@extends('layouts.admin.main')
@section('title', 'Dashboard')
@section('content') 
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">Categories</h3>
</div>
{{-- card body --}}
<div class="card-body">
<table id="example2" class="table table-bordered table-hover text-center">
<thead>
  <tr>
      <th>Category</th>
      <th>Slug</th>
  </tr>
</thead>
<tbody>
@if(count($cats) > 0)
@foreach($cats as $cat)
  <tr>
      <td>{{ $cat->name}}</td>
      <td>{{ $cat->slug }}</td>
  </tr>
@endforeach
@else 
   <tr>
    <td colspan="6">
        <h5 class="text-center">No cats found.</h5>
    </td>
 </tr>
@endif
</tbody>
</table>
</div>
</div>
</div>
</div>
@endsection