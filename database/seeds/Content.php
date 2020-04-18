<?php

use Illuminate\Database\Seeder;

class Content extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            'id' => 1,
            'nom' => 'France',
        ]);
        DB::table('regions')->insert([
            'id' => 1,
            'country_id'=> 1,
            'nom' => 'Auvergne-Rhône-Alpes',
        ]);
        DB::table('regions')->insert([
            'id' => 2,
            'country_id'=> 1,
            'nom' => 'Bourgogne-Franche-Comté',
        ]);
        DB::table('regions')->insert([
            'id' => 3,
            'country_id'=> 1,
            'nom' => 'Bretagne',
        ]);
        DB::table('regions')->insert([
            'id' => 4,
            'country_id'=> 1,
            'nom' => 'Centre-Val de Loire',
        ]);
        DB::table('regions')->insert([
            'id' => 5,
            'country_id'=> 1,
            'nom' => 'Corse',
        ]);
        DB::table('regions')->insert([
            'id' => 6,
            'country_id'=> 1,
            'nom' => 'Grand Est',
        ]);
        DB::table('regions')->insert([
            'id' => 7,
            'country_id'=> 1,
            'nom' => 'Hauts-de-France',
        ]);
        DB::table('regions')->insert([
            'id' => 8,
            'country_id'=> 1,
            'nom' => 'Ile-de-France',
        ]);
        DB::table('regions')->insert([
            'id' => 9,
            'country_id'=> 1,
            'nom' => 'Normandie',
        ]);
        DB::table('regions')->insert([
            'id' => 10,
            'country_id'=> 1,
            'nom' => 'Nouvelle-Aquitaine',
        ]);
        DB::table('regions')->insert([
            'id' => 11,
            'country_id'=> 1,
            'nom' => 'Occitanie',
        ]);
        DB::table('regions')->insert([
            'id' => 12,
            'country_id'=> 1,
            'nom' => 'Pays de la Loire',
        ]);
        DB::table('regions')->insert([
            'id' => 13,
            'country_id'=> 1,
            'nom' => "Provence-Alpes-Côtes d'Azur",
        ]);
        DB::table('regions')->insert([
            'id' => 14,
            'country_id'=> 1,
            'nom' => 'Guadeloupe',
        ]);
        DB::table('regions')->insert([
            'id' => 15,
            'country_id'=> 1,
            'nom' => 'Martinique',
        ]);
        DB::table('regions')->insert([
            'id' => 16,
            'country_id'=> 1,
            'nom' => 'Guyane',
        ]);
        DB::table('regions')->insert([
            'id' => 17,
            'country_id'=> 1,
            'nom' => 'La Réunion',
        ]);
        DB::table('regions')->insert([
            'id' => 18,
            'country_id'=> 1,
            'nom' => 'Mayotte',
        ]);
    }
}
