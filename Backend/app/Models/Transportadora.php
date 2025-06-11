<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Transportadora extends Model
    {
        use HasFactory;
        public $incrementing = false;
        protected $keyType = 'string';

        protected $fillable = ['id', 'cnpj', 'fantasia'];

        public function entregas()
        {
            return $this->hasMany(Entrega::class);
        }
    }
?>