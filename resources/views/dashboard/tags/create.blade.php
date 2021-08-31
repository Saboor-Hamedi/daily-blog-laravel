@extends('layouts.admin.main')
@section('title', 'Create Post')
@section('content')
<section class="content">
  <!-- Content Wrapper. Contains page content -->
 
    <!-- Main content -->
    <section class="content mt-3">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Tag
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form method="POST" action="{{ route('tags.store') }}" >
                @csrf
                <div class="form-group">
                  <input type="text" class="form-control @error('tag') is-invalid @enderror" name="tag" id="tag"
                   value="{{ old('tag') }}" placeholder="Tag">
                     @error('tag')
                            <small class="invalid-feedback" role="alert">
                              {{ $message }}
                            </small>
                       @enderror
                </div>
              <div class="form-group">
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
              </div>
              </form>
            </div>
           
          </div>
        </div>
      </div>
  
    </section>

@endsection