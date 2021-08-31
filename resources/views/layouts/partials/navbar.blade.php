<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      @if (Auth::check())
        <a class="navbar-brand" href="/dashboard/admin">Daily Blog</a>
      @else 
        <a class="navbar-brand" href="/">Daily Blog</a>
      @endif
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav ml-auto">
         <li class="nav-item ">
            <a class="nav-link" href="/">Home</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="javascript:void(0);">Contact</a>
         </li>
        
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Register</a>
         </li>
         @guest
         @if (Route::has('login'))
         <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-users text-white"></i></a>
         </li>
         @endif
         
         
         @endguest
      </ul>
      {{-- search form here --}}
   </div>
</nav>
