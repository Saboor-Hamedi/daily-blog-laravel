@extends('layouts.admin.main')
@section('title', 'Create Post')
@section('content')
<section class="content">
  <!-- Content Wrapper. Contains page content -->
 
    <!-- Main content -->
    <section class="content ">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Tags
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               @if (count($tags) > 0)
                @foreach ($tags as $tag)
                  <a href="#"><span class="badge badge-secondary">#{{ $tag->name }}</span></a>
                @endforeach
                @else   
                 <tr>
              <td colspan="6">
                  <h5 class="text-center">No tag found.</h5>
              </td>
           </tr>
               @endif
            <div style="display: flex; justify-content: flex-end; margin-top: 1rem;">
            {{ $tags->links() }}
          </div>
            </div>
          </div>
        </div>
      </div>
  
    </section>

@endsection