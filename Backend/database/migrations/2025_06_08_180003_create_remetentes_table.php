<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up(): void
        {
            Schema::create('remetentes', function (Blueprint $table) {
                $table->id();
                $table->uuid('entrega_id');
                $table->string('nome');
                $table->timestamps();

                $table->foreign('entrega_id')->references('id')->on('entregas')->onDelete('cascade');
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('remetentes');
        }
    };
?>
