<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competitor extends Model
{
    use HasFactory;
    protected $fillable = ['user_email', 'user_firstname', 'user_lastname', 'round_competition_name', 'round_competition_date', 'round_competition_round'];
}
