<?php

use App\Models\PesertaUser;
use App\Models\User;
use App\Models\VerifyStatus;
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
        Schema::create('verifieds', function (Blueprint $table) {
            $table->id();
            // $table->foreignIdFor(User::class);
            $table->foreignIdFor(PesertaUser::class);
            $table->foreignIdFor(VerifyStatus::class);
            // $table->boolean('perbaikan')->default(false);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verifieds');
    }
};
