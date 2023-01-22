<?php

namespace App\Models\Models\VideoRolling;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Models\VideoRolling\Project;
use App\Models\Models\VideoRolling\Worker;

class Rule extends Model
{
    use HasFactory;

    protected $fillable = ['project_id','worker_id','read','update','delete' ];
    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
