<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'full_name',
        'mother_full_name',
        'birth_date',

        'cell_phone',
        'cell_phone_is_whatsapp',
        'other_phone_number',
        'email',

        'person_type',

        'company_name',
        'fantasy_name',
        'responsible_agent_name',
        'state_registration',

    ];


    protected $hidden = [
        'deleted_at'
    ];

    protected $casts = [
        'full_name' => 'encrypted',
        'mother_full_name' => 'encrypted',
        'company_name' => 'encrypted',
        'fantasy_name' => 'encrypted',
        'responsible_agent_name' => 'encrypted',
        'state_registration' => 'encrypted',
        'cell_phone' => 'encrypted',
        'other_phone_number' => 'encrypted',
        'email' => 'encrypted',
        'deleted_at' => 'datetime',
        'birth_date' => 'date:d/m/Y',

    ];


    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function encryptedCPF()
    {
        return $this->personal_documents()->principal()->cpf()->first()?->getRawOriginal('number');
    }

    public function encryptedCNPJ()
    {
        return $this->personal_documents()->principal()->cnpj()->first()?->getRawOriginal('number');
    }
}
