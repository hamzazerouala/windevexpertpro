<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->foreignId('software_id')->constrained('software')->onDelete('cascade');
            $table->string('license_key')->unique();
            $table->integer('max_activations')->default(1);
            $table->integer('activations_count')->default(0);
            $table->timestamp('expires_at')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Add license_id to workstations table
        Schema::table('workstations', function (Blueprint $table) {
            $table->foreignId('license_id')->nullable()->constrained()->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('workstations', function (Blueprint $table) {
            $table->dropForeign(['license_id']);
            $table->dropColumn('license_id');
        });
        Schema::dropIfExists('licenses');
    }
}
