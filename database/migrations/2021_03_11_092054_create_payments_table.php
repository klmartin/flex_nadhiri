<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('ref_no')->unique();
            $table->unsignedBiginteger('paytype');
            $table->foreign('paytype')->references('id')->on('pay_types');
            $table->unsignedBiginteger('pledge_id');
            $table->foreign('pledge_id')->references('id')->on('pledges');
            $table->unsignedBiginteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBiginteger('card_id');
            $table->foreign('card_id')->references('id')->on('cards')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBiginteger('purpose_id');
            $table->foreign('purpose_id')->references('id')->on('purposes');
            $table->string('amount');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
