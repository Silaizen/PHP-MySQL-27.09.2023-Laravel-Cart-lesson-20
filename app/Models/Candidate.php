<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'vote_id',
    ];

    public function vote()
    {
        return $this->belongsTo(Vote::class);
    }
    public function candidates()
{
    return $this->hasMany(Candidate::class);
}
}