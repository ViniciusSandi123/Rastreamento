<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Destinatario extends Model
    {
        use HasFactory;

        protected $fillable = 
        [
            'entrega_id', 'nome', 'cpf', 'endereco',
            'estado', 'cep', 'pais', 'latitude', 'longitude'
        ];

        public function entrega()
        {
            return $this->hasMany(Entrega::class);
        }
        
    }
?>