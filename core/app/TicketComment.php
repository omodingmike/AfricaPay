<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketComment extends Model
{
    protected $guarded = ['id'];

    public function ticket()
    {
        return $this->belongsTo(SupportTicket::class);
    }
}
