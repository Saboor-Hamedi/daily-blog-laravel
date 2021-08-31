
<x-header />
<x-navbar />
<x-sidebar />
<div class="content-wrapper" >
{{-- header --}}
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
  <div class="contianer">
    @include('message.message')
  </div>
  {{-- top cards --}}
  <x-cards />
  @yield('content')
</div>
</section>
</div>
<x-footer />
