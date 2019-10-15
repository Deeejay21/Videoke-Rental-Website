<?php

namespace App;

use DB;
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

    // public function videoke_return()
    // {
    //     return $this->hasOne(VideokeReturn::class);
    // }

    public function account()
    {
        return $this->hasOne(Account::class);
    }

    public function another_reservation()
    {
        return $this->hasMany(AnotherReservation::class)->orderBy('created_at', 'DESC');
    }

    public function another_return()
    {
        return $this->hasMany(AnotherReturn::class);
    }

    public function total_sales()
    {
        $userHalf = User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->where('users.usertype', 'User')
            ->where('users.is_paid', 'Half Payment')
            ->sum('videokes.price') / 2;

        $userPaid = User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->where('users.usertype', 'User')
            ->where('users.is_paid', 'Paid')
            ->sum('videokes.price');
        
        $anotherReservationHalf = AnotherReservation::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'another_reservations.videoke_id')
            ->where('another_reservations.is_paid', 'Half Payment')
            ->sum('videokes.price') / 2;

        $anotherReservationPaid = AnotherReservation::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'another_reservations.videoke_id')
            ->where('another_reservations.is_paid', 'Paid')
            ->sum('videokes.price');

        return $userHalf + $userPaid + $anotherReservationHalf + $anotherReservationPaid;
    }

    public function total_customers()
    {
        return User::where([['is_paid', '<>', 'Paying'], ['usertype', 'User']])->count();
    }

    public function total_reservation()
    {
        $anotherReservation = AnotherReservation::where([['is_paid', 'Paid'], ['is_return', 'Return']])->count();
        $user = User::where([['is_paid', 'Paid'], ['is_return', 'Return'], ['usertype', 'User']])->count();

        return $anotherReservation + $user;
    }

    public function total_videoke()
    {
        return VideokeTotal::count();
    }

    public function august()
    {
        $userHalf = User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Half Payment')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '8')
            ->sum('videokes.price') / 2;

        $userPaid = User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '8')
            ->sum('videokes.price');

        $userAnotherReservationHalf = AnotherReservation::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'another_reservations.videoke_id')
            ->select('videokes.*', 'another_reservations.*')
            ->where('is_paid', 'Half Payment')
            ->whereMonth('another_reservations.created_at', '8')
            ->sum('videokes.price') / 2;

        $userAnotherReservationPaid = AnotherReservation::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'another_reservations.videoke_id')
            ->select('videokes.*', 'another_reservations.*')
            ->where('is_paid', 'Paid')
            ->whereMonth('another_reservations.created_at', '8')
            ->sum('videokes.price');

        return $userHalf + $userPaid + $userAnotherReservationHalf + $userAnotherReservationPaid;
    }

    public function september()
    {
        $userHalf = User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Half Payment')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '9')
            ->sum('videokes.price') / 2;

        $userPaid = User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '9')
            ->sum('videokes.price');

        $userAnotherReservationHalf = AnotherReservation::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'another_reservations.videoke_id')
            ->select('videokes.*', 'another_reservations.*')
            ->where('is_paid', 'Half Payment')
            ->whereMonth('another_reservations.created_at', '9')
            ->sum('videokes.price') / 2;

        $userAnotherReservationPaid = AnotherReservation::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'another_reservations.videoke_id')
            ->select('videokes.*', 'another_reservations.*')
            ->where('is_paid', 'Paid')
            ->whereMonth('another_reservations.created_at', '9')
            ->sum('videokes.price');

        return $userHalf + $userPaid + $userAnotherReservationHalf + $userAnotherReservationPaid;
    }

    public function october()
    {
        $userHalf = User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Half Payment')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '10')
            ->sum('videokes.price') / 2;

        $userPaid = User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '10')
            ->sum('videokes.price');

        $userAnotherReservationHalf = AnotherReservation::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'another_reservations.videoke_id')
            ->select('videokes.*', 'another_reservations.*')
            ->where('is_paid', 'Half Payment')
            ->whereMonth('another_reservations.created_at', '10')
            ->sum('videokes.price') / 2;

        $userAnotherReservationPaid = AnotherReservation::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'another_reservations.videoke_id')
            ->select('videokes.*', 'another_reservations.*')
            ->where('is_paid', 'Paid')
            ->whereMonth('another_reservations.created_at', '10')
            ->sum('videokes.price');

        return $userHalf + $userPaid + $userAnotherReservationHalf + $userAnotherReservationPaid;
    }

    public function november()
    {
        $userHalf = User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Half Payment')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '11')
            ->sum('videokes.price') / 2;

        $userPaid = User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '11')
            ->sum('videokes.price');

        $userAnotherReservationHalf = AnotherReservation::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'another_reservations.videoke_id')
            ->select('videokes.*', 'another_reservations.*')
            ->where('is_paid', 'Half Payment')
            ->whereMonth('another_reservations.created_at', '11')
            ->sum('videokes.price') / 2;

        $userAnotherReservationPaid = AnotherReservation::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'another_reservations.videoke_id')
            ->select('videokes.*', 'another_reservations.*')
            ->where('is_paid', 'Paid')
            ->whereMonth('another_reservations.created_at', '11')
            ->sum('videokes.price');

        return $userHalf + $userPaid + $userAnotherReservationHalf + $userAnotherReservationPaid;
    }

    public function december()
    {
        $userHalf = User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Half Payment')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '12')
            ->sum('videokes.price') / 2;

        $userPaid = User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '12')
            ->sum('videokes.price');

        $userAnotherReservationHalf = AnotherReservation::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'another_reservations.videoke_id')
            ->select('videokes.*', 'another_reservations.*')
            ->where('is_paid', 'Half Payment')
            ->whereMonth('another_reservations.created_at', '12')
            ->sum('videokes.price') / 2;

        $userAnotherReservationPaid = AnotherReservation::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'another_reservations.videoke_id')
            ->select('videokes.*', 'another_reservations.*')
            ->where('is_paid', 'Paid')
            ->whereMonth('another_reservations.created_at', '12')
            ->sum('videokes.price');

        return $userHalf + $userPaid + $userAnotherReservationHalf + $userAnotherReservationPaid;
    }

    public function january()
    {
        $userHalf = User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Half Payment')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '1')
            ->sum('videokes.price') / 2;

        $userPaid = User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '1')
            ->sum('videokes.price');

        $userAnotherReservationHalf = AnotherReservation::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'another_reservations.videoke_id')
            ->select('videokes.*', 'another_reservations.*')
            ->where('is_paid', 'Half Payment')
            ->whereMonth('another_reservations.created_at', '1')
            ->sum('videokes.price') / 2;

        $userAnotherReservationPaid = AnotherReservation::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'another_reservations.videoke_id')
            ->select('videokes.*', 'another_reservations.*')
            ->where('is_paid', 'Paid')
            ->whereMonth('another_reservations.created_at', '1')
            ->sum('videokes.price');

        return $userHalf + $userPaid + $userAnotherReservationHalf + $userAnotherReservationPaid;
    }

    public function february()
    {
        $userHalf = User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Half Payment')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '2')
            ->sum('videokes.price') / 2;

        $userPaid = User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '2')
            ->sum('videokes.price');

        $userAnotherReservationHalf = AnotherReservation::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'another_reservations.videoke_id')
            ->select('videokes.*', 'another_reservations.*')
            ->where('is_paid', 'Half Payment')
            ->whereMonth('another_reservations.created_at', '2')
            ->sum('videokes.price') / 2;

        $userAnotherReservationPaid = AnotherReservation::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'another_reservations.videoke_id')
            ->select('videokes.*', 'another_reservations.*')
            ->where('is_paid', 'Paid')
            ->whereMonth('another_reservations.created_at', '2')
            ->sum('videokes.price');

        return $userHalf + $userPaid + $userAnotherReservationHalf + $userAnotherReservationPaid;
    }

    public function march()
    {
        $userHalf = User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Half Payment')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '3')
            ->sum('videokes.price') / 2;

        $userPaid = User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '3')
            ->sum('videokes.price');

        $userAnotherReservationHalf = AnotherReservation::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'another_reservations.videoke_id')
            ->select('videokes.*', 'another_reservations.*')
            ->where('is_paid', 'Half Payment')
            ->whereMonth('another_reservations.created_at', '3')
            ->sum('videokes.price') / 2;

        $userAnotherReservationPaid = AnotherReservation::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'another_reservations.videoke_id')
            ->select('videokes.*', 'another_reservations.*')
            ->where('is_paid', 'Paid')
            ->whereMonth('another_reservations.created_at', '3')
            ->sum('videokes.price');

        return $userHalf + $userPaid + $userAnotherReservationHalf + $userAnotherReservationPaid;
    }

    public function april()
    {
        $userHalf = User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Half Payment')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '4')
            ->sum('videokes.price') / 2;

        $userPaid = User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '4')
            ->sum('videokes.price');

        $userAnotherReservationHalf = AnotherReservation::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'another_reservations.videoke_id')
            ->select('videokes.*', 'another_reservations.*')
            ->where('is_paid', 'Half Payment')
            ->whereMonth('another_reservations.created_at', '4')
            ->sum('videokes.price') / 2;

        $userAnotherReservationPaid = AnotherReservation::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'another_reservations.videoke_id')
            ->select('videokes.*', 'another_reservations.*')
            ->where('is_paid', 'Paid')
            ->whereMonth('another_reservations.created_at', '4')
            ->sum('videokes.price');

        return $userHalf + $userPaid + $userAnotherReservationHalf + $userAnotherReservationPaid;
    }

    public function may()
    {
        $userHalf = User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Half Payment')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '5')
            ->sum('videokes.price') / 2;

        $userPaid = User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '5')
            ->sum('videokes.price');

        $userAnotherReservationHalf = AnotherReservation::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'another_reservations.videoke_id')
            ->select('videokes.*', 'another_reservations.*')
            ->where('is_paid', 'Half Payment')
            ->whereMonth('another_reservations.created_at', '5')
            ->sum('videokes.price') / 2;

        $userAnotherReservationPaid = AnotherReservation::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'another_reservations.videoke_id')
            ->select('videokes.*', 'another_reservations.*')
            ->where('is_paid', 'Paid')
            ->whereMonth('another_reservations.created_at', '5')
            ->sum('videokes.price');

        return $userHalf + $userPaid + $userAnotherReservationHalf + $userAnotherReservationPaid;
    }

    public function june()
    {
        $userHalf = User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Half Payment')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '6')
            ->sum('videokes.price') / 2;

        $userPaid = User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '6')
            ->sum('videokes.price');

        $userAnotherReservationHalf = AnotherReservation::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'another_reservations.videoke_id')
            ->select('videokes.*', 'another_reservations.*')
            ->where('is_paid', 'Half Payment')
            ->whereMonth('another_reservations.created_at', '6')
            ->sum('videokes.price') / 2;

        $userAnotherReservationPaid = AnotherReservation::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'another_reservations.videoke_id')
            ->select('videokes.*', 'another_reservations.*')
            ->where('is_paid', 'Paid')
            ->whereMonth('another_reservations.created_at', '6')
            ->sum('videokes.price');

        return $userHalf + $userPaid + $userAnotherReservationHalf + $userAnotherReservationPaid;
    }

    public function july()
    {
        $userHalf = User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Half Payment')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '7')
            ->sum('videokes.price') / 2;

        $userPaid = User::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'users.videoke_id')
            ->select('videokes.*', 'users.*')
            ->where('is_paid', 'Paid')
            ->where('users.usertype', 'User')
            ->whereMonth('users.created_at', '7')
            ->sum('videokes.price');

        $userAnotherReservationHalf = AnotherReservation::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'another_reservations.videoke_id')
            ->select('videokes.*', 'another_reservations.*')
            ->where('is_paid', 'Half Payment')
            ->whereMonth('another_reservations.created_at', '7')
            ->sum('videokes.price') / 2;

        $userAnotherReservationPaid = AnotherReservation::with('videoke')
            ->join('videokes', 'videokes.id', '=', 'another_reservations.videoke_id')
            ->select('videokes.*', 'another_reservations.*')
            ->where('is_paid', 'Paid')
            ->whereMonth('another_reservations.created_at', '7')
            ->sum('videokes.price');

        return $userHalf + $userPaid + $userAnotherReservationHalf + $userAnotherReservationPaid;
    }

    protected $dates = ['checked_in_at', 'return_at', 'reserved_at', 'qrcode_issued_at', 'videoke_return_issued_at'];

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

    public function reserve_format()
    {
        return $this->reserved_at->format('F d, Y (D) - g:i A');
    }

    public function qrcode_issued_at_format()
    {
        return $this->qrcode_issued_at->format('F d, Y (D) - g:i A');
    }

    public function videoke_return_issued_at_format()
    {
        return $this->videoke_return_issued_at->format('F d, Y (D) - g:i A');
    }

    public function another_qrcode_issued_at_format()
    {
        return $this->qrcode_issued_at->format('F d, Y (D) - g:i A');
    }

    public function another_videoke_return_issued_at_format()
    {
        return $this->videoke_return_issued_at->format('F d, Y (D) - g:i A');
    }

    // public function another_qrcode_issued_at_format()
    // {
    //     return $this->qrcode_issued_at->format('F d, Y (D) - g:i A');
    // }

    // public function another_videoke_return_issued_at_format()
    // {
    //     return $this->videoke_return_issued_at->format('F d, Y (D) - g:i A');
    // }
    
    public function reserve_return_format()
    {
        $reserved_at = $this->reserved_at;
        $date_return = $this->videoke->number;
        
        $date = date_create($reserved_at);

        date_add($date,date_interval_create_from_date_string($date_return));
        return date_format($date,"F d, Y (D) - g:i A");
    }

    // public function return_at_issued()
    // {
    //     $return_date = $this->videoke_return->updated_at;
    //     return Carbon::createFromFormat('Y-m-d H:i:s', $return_date, 'UTC')
    //         ->setTimezone('Asia/Manila')
    //         ->format('F d, Y' . ' (' . 'D' . ') - g:i A');
    // }

    public function qr_code_issued()
    {
        $update_date = $this->updated_at;
        return Carbon::createFromFormat('Y-m-d H:i:s', $update_date, 'UTC')
            ->setTimezone('Asia/Manila')
            ->format('F d, Y' . ' (' . 'D' . ') - g:i A');
    }

    public function date_return_register()
    {
        $checked_in_at = $this->checked_in_at;
        $date_return = $this->videoke->number;
        
        $date = date_create($checked_in_at);

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
        });
    }

    public function halfNotification()
    {
        $currentTime = $this->currentDate();

        // dd($currentTime);

        // $deliverUser = User::where([['usertype', 'User'], ['is_paid', 'Half Payment'], ['is_return', 'Operating']])->orderBy('created_at', 'DESC')->get(); // ASC dapat kapag sa time ng delivery customer
        $deliverUser = User::where([['usertype', 'User'], ['is_paid', 'Half Payment'], ['is_return', 'Operating']])->orderBy('checked_in_at', 'DESC')->get();
        
        if ($deliverUser->count() == 0) {
                return null;
        } else {
        foreach ($deliverUser as $deliver) {
            $deliver;
        }

    }

        return ($deliver->checked_in_at->format('F d, Y')) == $currentTime->format('F d, Y') ? $deliver->checked_in_at->format('F d, Y') == $currentTime->format('F d, Y') : false;
    }

    public function paidNotification()
    {
        $currentTime = $this->currentDate();

        $deliverUser = User::where([['usertype', 'User'], ['is_paid', 'Paid'], ['is_return', 'Operating']])->orderby('checked_in_at', 'DESC')->get();
        
        if ($deliverUser->count() == 0) {
                return null;
        } else {
        foreach ($deliverUser as $deliver) {
            $deliver;
        }
    }

        return ($deliver->date_return_notification() == $currentTime->format('F d, Y')) ? $deliver->date_return_notification() == $currentTime->format('F d, Y') : false;
    }

    public function currentDate()
    {
        return Carbon::now('Asia/Manila')->addDays(1);
    }
}
