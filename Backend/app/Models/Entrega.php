<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Entrega extends Model
    {
        use HasFactory;
        public $incrementing = false;
        protected $keyType = 'string';

        protected $fillable = ['id', 'transportadora_id', 'volumes', 'cpf_destinatario'];

        public function transportadora()
        {
            return $this->belongsTo(Transportadora::class);
        }

        public function remetente()
        {
            return $this->hasOne(Remetente::class);
        }

        public function destinatario()
        {
            return $this->hasOne(Destinatario::class);
        }

        public function rastreamentos()
        {
            return $this->hasMany(Rastreamento::class);
        }
    }
?>