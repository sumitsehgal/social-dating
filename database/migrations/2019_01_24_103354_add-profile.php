<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use App\User;

class AddProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->enum('relationship', ['single', 'married', 'divorced', 'widowed'])->default('single')->nullable();
            $table->enum('looking_for', ['Male', 'Female', 'Both'])->default('Both')->nullable();
            $table->enum('smoking', ['Yes', 'No'])->default('No')->nullable();
            $table->enum('drinking', ['Yes', 'No'])->default('No')->nullable();
            $table->text('aboutme')->nullable();
            $table->text('aboutpartner')->nullable();
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
        Schema::table('profile', function (Blueprint $table) {
            //
        });
    }
}
