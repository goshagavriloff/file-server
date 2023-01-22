<?php

namespace App\Models\Models\VideoRolling;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Models\VideoRolling\Rule;

class Worker extends Model
{
    use HasFactory;
    public function rules()
    {
        return $this->hasMany(Rule::class);
    }
}
