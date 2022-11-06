<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTitleToTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('todos', function (Blueprint $table) {
            DB::statement("ALTER TABLE todos MODIFY COLUMN title varchar(255) NOT NULL AFTER id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('todos', function (Blueprint $table) {
            DB::statement("ALTER TABLE todos MODIFY COLUMN title varchar(255) NOT NULL AFTER updated_at");
        });
    }
}