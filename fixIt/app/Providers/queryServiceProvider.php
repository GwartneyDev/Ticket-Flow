<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\qeue;
use App\Models\tickets;

class queryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        public function GetQeueCounts(){
            $getIds = qeue::where('id' ,'>' ,0)->pluck('id');
            $arr= [];
    
             foreach($getIds as $id){
    
                $ticketCount = tickets::where('qeue_id', $id)->get()->count();
                array_push($arr,$ticketCount);
             }
    
             return $arr;
         }
    }
}
