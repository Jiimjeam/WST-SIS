@extends('layouts.dashboardlayout')  

@section('title', 'Dashboard')  

@section('dashboard')  
                <!-- End Navbar -->
 <div class="container-fluid">
      <div class="page-header min-height-250 border-radius-lg mt-4 d-flex flex-column justify-content-end">
        <span class="mask bg-primary opacity-9"></span>
        <div class="w-100 position-relative p-3">
          <div class="d-flex justify-content-between align-items-end">
            <div class="d-flex align-items-center">
              <div class="avatar avatar-xl position-relative me-3">
                <img src="../assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
              </div>
              <div>
                <h5 class="mb-1 text-white font-weight-bolder">
                  {{Auth::user()->name}}
                </h5>
                <p class="mb-0 text-white text-md">
                {{Auth::user()->role}}
                </p>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
@endsection

 
 
 
 