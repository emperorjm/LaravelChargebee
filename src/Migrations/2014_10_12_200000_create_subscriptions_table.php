<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Create the subscription table
     *
     * @return void
     */
    /**public function up()
    {
        Schema::create('subscriptions', function($table) {
            $table->increments('id');
            $table->string('subscription_id');
            $table->string('plan_id');
            $table->integer('user_id')->index()->unsigned();
            $table->integer('quantity')->default(1);
            $table->integer('last_four')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamp('next_billing_at')->nullable();
            $table->timestamps();
        });
    }**/
    
    /**
      * Run the migrations.
      *
      * @return void
      */
    public function up() {
        Schema::table('subscriptions', function ($table) {
            $table->string('subscription_id');
            $table->string('plan_id');
            $table->integer('last_four')->nullable();
            $table->timestamp('next_billing_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::drop('subscriptions');
        Schema::table('subscriptions', function (Blueprint $table) {
            if(Schema::hasColumn('subscriptions', 'subscription_id')){
                $table->dropColumn('subscription_id');
            }
            if(Schema::hasColumn('subscriptions', 'plan_id')){
                $table->dropColumn('plan_id');
            }
            if(Schema::hasColumn('subscriptions', 'last_four')){
                $table->dropColumn('last_four');
            }
            if(Schema::hasColumn('subscriptions', 'next_billing_at')){
                $table->dropColumn('next_billing_at');
            }
        });
    }
}
