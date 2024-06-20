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
        Schema::table('articles', function (Blueprint $table) {
            //specifichiamo che questo dato deve essere unsigned int
            $table->unsignedBigInteger('category_id')->after('description')->default(1);
            //Dobbiamo specificare che è una chiave esterna
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            //specifico che la colonna non è più una foreign key
            $table->dropForeign(['category_id']);
            //butto giù la colonna
            $table->dropColumn('category_id');
        });
    }
};