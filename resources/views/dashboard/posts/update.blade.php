
@extends('layouts.admin.main')
@section('title', 'Create Post')
@section('content')
<section class="content">

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-info">
          <div class="card-header">
            <h3 class="card-title">
              Update
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form method="post" action="{{ route('posts.update', $post) }}" 
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
              value="{{ $post->title }}" placeholder="The title">
              @error('title')
              <small class="invalid-feedback" role="alert">
                {{ $message }}
              </small>
              @enderror
            </div>
            <textarea  name="body_post" id="body_post" 
            class="@error('body_post') is-invalid @enderror">
            {{ $post->body_post }}
          </textarea>

          @error('body_post')
          <small class="invalid-feedback" role="alert">
            {{ $message }}
          </small>
          @enderror
          <div class="form-group mt-3" >
            <div class="custom-file">
              <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image">
              <label class="custom-file-label" for="image">Choose file</label>
              @error('image')
              <small class="invalid-feedback" role="alert">
                {{ $message }}
              </small>
              @enderror
            </div>
             {{-- Tags  --}}
            <div class="form-group mt-2">
              <select class="select2 select2-hidden-accessible"
              multiple="" data-placeholder="Select tags" 
              style="width: 100%;" data-select2-id="7" 
                 d="-1" aria-hidden="true" name="tags[]">
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" 
                      @foreach ($posts->tags as $postTag)
                         @if ($postTag->id == $tag->id)
                           selected 
                         @endif
                      @endforeach
                    >
                    {{ $tag->name }}
                   </option>
                @endforeach
            </select>
          </div>
          {{--  categories --}}
           <div class="form-group">
            
              <select name="categories[]" id="categories" class="form-control">
                  @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" 
                      @foreach ($posts->categories as $postCat)
                         @if ($postCat->id == $cat->id)
                           selected 
                         @endif
                      @endforeach
                    >
                    {{ $cat->name }}
                   </option>
                @endforeach
              </select>
          </div>
        {{-- end --}}
          <div style="display: flex; justify-content: flex-end; margin-top: 1rem;">
            <img src="{{ asset('/storage/postImages/'. $post->image) }}" 
            class="img-thumbnail" style="height: 300px;">
          </div>
        </div>
        <div class="form-group">
          <button type="submit" name="submit" id="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>

  </div>
</div>
</div>

</section>

@endsection