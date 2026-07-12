<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class ChainOfCustodies extends Model
{
    public $timestamps = false;

        protected $fillable = [
        
        'evidences_id',
        'from_users_id',
        'to_users_id',
        'action',
        'remarks',

    ];
        /**
  * 
  *
  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
  */

     public function evidences(): BelongsTo
 {
    return $this->belongsTo(Evidences::class, 'evidences_id' , 'id');
 }

      public function fromusers(): BelongsTo
 {
     return $this->belongsTo(User::class, 'from_users_id' , 'id');
 }

      public function tousers(): BelongsTo
 {
     return $this->belongsTo(User::class, 'to_users_id' , 'id');
 }

}
