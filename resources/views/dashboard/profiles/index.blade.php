@extends('layouts.admin.main')
@section('title', 'Dashboard')
@section('content') 
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-3">

<!-- Profile Image -->
<div class="card card-primary card-outline">
<div class="card-body box-profile">
<div class="text-center">
  <img class="profile-user-img img-fluid img-circle"
  src="{{ asset('storage/profileImages/'. $user?->profile?->image) }}"
  style="height: 100px;" >
  </div>
<h3 class="profile-username text-center">
  <small>{{ $user->name }}</small>
  <small>{{ $user->profile->lastname ?? '' }}</small>
</h3>

<p class="text-muted text-center"> <small>{{ $user->profile->bio ?? '' }}</small></p>

<ul class="list-group list-group-unbordered mb-3">
  <li class="list-group-item">
    <b>Followers</b> <a class="float-right">1,322</a>
  </li>
  <li class="list-group-item">
    <b>Following</b> <a class="float-right">543</a>
  </li>
  <li class="list-group-item">
    <b>Friends</b> <a class="float-right">13,287</a>
  </li>
</ul>

<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->

<!-- About Me Box -->
<div class="card card-primary">
<div class="card-header">
<h3 class="card-title">About Me</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
<strong><i class="fas fa-book mr-1"></i> Education</strong>

<p class="text-muted">
  B.S. in Computer Science from the University of Tennessee at Knoxville
</p>

<hr>

<strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

<p class="text-muted">Malibu, California</p>

<hr>

<strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

<p class="text-muted">
  <span class="tag tag-danger">UI Design</span>
  <span class="tag tag-success">Coding</span>
  <span class="tag tag-info">Javascript</span>
  <span class="tag tag-warning">PHP</span>
  <span class="tag tag-primary">Node.js</span>
</p>

<hr>

<strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->
<div class="col-md-9">
<div class="card">
<div class="card-header p-2">
<ul class="nav nav-pills">
  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
