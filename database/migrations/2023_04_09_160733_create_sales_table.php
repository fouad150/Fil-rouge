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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('book_id')
                ->constrained('books')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('user_name');
            $table->string('checkout_email')->default(null);
            $table->string('adress');
            $table->string('phone_number');
            $table->integer('zip');
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
        Schema::dropIfExists('sales');
    }
};
