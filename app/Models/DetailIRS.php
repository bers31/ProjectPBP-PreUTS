<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailIRS extends Model
{
    use HasFactory;
    protected $table = 'detail_irs';
    public $incrementing = false;
    protected $primaryKey = ['id_irs', 'id_jadwal'];
    protected $fillable = ['id_irs', 'id_jadwal'];

     // Add this method to handle the composite primary key
    protected function setKeysForSaveQuery($query)
    {
        $keys = $this->getKeyName();
        if(!is_array($keys)){
            return parent::setKeysForSaveQuery($query);
        }

        foreach($keys as $keyName){
            $query->where($keyName, '=', $this->getAttribute($keyName));
        }

        return $query;
    }

    public function irs()
    {
        return $this->belongsTo(IRS::class, 'id_irs');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }
}
