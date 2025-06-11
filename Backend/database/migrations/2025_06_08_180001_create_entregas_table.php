<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up(): void
        {
            Schema::create('entregas', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->uuid('transportadora_id');
                $table->unsignedSmallInteger('volumes');
                $table->string('cpf_destinatario', 14);
                $table->timestamps();

                $table->foreign('transportadora_id')->references('id')->on('transportadoras')->onDelete('cascade');
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('entregas');
        }
    };
?>