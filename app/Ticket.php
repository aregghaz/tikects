<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Ticket extends Model
{
    public function findUserTicket($id) {
       return DB::table('tickets')
            ->where('userId', 'like', '%'.$id.'%')
            ->get();
    }
}
