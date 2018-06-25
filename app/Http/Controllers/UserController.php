<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\User;
use App\Comments;
use App\Ticket;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $email = $request['email'];
        $password = $request['password'];
        if (Auth::attempt(['email' => $email, 'password' => $password], true)) {
            $user = Auth::User();
            return redirect()->route('dashboard');
        }
        return redirect()->back();
    }

    public function registration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|max:255',
            'name' => 'required|max:255',
            'password' => 'required|min:4|confirmed',

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $user = new User();
        $user->email = $request['email'];
        $user->name = $request['name'];
        $user->password = bcrypt($request['password']);

        $user->save();
        Auth::login($user);
        $user = Auth::User();
        return view('dashboard', ['user' => $user]);

    }

    public function dashboard()
    {
        $comments = Comments::all();
        $user = Auth::User();
        $tickets = Ticket::all();
        return view('dashboard', ['user' => $user, 'tickets' => $tickets, 'comments' => $comments]);
    }

    public function createTicket()
    {
        $users = User::all();
        $user = Auth::User();
        return view('ticket', ['user' => $user, 'users' => $users]);
    }
    public function inbox()
    {
        $data = Array();
        $data['comments'] = Comments::all();
        $data['users'] = User::all();
        $data['user'] = Auth::User();
        $id =  Auth::User()->id;
        $tickets = new Ticket();
        $data['ticket']= $tickets->findUserTicket($id);

        return view('inbox', $data);
    }

    public function newTicket(Request $request)
    {

        $ticket = new Ticket();
        $ticket->name = $request['name'];
        $ticket->performer = $request['performer'];
        $ticket->description = $request['description'];
        $ticket->date = $request['date'];
        $ticket->role = $request['level'];
        $ticket->userId = $request['userId'];
        $ticket->save();
        return redirect()->route('dashboard');
    }

    public function addComment(Request $request)
    {

        $comments = new Comments();
        $comments->comment = $request['comment'];
        $comments->user_name = Auth::User()->name;
        $comments->ticket_id = $request['ticketId'];
        $comments->save();
        return redirect()->route('dashboard');
    }


}
