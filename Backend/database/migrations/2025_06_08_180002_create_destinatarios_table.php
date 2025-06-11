<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up(): void
        {
            Schema::create('destinatarios', function(Blueprint $table) {
                $table->id();
                $table->uuid('entrega_id');
                $table->string('nome');
                $table->string('cpf', 14);
                $table->string('endereco')->nullable();
                $table->string('estado')->nullable();
                $table->string('cep')->nullable();
                $table->string('pais')->nullable();
                $table->decimal('latitude', 10, 7)->nullable();
                $table->decimal('longitude', 10, 7)->nullable();
                $table->timestamps();

                $table->foreign('entrega_id')->references('id')->on('entregas')->onDelete('cascade');
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('destinatarios');
        }
    };
?>
