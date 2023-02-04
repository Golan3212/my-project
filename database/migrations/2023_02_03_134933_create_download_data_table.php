<?php
declare(strict_types=1);
use App\Enums\NewsStatus;
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
    public function up():void
    {
        Schema::create('download_data', function (Blueprint $table) {
            $table->id();
            $table->string('username', 191)->default('Admin');
            $table->string('phone', 191)->default('88005553535');
            $table->string('email')->nullable();
            $table->text('comment_to_get')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down():void
    {
        Schema::dropIfExists('download_data');
    }
};
