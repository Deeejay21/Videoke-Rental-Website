<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AnotherReservation extends Model
{
    protected $guarded = [];

    protected $dates = ['reserved_at', 'return_at', 'qrcode_issued_at', 'videoke_return_issued_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function videoke()
    {
        return $this->belongsTo(Videoke::class);
    }

    public function reserve_format()
    {
        return $this->reserved_at->format('F d, Y (D) - g:i A');
    }
    
    public function reserve_return_format()
    {
        $reserved_at = $this->reserved_at;
        $date_return = $this->videoke->number;
        
        $date = date_create($reserved_at);

        date_add($date,date_interval_create_from_date_string($date_return));
        return date_format($date,"F d, Y (D) - g:i A");
    }
    
    public function reserve_return_notification_format()
    {
        $reserved_at = $this->reserved_at;
        $date_return = $this->videoke->number;
        
        $date = date_create($reserved_at);

        date_add($date,date_interval_create_from_date_string($date_return));
        return date_format($date,"F d, Y");
    }
    
    public function qrcode_issued_at_format()
    {
        return $this->qrcode_issued_at->format('F d, Y (D) - g:i A');
    }
    
    public function date_return_notification()
    {
        $reserved_at = $this->reserved_at;
        $date_return = $this->videoke->number;  
        
        $date = date_create($reserved_at);

        date_add($date,date_interval_create_from_date_string($date_return));
        return date_format($date,"F d, Y");
    }
    
    public function date_return_format()
    {
        $checked_in_at = $this->checked_in_at;
        $date_return = $this->videoke->number;
        
        $date = date_create($checked_in_at);

        date_add($date,date_interval_create_from_date_string($date_return));
        return date_format($date,"F d, Y (D) - g:i A");
    }
    
    public function check_format()
    {
        return $this->user->checked_in_at->format('F d, Y (D) - g:i A');
    }
    
    public function another_qrcode_issued_at_format()
    {
        return $this->qrcode_issued_at->format('F d, Y (D) - g:i A');
    }
    
    public function videoke_return_issued_at_format()
    {
        return $this->videoke_return_issued_at->format('F d, Y (D) - g:i A');
    }

    // public function getReservedAtAttribute($date)
    // {
    //     return $this->attributes['reserved_at'] = Carbon::parse($date)->create('F d, Y (D) - g:i A', 'America/Toronto');
    // }
}
