<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Http\Models\Ticketing;
use App\Models\Ticketing;

class TicketingController extends Controller
{
    public function index(){
            $ticket=Ticketing::all();
           return view('ticket',compact(['ticket']));
     }
     public function create(Request $request){
        return view('create_ticket');
    }
    public function store(Request $request)
{
    $request->validate([
        'ticket_name' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'required|string|in:pending,ongoing,finished',
        'dead_line' => 'required|date',
        'user_id' => 'required|integer',
        'assign_user_id' => 'required|integer',
    ]);

    $ticket = Ticketing::create([
        'ticket_name' => $request->input('ticket_name'),
        'description' => $request->input('description'),
        'status' => $request->input('status'),
        'dead_line' => $request->input('dead_line'),
        'user_id' => $request->input('user_id'),
        'assign_user_id' => $request->input('assign_user_id'),
    ]);

    return redirect()->route('ticket')->with('success', 'Ticket created successfully!');
}


public function page_update($id) {
    $ticket = Ticketing::find($id);
    return view('update_ticket',compact(['ticket']));
}
public function update(Request $request, $id) {
    $ticket = Ticketing::find($id);
    if ($ticket) {
        $ticket->update([
            'ticket_name' => $request->input('ticket_name'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'dead_line' => $request->input('dead_line'),
            'user_id' => $request->input('user_id'),
            'assign_user_id' => $request->input('assign_user_id'),
        ]);
    }
    return redirect()->route('ticket')->with('success', 'Ticket updated successfully!');
}
public function edit($id) {
    $ticket = Ticketing::find($id);
    return view('update_ticket', compact('ticket'));
}

    public function delete($id) {
        Ticketing::find($id)->delete();
        return redirect()->route('ticket')->with('success', 'Ticket deleted successfully!');
     }
}
