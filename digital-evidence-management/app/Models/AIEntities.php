<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AIEntities extends Model
{
    protected $table = 'ai_entities';

    protected $fillable = [

        'evidences_id',

        'persons',

        'dates',

        'amounts',

        'communications',

        'locations'

    ];

    protected $casts = [

        'persons' => 'array',

        'dates' => 'array',

        'amounts' => 'array',

        'communications' => 'array',

        'locations' => 'array'

    ];

    public function evidence()
    {
        return $this->belongsTo(

            Evidences::class,

            'evidences_id'

        );
    }
}