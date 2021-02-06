@extends('frontend.layouts.app')

@section('title','Menu')

@section('content')

<header>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('https://images.unsplash.com/photo-1514580426463-fd77dc4d0672?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=630&q=80')">
          <div class="carousel-caption d-none d-md-block">
            <div class="text-center mb-5">
                <hr width="10%" class="main-color-background line " >
                
                  <h1 class="font-weight-bold text-uppercase">Our Jobs</h1>
                  <form method="GET" action="">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                          <div class="input-group custom-search-form">  
                              <input type="text" name="search" class="form-control form-control-lg bg-light" placeholder="Type to search for jobs..">
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
  
  <!-- Page Content -->
  <section class="py-5">
    <div class="container">
        <div class=" col-md-12 menucard">
            <div class="card shadow mb-4">
                <div class="card-body">
                <div class="row pt-2">
                            <div class="col-md-6">
                                @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('status') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div> 
                        <div class="row mb-1">
                      
                          @if($job->count()==0)
                          <h5 class="font-weight-light text-center pl-5">No result found...</h1>
                          @endif
                          @foreach($job as $items)
                            <div class="col-md-3 mt-4">
                                <div class="card card-cascade wider"></div>
                                <!-- Card image -->
                                  <div class="view view-cascade overlay">
                                    <img class="card-img-top" src="https://images.unsplash.com/photo-1573495628366-64d875afdf1e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" alt="Card image cap">
                                    <a href="#!">
                                      <div class="mask rgba-white-slight"></div>
                                    </a>
                                  </div>
                          
                                <!-- Card content -->
                                  <div class="card-body card-body-cascade text-center pb-0 btn-light">
                                    <!-- Title -->
                                    <h4 class="card-title"><strong>{{$items->item_name}}</strong></h4>
                                    <!-- Subtitle -->
                                    <h6 class="pb-2"><strong>{{$items->title}}</strong></h6>
                                    <h6 class="text-info pb-2"><strong>Full Time </strong></h6>
                                    <h6 class="card-text"> RadiusInfosys Pvt. Ltd  </h6>
                                    <!-- Text -->
                                    <hr class="bg-dark">
                                    <div class="row justify-content-center">
                                          <span data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                            <button type="button"  class="btn main-color-background mb-3"  
                                             data-toggle="modal" data-target="#cartModal-{{$items->id}}" value="{{$items->id}}"><i class="fas fa-cart-arrow-down"></i> Apply </button>
                                          </span>
                                      </div>
                                    </div>
                                  </div>
                          @endforeach  
                        </div>
                      </div>
            
            </div>
        </div>
    </div>
  </section>
@endsection