<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function videoke()
    {
        return $this->belongsTO(Videoke::class);
    }

    public function account()
    {
        return $this->hasOne(Account::class);
    }

    public function total_sales()
    {
        return User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->where('users.is_paid', 'Paid')
            ->sum('videokes.price');
    }

    public function total_customers()
    {
        return User::where('is_paid', 'Paid')->count();
    }

    public function august()
    {
        return User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->whereMonth('users.created_at', '8')
            ->sum('videokes.price');
    }

    public function september()
    {
        return User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->whereMonth('users.created_at', '9')
            ->sum('videokes.price');
    }

    public function october()
    {
        return User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->whereMonth('users.created_at', '10')
            ->sum('videokes.price');
    }

    public function november()
    {
        return User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->whereMonth('users.created_at', '11')
            ->sum('videokes.price');
    }

    public function december()
    {
        return User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->whereMonth('users.created_at', '12')
            ->sum('videokes.price');
    }

    public function january()
    {
        return User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->whereMonth('users.created_at', '1')
            ->sum('videokes.price');
    }

    public function february()
    {
        return User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->whereMonth('users.created_at', '2')
            ->sum('videokes.price');
    }

    public function march()
    {
        return User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->whereMonth('users.created_at', '3')
            ->sum('videokes.price');
    }

    public function april()
    {
        return User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->whereMonth('users.created_at', '4')
            ->sum('videokes.price');
    }

    public function may()
    {
        return User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->whereMonth('users.created_at', '5')
            ->sum('videokes.price');
    }

    public function june()
    {
        return User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->whereMonth('users.created_at', '6')
            ->sum('videokes.price');
    }

    public function july()
    {
        return User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->whereMonth('users.created_at', '7')
            ->sum('videokes.price');
    }

    protected $dates = ['checked_in_at'];

    public function setChecked_in_atAttribute($cia)
    {
        $this->attributes['checked_in_at'] = Carbon::parse($cia);
    }

    // protected $dates = ['checked_in_at', 'return_at'];

    // public function setReturn_atAttribute($ra)
    // {
    //     $this->attributes['return_at'] = Carbon::parse($ra);
    // }

    public function path()
    {
        return url('/admin/customers/' . $this->id . '/access');
    }

    public function path_courier()
    {
        return url('/courier/customers/' . $this->id . '/access');
    }

    public function date_return()
    {
        $checked_in_at = $this->checked_in_at;
        $date_return = $this->videoke->number;  
        
        $date = date_create($checked_in_at);

        date_add($date,date_interval_create_from_date_string($date_return));
        return date_format($date,"F d, Y g:i A");
    }

    public function date_return_notification()
    {
        $checked_in_at = $this->checked_in_at;
        $date_return = $this->videoke->number;  
        
        $date = date_create($checked_in_at);

        date_add($date,date_interval_create_from_date_string($date_return));
        return date_format($date,"F d, Y");
    }
}