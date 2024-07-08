<?php

namespace App\Models\Models\VideoRolling;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Models\VideoRolling\Extension;
class TypeExtension extends Model
{
    use HasFactory;
    public function title(){
        return $this->belongsTo(Extension::class,"ext_id");
    }
}
