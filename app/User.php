<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class User extends Authenticatable implements MustVerifyEmail
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
        return $this->belongsTo(Videoke::class);
    }

    public function videoke_return()
    {
        return $this->hasOne(VideokeReturn::class);
    }

    public function account()
    {
        return $this->hasOne(Account::class);
    }

    public function another_reservation()
    {
        return $this->hasMany(AnotherReservation::class);
    }

    public function total_sales()
    {
        return User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->where('users.usertype', 'User')
            ->whereIn('users.is_paid', ['Paid', 'Half Payment'])
            ->sum('videokes.price');
    }

    public function total_customers()
    {
        return User::where([['is_paid', '<>', 'Paying'], ['usertype', 'User']])->count();
    }

    public function total_transaction()
    {
        return User::where([['is_paid', 'Paid'], ['usertype', 'User']])->count();
    }

    public function total_videoke()
    {
        return VideokeTotal::count();
    }

    public function august()
    {
        return User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '8')
            ->sum('videokes.price');
    }

    public function september()
    {
        return User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '9')
            ->sum('videokes.price');
    }

    public function october()
    {
        return User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '10')
            ->sum('videokes.price');
    }

    public function november()
    {
        return User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '11')
            ->sum('videokes.price');
    }

    public function december()
    {
        return User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '12')
            ->sum('videokes.price');
    }

    public function january()
    {
        return User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '1')
            ->sum('videokes.price');
    }

    public function february()
    {
        return User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '2')
            ->sum('videokes.price');
    }

    public function march()
    {
        return User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '3')
            ->sum('videokes.price');
    }

    public function april()
    {
        return User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '4')
            ->sum('videokes.price');
    }

    public function may()
    {
        return User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '5')
            ->sum('videokes.price');
    }

    public function june()
    {
        return User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '6')
            ->sum('videokes.price');
    }

    public function july()
    {
        return User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '7')
            ->sum('videokes.price');
    }

    protected $dates = ['checked_in_at', 'return_at'];

    public function setChecked_in_atAttribute($cia)
    {
        $this->attributes['checked_in_at'] = Carbon::parse($cia);
    }
    
    public function setReturn_atAttribute($ra)
    {
        $this->attributes['return_at'] = Carbon::parse($ra);
    }

    public function path()
    {
        return url('/admin/customers/' . $this->id . '/access');
    }

    public function path_courier()
    {
        return url('/courier/customers/' . $this->id . '/access');
    }

    public function check_format()
    {
        return $this->checked_in_at->format('F d, Y (D) - g:i A');
    }

    // public function reserve_format()
    // {
    //     return $this->checked_in_at->format('F d, Y (D) - g:i A');
    // }

    public function return_at_issued()
    {
        $return_date = $this->updated_at;
        return Carbon::createFromFormat('Y-m-d H:i:s', $return_date, 'UTC')
            ->setTimezone('Asia/Manila')
            ->format('F d, Y' . ' (' . 'D' . ') - g:i A');
    }

    public function qr_code_issued()
    {
        $update_date = $this->updated_at;
        return Carbon::createFromFormat('Y-m-d H:i:s', $update_date, 'UTC')
            ->setTimezone('Asia/Manila')
            ->format('F d, Y' . ' (' . 'D' . ') - g:i A');
    }

    public function date_return()
    {
        $checked_in_at = $this->checked_in_at;
        $date_return = $this->videoke->number;
        
        $date = date_create($checked_in_at);

        date_add($date,date_interval_create_from_date_string($date_return));
        return date_format($date,"F d, Y' . ' (' . 'D' . ') - g:i A");
    }

    public function date_return_format()
    {
        $checked_in_at = $this->checked_in_at;
        $date_return = $this->videoke->number;
        
        $date = date_create($checked_in_at);

        date_add($date,date_interval_create_from_date_string($date_return));
        return date_format($date,"F d, Y (D) - g:i A");
    }

    public function date_return_notification()
    {
        $checked_in_at = $this->checked_in_at;
        $date_return = $this->videoke->number;  
        
        $date = date_create($checked_in_at);

        date_add($date,date_interval_create_from_date_string($date_return));
        return date_format($date,"F d, Y");
    }

    public function qr_code()
    {
        return $this->hasOne(QRCode::class);
    }

    public static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->qr_code()->create([
                'qr_password' => Str::random(50),
            ]);
            $user->videoke_return()->create([
                'return_at' => $user->date_return_format(),
            ]);
        });
    }

    // public function qr()
    // {
    //     $qrs = $this->another_reservation;

    //     // dd($qrs);

    //     foreach ($qrs as $qr) {
    //         $qr;
    //     }

    //     return $qr;
    // }
}