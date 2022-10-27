<?php

namespace Database\Seeders;

use App\Models\Product;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $faker = Faker::create('ru_RU');

    foreach (range(1, 50) as $value) {
      $table = new Product();
      $table->photo = 'product.png';
      $table->nosology_id = $faker->numberBetween($min = 1, $max = 9);
      $table->classification_id = $faker->numberBetween($min = 1, $max = 9);
      $table->release_form_id = $faker->numberBetween($min = 1, $max = 12);
      $table->prescription = 'OTC';
      $table->title = 'Dorsob-T';
      $table->slug = SlugService::createSlug(Product::class, 'slug', 'Dorsob-T');
      $table->description = 'Cостоит из двух компонентов: дорзоламида гидрохлорида и тимолола малеата. Каждый из этих двух компонентов снижает повышенное внутриглазное давление за счет уменьшения секреции внутриглазной жидкости, но делает это посредством разных механизмов действия.';
      $table->composition = 'активные вещества: дорзоламида гидрохлорида 22,26 (эквивалентно дорзоламиду 20,00), тимолола малеата 6.83 мг (эквивалентно тимололу 5,00 мг) вспомогательные вещества: маннитол, натрия цитрат, гидроксиэтилцеллюлоза (натрозол НХ 250), натрия гидроксида 1 М раствор до рН 5,65, бензалкония хлорид 50 % раствор, натрия гидроксида 1 М раствор до рН 5,5-5,8, вода для инъекций.';
      $table->indications = 'активные вещества: дорзоламида гидрохлорида 22,26 (эквивалентно дорзоламиду 20,00), тимолола малеата 6.83 мг (эквивалентно тимололу 5,00 мг) вспомогательные вещества: маннитол, натрия цитрат, гидроксиэтилцеллюлоза (натрозол НХ 250), натрия гидроксида 1 М раствор до рН 5,65, бензалкония хлорид 50 % раствор, натрия гидроксида 1 М раствор до рН 5,5-5,8, вода для инъекций.';
      $table->mode = 'активные вещества: дорзоламида гидрохлорида 22,26 (эквивалентно дорзоламиду 20,00), тимолола малеата 6.83 мг (эквивалентно тимололу 5,00 мг) вспомогательные вещества: маннитол, натрия цитрат, гидроксиэтилцеллюлоза (натрозол НХ 250), натрия гидроксида 1 М раствор до рН 5,65, бензалкония хлорид 50 % раствор, натрия гидроксида 1 М раствор до рН 5,5-5,8, вода для инъекций.';
      $table->instruction = 'default.pdf';
      $table->url = '#';
      $table->save();
    }
  }
}
