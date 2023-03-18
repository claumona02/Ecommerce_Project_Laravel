<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public $fillable = ['id','name', 'description', 'photo', 'price'];


    public function up()
	 {
		Schema::create('products', function (Blueprint $table) {
			$table->increments('id');
			$table->string("name", 300)->nullable();
			$table->text("description")->nullable();
			$table->string("photo", 300)->nullable();
			$table->decimal("price", 6, 2);
			$table->timestamps();
		 });
	 }

 /*
 * Reverse the migrations.
 *
 * @return void
 */

 public function down()
	 {
		Schema::dropIfExists('products');
	 }

}
