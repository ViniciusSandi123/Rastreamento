<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up(): void
        {
            Schema::create('transportadoras', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->string('cnpj', 20);
                $table->string('fantasia');
                $table->timestamps();
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('transportadoras');
        }
    };
?>