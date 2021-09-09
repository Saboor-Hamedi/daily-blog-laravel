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

        <section class="post-cards">
            <div class="rows">
                @forelse ($posts as $post)
                    <article  class="card-inner-body">
                        <div class="card-inner-body-image">
                            <img src="{{ asset('/storage/postImages/'. $post->image) }}" alt="">
                        </div>
                        
                            <div class="card-inner-title">
                                <h5>{{ $post->title }}</h5>
                            </div>
                         <div class="card-inner-details">
                               @foreach ($post->categories as $cat)
                                <h4>{{ $cat->name }}</h4>
                                 @endforeach
                              {{ strip_tags(Str::limit($post->body_post,100)) }}
                              <a href="{{ route('show', [$post->slug]) }}">Read more</a>
                            <br>
                           <div >
                                 @foreach ($post->tags as $tag)
                                  <small class="badge badge-secondary">{{ $tag->name }}</small>
                                 @endforeach
                           </div>
                            <div>
                                  <small >Author: {{ $post->user->name }}</small>
                                 <small>, {{ $post->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                 </article >
                    @empty
                    <div class="alert alert-info">No post uploaded</div>
                @endforelse
             </div>
                <div class="mt-2 ">
                  {{ $posts->links() }}
                </div>
                 
             
        </section>
      
 @endsection
