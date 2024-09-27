<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Monolog\Level;

class LevelModel extends Model
{
    protected $table = 'm_level';        
    protected $primaryKey = 'level_id'; 


    public function Level():BelongsTo {
        return $this->belongsTo(LevelModel::class);
    }
}