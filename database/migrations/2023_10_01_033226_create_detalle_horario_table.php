<?php
use App\Models\Aula;
use App\Models\Materias;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalle_horario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Aula_id')
                  ->nullable()
                  ->constrained('Aula')
                  ->nullOnDelete();
             
              $table->foreignId('Materias_id')
                  ->nullable()
                  ->constrained('Materias')
                  ->nullOnDelete();

              $table->string('Horario',50);
              
              $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_horario');
    }
};
