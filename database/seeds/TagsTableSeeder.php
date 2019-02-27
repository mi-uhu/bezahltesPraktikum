<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert(['tag' => 'Bau, Baunebengewerbe und Holz']);
        DB::table('tags')->insert(['tag' => 'Büro, Wirtschaft, Finanzwesen und Recht']);
        DB::table('tags')->insert(['tag' => 'Chemie, Kunststoffe, Rohstoffe und Bergbau']);
        DB::table('tags')->insert(['tag' => 'Elektrotechnik, Elektronik und Telekommunikation']);
        DB::table('tags')->insert(['tag' => 'Gesundheit und Medizin']);
        DB::table('tags')->insert(['tag' => 'Glas, Keramik und Stein']);
        DB::table('tags')->insert(['tag' => 'Grafik, Druck, Papier und Fotografie']);
        DB::table('tags')->insert(['tag' => 'Handel und Verkauf']);
        DB::table('tags')->insert(['tag' => 'Hilfsberufe und Aushilfskräfte']);
        DB::table('tags')->insert(['tag' => 'Hotel- und Gastgewerbe']);
        DB::table('tags')->insert(['tag' => 'Informationstechnologie - IT']);
        DB::table('tags')->insert(['tag' => 'Körper- und Schönheitspflege']);
        DB::table('tags')->insert(['tag' => 'Landwirtschaft, Gartenbau und Forstwirtschaft']);
        DB::table('tags')->insert(['tag' => 'Lebensmittel']);
        DB::table('tags')->insert(['tag' => 'Maschinen, Kfz und Metall']);
        DB::table('tags')->insert(['tag' => 'Medien, Kunst und Kultur']);
        DB::table('tags')->insert(['tag' => 'Reinigung und Hausbetreuung']);
        DB::table('tags')->insert(['tag' => 'Reise, Freizeit und Sport']);
        DB::table('tags')->insert(['tag' => 'Sicherheitsdienste']);
        DB::table('tags')->insert(['tag' => 'Soziales, Kinderpädagogik und Bildung']);
        DB::table('tags')->insert(['tag' => 'Textil, Mode und Leder']);
        DB::table('tags')->insert(['tag' => 'Umwelt']);
        DB::table('tags')->insert(['tag' => 'Verkehr, Transport und Zustelldienste']);
        DB::table('tags')->insert(['tag' => 'Wissenschaft, Forschung und Entwicklung']);
    }
}
