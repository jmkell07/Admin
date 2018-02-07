@if (Session::has('alert-success'))
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-success"> 
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('alert-success') }}</p>
            </div>
        </div>
    </div>
@endif 

@if (Session::has('alert-warning'))
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-warning"> 
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('alert-warning') }}</p>
             </div>
        </div>
    </div>
@endif 

@if (Session::has('alert-danger'))
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-danger"> 
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('alert-danger') }}</p>
            </div>
        </div>
    </div>
@endif