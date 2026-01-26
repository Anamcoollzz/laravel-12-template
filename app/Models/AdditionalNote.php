<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdditionalNote extends Model
{

    protected $fillable = [
        'note',
        'pica_id',
    ];

    public function pica()
    {
        return $this->belongsTo(Pica::class);
    }
}
