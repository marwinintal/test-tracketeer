<?php

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
        Schema::table('users', function (Blueprint $table) {
            $table->string('address_1')->nullable()->after('telephone');
            $table->string('address_2')->nullable()->after('address_1');
            $table->string('state')->nullable()->after('address_2');
            $table->string('city')->nullable()->after('state');
            $table->string('postal_code')->nullable()->after('city');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('address_1');
            $table->dropColumn('address_2');
            $table->dropColumn('state');
            $table->dropColumn('city');
            $table->dropColumn('postal_code');
        });
    }
};
