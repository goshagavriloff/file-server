<?php

namespace App\Models\Models\VideoRolling;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Models\VideoRolling\TypeExtension;
class ProjectType extends Model
{
    use HasFactory;
    public function extensions(){

        return $this->hasMany(TypeExtension::class,'type_id');
    }
}
