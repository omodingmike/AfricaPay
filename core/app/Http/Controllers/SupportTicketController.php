<?php

namespace App\Http\Controllers;

use App\SupportTicket;
use App\TicketComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SupportTicketController extends Controller
{
    public function ticketIndex()
    {
        $all_ticket = SupportTicket::where('user_id', Auth::user()->id)
            ->orderBy('id', 'desc')->paginate(15);
        $pt = "Support Tickets";
        return view(activeTemp().'user.support.support' , compact('all_ticket','pt'));
    }

    public function ticketCreate()
    {
        $pt = "Create New Ticket";
        return view(activeTemp().'user.support.add_ticket',compact('pt'));
    }

    public function ticketStore(Request $request)
    {
        $this->validate($request, [
            'subject' =>'required',
            'detail' => 'required'
        ]);

        $a = strtoupper(md5(uniqid(rand(), true)));

        $ticket = SupportTicket::create([
            'subject' => $request->subject,
            'ticket' => substr($a, 0, 8),
            'user_id' => Auth::user()->id,
            'status' => 1,
        ]);

        TicketComment::create([
            'ticket_id' => $ticket->ticket,
            'type' => 1,
            'comment' => $request->detail,
        ]);

        Session::flash('message', 'Successfully Created Ticket');

        return redirect()->route('ticket.customer.reply',$ticket->ticket);


    }

    public function ticketReply($ticket)
    {
        $ticket_object = SupportTicket::where('user_id', Auth::user()->id)
            ->where('ticket', $ticket)->first();
        $ticket_data = TicketComment::where('ticket_id', $ticket)->get();
        $pt = "Reply Ticket";

        if ($ticket_object  == ''){
            return redirect('/');
        }else{
            return view(activeTemp().'user.support.view_reply', compact('ticket_data', 'ticket_object','pt'));
        }
    }

    public function ticketReplyStore(Request $request, $ticket)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);

        TicketComment::create([
            'ticket_id' => $ticket,
            'type' => 1,
            'comment' => $request->comment,
        ]);

        SupportTicket::where('ticket', $ticket)
            ->update([
                'status' => 3
            ]);

        return redirect()->back()->with('message', 'Message Send Successful');
    }

    public function indexSupport()
    {
        $page_title = "Support Ticket";
        $all_ticket = SupportTicket::orderBy('id', 'desc')->paginate(20);
        return view('admin.support.support', compact('all_ticket', 'page_title'));
    }

    public function adminSupport($ticket)
    {
        $ticket_object = SupportTicket::where('ticket', $ticket)->first();
        $ticket_data = TicketComment::where('ticket_id', $ticket)->get();
        $page_title = "Support Ticket Reply";
        return view('admin.support.view_reply', compact('ticket_object', 'ticket_data', 'page_title'));
    }

    public function adminReply(Request $request, $ticket)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);

        TicketComment::create([
            'ticket_id' => $ticket,
            'type' => 0,
            'comment' => $request->comment,
        ]);

        SupportTicket::where('ticket', $ticket)
            ->update([
                'status' => 2
            ]);

        return redirect()->back()->with('message', 'Message Send Successful');

    }

    public function ticketClose($ticket)
    {
        SupportTicket::where('ticket', $ticket)
            ->update([
                'status' => 9
            ]);
        return redirect()->back()->with('message', 'Conversation closed, But you can start again');
    }
}
