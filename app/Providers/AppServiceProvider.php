<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
Use Schema; 
class AppServiceProvider extends ServiceProvider
{
    
public function boot() { 

 Schema::defaultStringLength(191); 

 }
}
