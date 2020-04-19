@if ($errors->any())
        <div class="alert alert-danger my-2 col-md-8 text-center">
        @foreach ($errors->all() as $error)
           <p class="my-2">{{ $error }}</p>
        @endforeach
        </div>
@endif

@if (session('success'))
    <div class="alert alert-success my-2 col-md-8 text-center">
           <p class="my-2">{{ session('success') }}</p>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger my-2 col-md-8 text-center">
           <p class="my-2">{{ session('error') }}</p>
    </div>
@endif
