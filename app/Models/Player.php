<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'full_name',
        'birth_date',
        'nickname',
        'steam_link',
        'phone',
        'is_captain',
        'is_contact_person'
    ];

    protected $casts = [
        'birth_date' => 'date',
        'is_captain' => 'boolean',
        'is_contact_person' => 'boolean'
    ];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}