<?php

namespace App\Models\Models\VideoRolling;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Models\VideoRolling\Extension;
class ProjectType extends Model
{
    use HasFactory;
    public function extensions(){

        return $this->hasMany(Extension::class,'type_id');
    }
}
