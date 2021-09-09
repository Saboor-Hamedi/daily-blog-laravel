@extends('layouts.app')
@section('content')
    <section class="banner">
        <div class="banner-content">
            <h1 class="titles"><span class="inner-title">Welcome</span> to the daily blog</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Temporibus officiis dolore omnis, inventore dolorum fugiat.</p>
            <div class="buttons">
                <button class="default-button">Contact</button>
            </div>
        </div>
    </section>
    {{-- ============================= --}}
    <div class="show-title">
        <h1>
            Daily Blog
        </h1>
    </div>
    <section class="post-cards">
            <div class="show-rows">
                    <article  class="card-inner-body" >
                        <div class="card-inner-body-image">
                            <img src="{{ asset('/storage/postImages/'. $posts->image) }}" alt="">
                        </div>
                        <div class="card-inner-title" >
                               @foreach ($posts->categories as $cat)
                                    <h5>{{ strtoupper($cat->name) }}</h5>
                                 @endforeach
                            <h4>{{ ucfirst($posts->title) }}</h4>
                        </div>
                         <div class="card-inner-details">
                                {!! $posts->body_post !!}
                            <br>
                           <div >
                                 @foreach ($posts->tags as $tag)
                                  <small class="badge badge-secondary">{{ $tag->name }}</small>
                                 @endforeach
                           </div>
                            <div>
                                <small >Author: {{ $posts->user->name }}</small>
                                <small>, {{ $posts->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v11.0&appId=1737352673142638&autoLogAppEvents=1" nonce="96aSks4g"></script>
            <div class="fb-comments" 
                 data-href="{{ Request::url() }}" 
                 data-width="" data-numposts="2" ></div>
                 </article >
             </div>

        </section>
   
@endsection
