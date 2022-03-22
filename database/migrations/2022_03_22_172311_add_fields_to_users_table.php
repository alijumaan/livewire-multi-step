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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->after('password');
            $table->string('phone')->after('username');
            $table->string('bio')->after('phone');;
            $table->enum('gender', ['male', 'female'])->nullable()->after('bio');;
            $table->string('birth_date')->after('gender');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone', 'bio', 'gender', 'birth_date');
        });
    }
};
