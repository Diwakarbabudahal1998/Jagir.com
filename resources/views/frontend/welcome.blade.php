@extends('frontend.layouts.app')
@section('content')

@if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
<header class="masthead">
        <div class="back">
        <div class="container h-100">
          <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
              <h1 class="font-weight-light text-light">WELCOME TO JAGIR.COM</h1>
              <p class="lead text-light mb-3">Know Your Worth</p>
              <form method="POST" action="{{route('salary.predict')}}">
              @csrf
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                          <div class="input-group custom-search-form">
                              <input type="text" name="job" class="form-control form-control-lg bg-light" placeholder="Position">
                              <input type="text" name="experience" class="form-control form-control-lg bg-light ml-2" placeholder="Experience">
                            <button class="btn main-color-background btn-lg ml-2"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                    </div>
                  </form>
            </div>
          </div>
        </div>
      </div>
</header>
@include('frontend.layouts.partials.aboutus')

<section class="about py-5 mt-4 text-light">
    <div class="container card1">
        <div class="row mb-1">
        @foreach($job as $jobs)
            <div class="col-md-3">
                <div class="card card-cascade wider">
                </div>
                <div class="view view-cascade overlay">
                    <img class="card-img-top" src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1052&q=80" alt="Card image cap">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                <div class="card-body card-body-cascade text-center pb-0 btn-light">
                    <h4 class="card-title"><strong>{{$jobs->title}}</strong></h4>
                    <h6 class="text-info pb-2"><strong>Full Time </strong></h6>
                    <h6 class="card-text"> RadiusInfosys Pvt. Ltd  </h6>
                    <button type="button" class="btn btn-outline-success mb-2">Apply</button>
                </div>
            </div>
         @endforeach
          </div>
        </div>
      </div>
</section>

@include('frontend.layouts.partials.location')
@endsection
