<?php

use App\Enums\StatusEnum;
use App\Enums\TaskTypeEnum;
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->unsignedBigInteger('creator_id');
            $table->unsignedBigInteger('tester_id');
            $table->unsignedBigInteger('executor_id');
            $table->string('status')->default(StatusEnum::WORKING->value);
            $table->string('type')->default(TaskTypeEnum::ISSUE->value);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();

            $table->foreign('creator_id')->references('id')
                ->on('users');
            $table->foreign('tester_id')->references('id')
                ->on('users');
            $table->foreign('executor_id')->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('tasks');
        Schema::enableForeignKeyConstraints();
    }
};
