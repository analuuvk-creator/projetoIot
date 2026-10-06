<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Sensor extends Model
{
    use HasFactory;

    protected $fillable = [
        'ambiente_id',
        'codigo', // TEMPO1, TEMPO2...
        'tipo', // LED, temperatura...
        'descricao', 
        'status' // Ativo/Inativo
    ];

    public function registros() {
        return $this->hasMany(Registro::class);
    }
    public function ambientes(){
        return $this->belongsTo(Ambiente::class);
    }
}
