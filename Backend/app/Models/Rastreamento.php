<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Rastreamento extends Model
    {
        use HasFactory;

        protected $fillable = ['entrega_id', 'mensagem', 'data'];

        public function entrega()
        {
            return $this->hasMany(Entrega::class);
        }
    }
?>