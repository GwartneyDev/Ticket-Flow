<?php

namespace App\Http\Controllers;


use App\Models\qeue;
use Inertia\Inertia;
use App\Http\Resources\qeueListResource;


class ticketList extends Controller
{

    public function index($id)
    {


        return Inertia::render('ticket', [
            'allTicketInfo' => $this->getAllTicketDataByQeue($id)->items(),
            'qeue' => qeueListResource::collection(qeue::all()),
            'Ticket' => $this->GetQeueCounts(),
            'paginator' => $this->getAllTicketDataByQeue($id)
        ]);
    }
}
