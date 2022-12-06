
  @include('layouts.top')
        
    @include('layouts.tutores.header')

    <div class="container-fluid">
    <div class="row">
        @include('layouts.tutores.sidenavbar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

            @yield('content')
            
        </main>
    </div>
    </div>

@include('layouts.footer')
@include('layouts.bottom')

     
@include('layouts.style')