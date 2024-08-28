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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            // معلومات إضافية لعميل عقاري
            $table->string('phone')->nullable(); // رقم الهاتف
            $table->string('role')->default('client'); // دور المستخدم (مثل: عميل، مدير، إلخ)
            $table->string('license_number')->nullable(); // رقم الرخصة العقارية
            $table->text('bio')->nullable(); // وصف قصير أو سيرة ذاتية
            $table->boolean('is_supported')->default(false); // هل العميل مدعوم أم لا

            // حقول إضافية مطلوبة
            $table->decimal('salary', 10, 2)->nullable(); // الراتب
            $table->string('bank')->nullable(); // البنك
            $table->string('city')->nullable(); // المدينة
            $table->json('preferred_neighborhoods')->nullable(); // الأحياء المفضلة (JSON)
            $table->integer('age')->nullable(); // العمر

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