</ul>
</div><!-- /.card-header -->
<div class="card-body">
<div class="tab-content">
  <div class="active tab-pane" id="activity">
 
 	@if(count($posts)>0)
 	@foreach ($posts as $post)
 		<div class="post">
		<div class="user-block">
			
        @if ($post->image !==null)
         <img class="img-circle img-bordered-sm" 
            src="{{ asset('/storage/postImages/'. $post->image ) }}" >
             <span class="username">
        @else 
          <img class="img-circle img-bordered-sm" 
            src="{{ asset('storage/postImages/default.jpg') }}" >
             <span class="username">
        @endif
			<a href="#">{{ $post->title ?? '' }}</a>
			<a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
			</span>
			<span class="description">Shared publicly - {{ $post->created_at->format('j M, Y h:i:s A') ?? '' }}</span>
			</div>
			<p>
				{{ $post->body_post ?? '' }}
			</p>
      <form action="">
        @csrf
         <button class="btn btn-primary btn-sm">
            {{ $post->is_published ? 'published' : 'unpublished' }}
        </button>
      </form>
	</div>
 	@endforeach
  
 		@else

	<div class="post">
		<div class="user-block">
			<img class="img-circle img-bordered-sm" src="{{ asset('storage/postImages/default.jpg') }}" >
			<span class="username">
			<a href="#">Jonathan Burke Jr.</a>
			<a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
			</span>
			<span class="description">Shared publicly - 7:30 PM today</span>
			</div>
			<p>
			Lorem ipsum represents a long-held tradition for designers,
			typographers and the like. Some people hate it and argue for
			its demise, but others ignore the hate as they create awesome
			tools to help create filler text for everyone from bacon lovers
			to Charlie Sheen fans.
			</p>
	</div>
 	@endif
  </div>
    
  <!-- /.tab-pane -->
  <div class="tab-pane" id="timeline">
    <!-- The timeline -->
    <div class="timeline timeline-inverse">
      <!-- timeline time label -->
      <div class="time-label">
        <span class="bg-danger">
          10 Feb. 2014
        </span>
      </div>
      <!-- /.timeline-label -->
      <!-- timeline item -->
      <div>
        <i class="fas fa-envelope bg-primary"></i>

        <div class="timeline-item">
          <span class="time"><i class="far fa-clock"></i> 12:05</span>

          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

          <div class="timeline-body">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
            weebly ning heekya handango imeem plugg dopplr jibjab, movity
            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
            quora plaxo ideeli hulu weebly balihoo...
          </div>
          <div class="timeline-footer">
            <a href="#" class="btn btn-primary btn-sm">Read more</a>
            <a href="#" class="btn btn-danger btn-sm">Delete</a>
          </div>
        </div>
      </div>
      <div>
        <i class="fas fa-user bg-info"></i>
        <div class="timeline-item">
          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
          </h3>
        </div>
      </div>
      <div>
        <i class="fas fa-comments bg-warning"></i>
        <div class="timeline-item">
          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>
          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
          <div class="timeline-body">
            Take me to your leader!
            Switzerland is small and neutral!
            We are more like Germany, ambitious and misunderstood!
          </div>
          <div class="timeline-footer">
            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
          </div>
        </div>
      </div>
      <div class="time-label">
        <span class="bg-success">
          3 Jan. 2014
        </span>
      </div>
      <div>
        <i class="fas fa-camera bg-purple"></i>
        <div class="timeline-item">
          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>
          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
          <div class="timeline-body">
            <img src="https://placehold.it/150x100" alt="...">
            <img src="https://placehold.it/150x100" alt="...">
            <img src="https://placehold.it/150x100" alt="...">
            <img src="https://placehold.it/150x100" alt="...">
          </div>
        </div>
      </div>
      <div>
        <i class="far fa-clock bg-gray"></i>
      </div>
    </div>
  </div>

  <div class="tab-pane" id="settings">
   <form method="post" action="{{ route('profiles.update', $user) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group row ">
             <label for="lastname" class="col-sm-2 col-form-label">Profile</label>
            <div class="custom-file col-sm-10">
                <input type="file" class="custom-file-input" id="image" name="image">
                <label class="custom-file-label" for="image">Choose file</label>
            </div>
        </div>
      <div class="form-group row">
        <label for="lastname" class="col-sm-2 col-form-label">Last name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ $user->profile->lastname ?? '' }}"
           name="lastname" id="lastname"  placeholder="Last Name">
        </div>
      </div>
      <div class="form-group row">
        <label for="bio" class="col-sm-2 col-form-label">Bio</label>
        <div class="col-sm-10">
          <input type="text" value="{{ $user->profile->bio ?? '' }}" 
          class="form-control" name="bio" id="bio" placeholder="Biography">
        </div>
      </div>
      <div class="form-group row">
        <label for="facebook"  class="col-sm-2 col-form-label">Facebook</label>
        <div class="col-sm-10">
          <input type="text" value="{{ $user->profile->facebook ?? ''}}" 
          class="form-control" name="facebook" id="facebook"  placeholder="Facebook Link">
        </div>
      </div>
      <div class="form-group row">
        <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
        <div class="col-sm-10">
          <input type="text" value="{{ $user->profile->instagram ?? '' }}" 
          class="form-control" name="instagram" id="instagram" placeholder="Instagram Link">
        </div>
      </div>

       <div class="form-group row">
        <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
        <div class="col-sm-10">
          <input type="text" value="{{ $user->profile->twitter ?? '' }}"
             class="form-control" name="twitter" id="twitter" placeholder="Twitter Link">
        </div>
      </div>
      
        <div class="form-group row">
        <label for="github" class="col-sm-2 col-form-label">GitHub</label>
        <div class="col-sm-10">
          <input type="text" value="{{ $user->profile->github ?? '' }}"
           class="form-control" name="github" id="github" placeholder="GitHub Link">
        </div>
      </div>
       <div class="form-group row" >
        <label for="user_id" class="col-sm-2 col-form-label">User ID</label>
        <div class="col-sm-10">
          <input type="text" value="{{ $user->id }}"
           class="form-control" name="user_id" id="user_id" placeholder="User id">
        </div>
      </div>
      <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
          <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm">Update</button>
        </div>
      </div>
    </form>
  </div>

</div>
</div>
</div>
  {{ $posts->links() }}
</div>
</div>
</div>
</section>
@endsection