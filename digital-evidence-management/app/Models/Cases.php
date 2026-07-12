<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
     
    protected $fillable = [
        'case_number',
        'title',
        'description',
        'priority',
        'status',
        'created_by'
    ];
      /**
  * 
  *
  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
  */


public function user(): BelongsTo
{
    return $this->belongsTo(Users::class, 'created_by', 'id');
}
//AI
public function evidences()
{
    return $this->hasMany(
        Evidences::class,
        'case_id'
    );
}

}
