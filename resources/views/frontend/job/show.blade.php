@extends('frontend.layouts.app')

@section('content')
    @include('backend.users.partials.header', [
        'title' =>auth()->user()->name,
        'description' => __('This is your profile page. You can see the progress you\'ve made with your work and manage your projects or assigned tasks'),
        'class' => 'col-lg-12'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body mt-3 pt-md-8">
                        
                        <div class="text-center">
                            <h3>
                                {{ auth()->user()->name }}<span class="font-weight-light">, 27</span>
                            </h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{ __('Bucharest, Romania') }}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{ __('Solution Manager - Creative Tim Officer') }}
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>{{ __('University of Computer Science') }}
                            </div>
                            <hr class="my-4" />
                            <p>{{ __('Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.') }}</p>
                            <a href="#">{{ __('Show more') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card  shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h3 class="mb-0">{{ __('Job Details') }}</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <button class="btn main-color-background text-white">Apply</button>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />

                    <div class="card-body">
                       <h5 class="font-weight-bold">Job Title</h5>
                       <p>Android Developer</p>
                       <hr class="my-4" />

                       <h5 class="font-weight-bold">Job Categoty</h5>
                       <p>IT/Developer</p>
                       <hr class="my-4" />

                       <h5 class="font-weight-bold">Skills</h5>
                       <ul>
                           <li>sdsd</li>
                           <li>sdsd</li>
                           <li>sdsd</li>
                           <li>sdsd</li>
                           <li>sdsd</li>
                           <li>sdsd</li>

                       </ul>
                        <hr class="my-4" />
                        
                    </div>
                </div>
            </div>
        </div>
        
       
    </div>
@endsection