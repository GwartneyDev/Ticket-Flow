<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\qeue;
use App\Models\User;
use App\Models\tickets;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function GetQeueCounts()
    {
        $getIds = qeue::where('id', '>', 0)->pluck('id');
        $arr = [];

        foreach ($getIds as $id) {

            $ticketCount = tickets::where('qeue_id', $id)->get()->count();
            array_push($arr, $ticketCount);
        }

        return $arr;
    }

    public function getAllTicketData()
    {
        $tickets = tickets::paginate(20)->through(function ($item) {
            return [
                'id' => $item->id,
                'status' => $item->status,
                'assigned' => $item->assigned,
                'requested' => $item->requested,
                'created_at' => $item->created_at,
                'slug' => $item->slug
            ];
        });

        return $tickets;
    }


    public function getAllTicketDataByQeue($id)
    {
        $tickets = tickets::where('qeue_id', $id)->paginate(20)->through(function ($item) {
            return [
                'id' => $item->id,
                'status' => $item->status,
                'assigned' => $item->assigned,
                'requested' => $item->requested,
                'created_at' => $item->created_at,
                'slug' => $item->slug
            ];
        });

        return $tickets;
    }



    public function getAllUsers()
    {
        $getAllusers = User::all();
        return $getAllusers;
    }
}
