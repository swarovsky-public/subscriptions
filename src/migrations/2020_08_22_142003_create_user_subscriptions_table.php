<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_subscriptions', static function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('subscription_id');
            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // save payment method?
            $table->unsignedBigInteger('user_payment_method_id')->nullable();
            $table->foreign('user_payment_method_id')->references('id')->on('user_payment_methods')->onDelete('set null');

            $table->boolean('is_paid');

            $table->boolean('automatically_renew');
            $table->timestamp('next_billing_at')->nullable();

            $table->timestamp('payment_next_try_date')->nullable();
            $table->integer('payment_tries');

            $table->timestamps();
            $table->softDeletes(); // un utente puà cancellare la subscription,
            // nel middleware per verificare status utente si controllano anche le "cancellate" che abbiano renew_at > today
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_subscriptions');
    }
}
