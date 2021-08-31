@extends('layouts.admin.main')
@section('title', 'Create Post')
@section('content')
<section class="content">
  <!-- Main content -->
  <section class="content mt-3">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-info">
          <div class="card-header">
            <h3 class="card-title">
              Post
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" >
              @csrf
              <div class="form-group">
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                value="{{ old('title') }}" placeholder="The title">
                @error('title')
                <small class="invalid-feedback" role="alert">
                  {{ $message }}
                </small>
                @enderror
              </div>
              <textarea  name="body_post" id="body_post"  
              class="@error('body_post') is-invalid @enderror">
              {{ old('body_post') }}
            </textarea>
            
            @error('body_post')
            <small class="invalid-feedback" role="alert">
              {{ $message }}
            </small>
            @enderror
            <div class="form-group mt-3" >
              <div class="custom-file">
                <input type="file" class="custom-file-input 
                @error('image') is-invalid @enderror" id="image" name="image">
                <label class="custom-file-label" for="image">Choose file</label>
                @error('image')
                <small class="invalid-feedback" role="alert">
                  {{ $message }}
                </small>
                @enderror
              </div>
            </div>
            {{-- end  --}}
            <div class="form-group">
              <select class="select2 select2-hidden-accessible"
              multiple="" data-placeholder="Select tags" 
              style="width: 100%;" data-select2-id="7" 
              d="-1" aria-hidden="true" name="tags[]">
                @foreach ($tags as $tag)
                   <option value="{{ $tag->id }}" >{{ $tag->name }}</option>
                @endforeach
            </select>
          </div>
          {{--  categories --}}
            <select name="categories[]" id="categories" class="form-control">
              <option value="0" name="selectCat">Select Category</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
          {{-- tags end --}}
          <div class="form-group mt-2">
            <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

</section>

@endsection