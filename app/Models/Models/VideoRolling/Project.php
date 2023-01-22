<?php

namespace App\Models\Models\VideoRolling;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Models\VideoRolling\Rule;
use App\Models\Models\VideoRolling\ProjectType;
class Project extends Model
{
    use HasFactory;
    protected $fillable = ['url','name','url','type_id'];
    
    
    public function rules()
    {
        return $this->hasMany(Rule::class);
    }
    public function project_type()
    {
        return $this->belongsTo(ProjectType::class,'type_id');
    }
}
