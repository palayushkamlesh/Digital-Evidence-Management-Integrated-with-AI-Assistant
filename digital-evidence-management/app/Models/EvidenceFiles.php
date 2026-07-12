<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class EvidenceFiles extends Model
{
    protected $fillable = [
        'evidences_id',
        'file_name',
        'original_name',
        'file_path',
        'file_type',
        'file_size',
        'sha256_hash'
    ];

     public function evidences(): BelongsTo
 {
    return $this->belongsTo(Evidences::class, 'evidences_id' , 'id');

}
}