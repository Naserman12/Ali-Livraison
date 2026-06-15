<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Permission\Traits\HasRoles;

#[Fillable(['name','phone', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable,  HasApiTokens, HasRoles;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

    // Customer Orders
public function customerOrders() : hasMany
{
    return $this->hasMany(Order::class, 'customer_id');
}

// Courier Orders
public function courierOrders()
{
    return $this->hasMany(Order::class, 'courier_id');
}

// Wallet
public function walletTransactions()
{
    return $this->hasMany(WalletTransaction::class);
}

// Ratings given
public function givenRatings()
{
    return $this->hasMany(Rating::class, 'customer_id');
}

// Ratings received
public function receivedRatings()
{
    return $this->hasMany(Rating::class, 'courier_id');
}

// Vehicle (courier only)
public function vehicle()
{
    return $this->hasOne(Vehicle::class, 'courier_id');
}

// City
public function city()
{
    return $this->belongsTo(City::class);
}
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
