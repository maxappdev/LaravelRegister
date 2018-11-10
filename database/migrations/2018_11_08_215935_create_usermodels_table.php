<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsermodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_categories', function (Blueprint $table) {
            $table->increments('category_id');
            $table->string('category_name', 45);
        });

        Schema::create('persons', function (Blueprint $table) {
            $table->increments('person_id');
            $table->unsignedInteger('category_id');
            $table->string('name', 45);
            $table->string('lastname', 45);
            $table->string('telefon', 45);
            $table->string('email', 45);
            $table->string('username', 45);
            $table->string('password', 45);
            $table->foreign('category_id')->references('category_id')->on('user_categories');
        });

        Schema::create('companies', function (Blueprint $table) {
            $table->increments('company_id');
            $table->unsignedInteger('category_id');
            $table->string('name', 45);
            $table->string('username', 45);
            $table->string('password', 45);
            $table->foreign('category_id')->references('category_id')->on('user_categories');
        });
        
        Schema::create('factories', function (Blueprint $table) {
            $table->increments('factory_id');
            $table->unsignedInteger('company_id');
            $table->foreign('company_id')->references('company_id')->on('companies');
        });
        
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('supplier_id');
            $table->unsignedInteger('company_id');
            $table->foreign('company_id')->references('company_id')->on('companies');
        });
        
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->unsignedInteger('person_id');
            $table->foreign('person_id')->references('person_id')->on('persons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down_usercategories()
    {
        Schema::dropIfExists('user_categories');
    }
    public function down_persons()
    {
        Schema::dropIfExists('persons');
    }
    public function down_companies()
    {
        Schema::dropIfExists('companies');
    }
    public function down_suppliers()
    {
        Schema::dropIfExists('suppliers');
    }
    public function down_factories()
    {
        Schema::dropIfExists('factories');
    }
    public function down_customers()
    {
        Schema::dropIfExists('customers');
    }
}
