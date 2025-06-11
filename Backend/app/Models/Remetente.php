<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Remetente extends Model
    {
        use HasFactory;

        protected $fillable = ['entrega_id', 'nome'];

        public function entrega()
        {
            return $this->hasMany(Entrega::class);
        }
    }
?>