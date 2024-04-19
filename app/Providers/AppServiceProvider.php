<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use App\Models\Users;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        // if(Schema::hasTable('general_settings')){
        //     $siteInfo = DB::table('general_settings')->first();
        // }
        
        
        // if(Schema::hasTable('social_links')){
        //     $social = DB::table('social_links')->get();
        // }

        // view()->share(['siteInfo'=> $siteInfo,'social'=>$social]);
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
