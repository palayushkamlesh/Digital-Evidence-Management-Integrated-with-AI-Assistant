<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class EvidenceTypes extends Model
{
   protected $fillable = [
        'name',
        'description'
    ];
     //AI
     public function evidencetypes()
{
    return $this->belongsTo(
        EvidenceTypes::class,
        'evidencetypes_id'
    );
}

public function evidencefiles()
{
    return $this->hasMany(
        EvidenceFiles::class,
        'evidences_id'
    );
}

public function custodies()
{
    return $this->hasMany(
        ChainOfCustodies::class,
        'evidences_id'
    );
}

//AI
public function evidences()
{
    return $this->hasMany(
        Evidences::class,
        'evidencetypes_id'
    );
}

}
