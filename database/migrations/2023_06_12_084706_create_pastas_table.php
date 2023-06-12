<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pastas', function (Blueprint $table) {
            $table->id();
            $table->string('src');
            $table->string('src_h')->nullable();
            $table->string('src_p')->nullable();
            $table->string('titolo',100);
            $table->string('slug',100);
            $table->string('tipo',20);
            $table->string('cottura',20);
            $table->string('peso',20);
            $table->text('descrizione');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pastas');
    }
};
