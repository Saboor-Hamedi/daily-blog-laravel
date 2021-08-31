{{-- success --}}
@if (session()->has('success'))
 <div class="alert alert-success" id="message" role="alert">
	{{ session('success') }}
 
 </div>
@endif
{{-- error --}}

@if (session()->has('error'))
 <div class="alert alert-danger" id="message" role="alert">
	{{ session('error') }}
      </div>
@endif


