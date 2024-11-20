<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticketing extends Model
{ protected $fillable=['ticket_name','description','status','user_id','assign_user_id','dead_line'];
    use HasFactory;
    public function users(){
        return   $this->belongsTo(user::class);
    }
}
