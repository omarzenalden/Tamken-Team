<?php

namespace App\Repositories;

//use app\Repositories\TicketRepositoryinterface;
//use Illuminate\Support\Facades\Auth;
//use PHPUnit\Framework\Attributes\Ticket;
use App\Models\Ticketing;
use DB;
class TicketRepository implements TicketRepositoryInterface
{
    public function getAllticket()
    {
        $Tickets = Ticketing::query()
            ->select()
            ->paginate(3);
        $Tickets ? $message = 'getting all Tickets successfully' : $message = 'not found';

        return [
            'Tickets' => $Tickets,
            'message' => $message,
        ];
    }

    public function find($id)
    {

        $Tickets = Ticketing::find($id);
        $Tickets ? $message = 'getting tickets successfully' : $message = 'not found';
        return [
            'product' => $Tickets,
            'message' => $message,
        ];
    }
    public function create( $data)
    {
        if (Auth::user()->hasRole('admin')) {
        DB::beginTransaction();

        $Ticket = Ticketing::create($data);
        $message = 'ticket created successfully';
            }else{
                $Ticket = null;
                $message = 'you do not have access';
            }
        return [
            'Ticket' => $Ticket,
            'message' => $message,
        ];
        DB::commit();

    }

    public function update( $id,  $data)
    {
        $Ticket = Ticketing::find($id);

        if ($Ticket) {
            if (Auth::user()->hasRole()){
            $Ticket->update($data);
            $message = 'Ticket updated successfully';
            }else{
                $Ticket = null;
                $message = 'you do not have access';
            }
        } else {
            $message = 'not found';
        }
        return [
            'Ticket' => $Ticket,
            'message' => $message,
        ];
    }

    public function delete($id)
    {
        $Ticket = Ticketing::find($id);
        if ($Ticket) {
            if (Auth::user()->hasRole()){
            $Ticket->delete();
            $message = 'Ticket deleted successfully';
            }else{
                $Ticket = null;
                $message = 'you do not have access';
            }
        } else {
            $message = 'not found';
        }
        return [
            'Ticket' => $Ticket,
            'message' => $message,
        ];
    }

    public function getbyassignuser($id)
    {
        $ticket= Ticketing::where('assignuser',$id)->get();
        $ticket ? $message = 'getting tickets by assignuser '. $id .'successfully' : $message = 'not found';
        return [
            'ticket' => $ticket,
            'message' => $message
        ];
    }
    public function search($query)
    {
        $tickets = Ticketing::where('name', 'like', "%{$query}%")->get();
        $tickets ? $message = 'getting tickets' : $message = 'there is no result';
        return [
            'tickets' => $tickets,
            'message' => $message
        ];
    }

}
