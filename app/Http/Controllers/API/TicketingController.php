<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Responses\Response;
use Illuminate\Http\Request;
use App\Models\Ticketing;
use App\Http\Requests\TicketRequest;
use App\Repositories\TicketRepositoryInterface;
use App\Repositories\TicketRepository;
class TicketingController extends Controller
{
    protected $TicketRepository;

    public function __construct(TicketRepositoryInterface $TicketRepository)
    {
        $this->TicketRepository = $TicketRepository;
    }
    public function index(){
        $data = [];
        try{
           $data = $this->TicketRepository->getAllticket();
           return Response::Success($data['Tickets'],$data['message']);
        }catch(\Exception $e){
           $message = $e->getMessage();
           return Response::Error($data,$message);
        }
    }
 public function create(TicketRequest $request)
 {
    $data = [];
    try{
        $data = $this->TicketRepository->create($request->validated());
        return Response::Success($data['Ticket'],$data['message']);
    }catch(\Exception $e){
        $message = $e->getMessage();
        return Response::Error($data,$message);
    }
    }
 public function update(TicketRequest $request,$id){
    $data = [];
    try{
        $data = $this->TicketRepository->update($id,$request->validated());
        return Response::Success($data['Ticket'],$data['message']);
    }catch(Exception $e){
        $message = $e->getMessage();
        return Response::Error($data,$message);
    }
}
 public function delete($id){
    $data = [];
    try{
        $data = $this->TicketRepository->delete($id);
        return Response::Success($data['Ticket'],$data['message']);
    }catch(\Exception $e){
        $message = $e->getMessage();
        return Response::Error($data,$message);
    }
}
 public function show($id){
    try{
    $ticket=Ticketing::find($id);
    if (!$ticket) {
        return response()->json([
            "message" => 'Ticket not found',
            "success" => false
        ], 404);
    }
    $ticket->get();
    return response()->json([
        // "message"=>'number ticket   '. $ticket->id,
        "message"=>'number ticket  '. $ticket->id,
        "success"=>true,
        "data"=>$ticket],200);
    }catch(\Exception $e){
        return response()->json([
            "message" => 'Failed to retrieve tickets',
            "success" => false,
            "error" => $e->getMessage()
        ], 500);
    }
}
public function search(Request $request){
    $query = $request->input('query');
        $data = [];
        try{
            $data = $this->TicketRepository->search($query);
            return Response::Success($data['Tickets'],$data['message']);
        }catch(Exception $e){
            $message = $e->getMessage();
            return Response::Error($data,$message);
        }

}
public function getbyassignuser($id){
    $data = [];
    try{
        $data = $this->TicketRepository->getbyassignuser($id);
        return Response::Success($data['Tickets'],$data['message']);
    }catch(Exception $e){
        $message = $e->getMessage();
        return Response::Error($data,$message);
    }

}
}
