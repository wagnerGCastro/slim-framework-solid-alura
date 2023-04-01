<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// use Illuminate\Database\Eloquent\Casts\AsArrayObject;
// use Illuminate\Database\Eloquent\Casts\AsEncryptedArrayObject;
// use Illuminate\Database\Eloquent\Casts\Attribute;

class Address extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'postal_code',
        'address',
        'number',
        'neighborhood',
        'city',
        'state',
        'complement',
        'type',
        'is_principal',
        'client_id',
    ];

    // /**
    //  * Interact with the user's first name.
    //  *
    //  * @param  string  $value
    //  * @return \Illuminate\Database\Eloquent\Casts\Attribute
    //  */
    // protected function postalCode(): Attribute
    // {
    //     return Attribute::make(
    //         set: fn ($value) => preg_replace('/\D/', '', $value),
    //         set: fn ($value) => preg_replace('/\D/', '', $value),
    //     );
    // }

    protected $casts = [
        'complement' => 'array',
        'postal_code' => 'encrypted',
        'address' => 'encrypted',
        'number' => 'encrypted',
        'neighborhood' => 'encrypted',
        'city' => 'encrypted',
        'deleted_at' => 'datetime',
    ];


    protected $hidden = [
        'deleted_at'
    ];

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
