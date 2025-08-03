<?php

use App\Models\Store;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('receipt_registrations', function (Blueprint $table) {
          $table->foreignIdFor(Store::class)->nullable()->constrained()->nullOnDelete();
          $table->enum('prize', ['spa', 'kitchen-tools', 'box'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('receipt_registrations', function (Blueprint $table) {
          
          $table->dropForeign(['store_id']);
          $table->dropColumn('store_id');
          $table->dropColumn('prize');
        });
    }
};
