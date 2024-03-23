<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\qeue;
use App\Models\tickets;
use App\Models\User;
use App\Http\Resources\qeueListResource;

use Inertia\Inertia;

class qeueList extends Controller
{

    public function index()
    {
        return Inertia::render('index', [
            'qeue' =>  qeueListResource::collection(qeue::all()),
            'Ticket' => $this->GetQeueCounts(),
            'allTicketInfo' => $this->getAllTicketData()->items(),
            'paginator' => $this->getAllTicketData()
        ]);
    }

    public function store(Request $request)
    {
        $newQeue = new qeue;
        $newQeue->qeue = $request->item;
        $newQeue->save();

        return $newQeue;
    }

    public function show(Request $request)
    {
        //Use the get request to search for tickets based on user search

        $ticketCount = tickets::where('id', $request->get('q'));

        return Inertia::render('index', [
            'allTicketInfo' =>  $ticketCount->get(),
            'qeue' => qeue::all(),
            'Ticket' => $this->GetQeueCounts(),
        ]);
    }
}
