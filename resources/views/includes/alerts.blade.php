@if (Session::has('alert-success'))
    <div class="container">
        <div class="row">
            <p class="alert alert-success">{{ session('alert-success') }}</p>
        </div>
    </div>
@endif 

@if (Session::has('alert-warning'))
    <div class="container">
        <div class="row">
            <p class="alert alert-warning">{{ session('alert-warning') }}</p>
        </div>
    </div>
@endif 

@if (Session::has('alert-danger'))
    <div class="container">
        <div class="row">
            <p class="alert alert-danger">{{ session('alert-danger') }}</p>
        </div>
    </div>
@endif