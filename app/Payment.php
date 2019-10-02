<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class);
    }   

    public function another_reservation()
    {
        return $this->belongsToMany(AnotherReservation::class);
    }

    // public function users_filter()
    // {
    //     return $this->hasMany(User::class)->where('usertype', 'User')->where('is_paid', 'Paid')->where('is_return', 'Return');
    // }   
}
