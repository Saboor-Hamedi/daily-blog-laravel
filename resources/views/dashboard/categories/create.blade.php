@extends('layouts.admin.main')
@section('title', 'Create Post')
@section('content')
<section class="content">
  <!-- Content Wrapper. Contains page content -->
 
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Category
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form method="POST" action="{{ route('categories.store') }}" >
                @csrf
                <div class="form-group">
                  <input type="text" class="form-control @error('category') is-invalid @enderror" name="category" id="category"
                   value="{{ old('category') }}" placeholder="Category">
                     @error('category')
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