@extends('layouts.Adminlayout')  

@section('title', 'Admindashboard')  

@section('Admindashboard')  
                <!-- End Navbar -->
                <div class="container-fluid">
    <div class="page-header min-height-300 border-radius-lg mt-4 position-relative overflow-hidden bg-primary">
        <span class="mask bg-gradient-primary opacity-9"></span>
        <div class="w-100 position-relative p-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                
                <!-- User Profile Section -->
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-xxl position-relative me-4">
                        <img src="../assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                    <div>
                        <h4 class="mb-1 text-white fw-bold">
                            {{ Auth::user()->name }}
                        </h4>
                        <p class="mb-0 text-white text-md">
                            {{ Auth::user()->role }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

 
 
 
 