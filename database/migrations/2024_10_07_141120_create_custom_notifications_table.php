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
        Schema::create('custom_notifications', function (Blueprint $table) {
            $table->collation = 'utf8mb3_general_ci';
            $table->charset = 'utf8mb3';

            $table->bigIncrements('id');
            $table->string('type');
            $table->string('notification_type');
            $table->string('notifiable_type')->index('notifiable_type');
            $table->unsignedBigInteger('notifiable_id')->index('notifiable_id');
            $table->longText('data')->charset('utf8mb4')->collation('utf8mb4_bin');
            $table->timestamp('read_at')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable()->useCurrent();
            $table->unsignedBigInteger('booked_appointment_id')->nullable();
            $table->integer('sender_type_id')->nullable();
            $table->string('sender_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_notifications');
    }
};
