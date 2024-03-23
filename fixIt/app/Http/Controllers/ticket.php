<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tickets;
use App\Models\replys;
use Inertia\Inertia;
use App\Http\Resources\ticketResource;
use App\Http\Resources\replyResource;
use App\Http\Resources\allUsers;
use App\Models\User;

class ticket extends Controller
{

    public function index($id)
    {



        return Inertia::render('solveTicket', [

            "ticketInfo" => new ticketResource(tickets::findOrFail($id)),
            "replys" => replyResource::collection(replys::where('tickets_id', $id)->get()),
            "Users" => allUsers::collection(User::all())
        ]);
    }

    public function store(Request $request)
    {
        $newreply = new replys;
        $newreply->body = $request->data['reply'];
        $newreply->tickets_id = $request->data['ticketId'];
        $newreply->replyName = 'Alex G.';
        $newreply->save();

        return $newreply;
    }


    public function update(Request $request, $id)
    {

        $ticket = tickets::where('id', $id)->get();

        foreach ($ticket as $tickets) {

            $tickets->update(
                [
                    'status' => $request->data['status'],
                    'priorty' => $request->data['priority'],
                    'assigned' => $request->data['assgined']
                ]
            );

            $tickets->save();
        }
    }


    public function destroy($id)
    {
        $tickets = tickets::where('id', $id)->delete();

        return $tickets;
    }
}
