<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->default(0)->after('remember_token');
        });

        \App\Models\User::create([
            'name'              => 'Firdaus Nasir',
            'email'             => 'firdausnasir69@gmail.com',
            'email_verified_at' => now()->toDateTimeString(),
            'password'          => bcrypt('Passw0rd$'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_admin');
        });

        \App\Models\User::whereEmail('firdausnasir69@gmail.com')->delete();
    }
};
