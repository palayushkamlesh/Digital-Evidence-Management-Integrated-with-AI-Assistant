<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany; // For Evidence file
class Evidences extends Model
{
     protected $fillable = [
        'evidence_number',
         'cases_id',
        'evidencetypes_id',
        'title',
        'status',
    ];
      /**
  * 
  *
  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
  */
       public function cases(): BelongsTo
 {
     return $this->belongsTo(Cases::class, 'cases_id' , 'id');
 }

     public function evidencetypes(): BelongsTo
 {
     return $this->belongsTo(User::class, 'evidencetypes_id' , 'id');
 }
 //for evidence file
 public function evidencefiles(): HasMany
{
    return $this->hasMany(
        EvidenceFiles::class,
        'evidences_id',
        'id'
    );
}

//AI
 // Custody Relation
    public function custodies()
    {
        return $this->hasMany(
            ChainOfCustodies::class,
            'evidences_id'
        );
    }
//NLP
public function entities()
{
    return $this->hasOne(

        AIEntities::class,

        'evidences_id'

    );
}

}
