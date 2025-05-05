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
            $table->string('fullName')->after('name')->nullable();
            $table->date('birthDate')->nullable();
            $table->string('phone')->nullable();
            $table->string('shippingAddress')->nullable();
            $table->string('billingAddress')->nullable();
            $table->string('preferredMaterial')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'fullName',
                'birthDate',
                'phone',
                'shippingAddress',
                'billingAddress',
                'preferredMaterial'
            ]);
        });
    }
};