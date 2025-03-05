<?php


// app/Providers/AuthServiceProvider.php
namespace App\Providers;
use App\Models\User;
use App\Models\Student;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
       
    }
}