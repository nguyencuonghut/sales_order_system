<?php

use Illuminate\Database\Seeder;

class PeriodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('periods')->delete();

        \DB::table('periods')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Kỳ 1',
                    'color' => '#FF6384',
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Kỳ 2',
                    'color' => '#71397C',
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'Kỳ 3',
                    'color' => '#61BA95',
                ),
            3 =>
                array (
                    'id' => 4,
                    'name' => 'Kỳ 4',
                    'color' => 'red',
                ),
            4 =>
                array (
                    'id' => 5,
                    'name' => 'Kỳ 5',
                    'color' => 'green',
                ),
            5 =>
                array (
                    'id' => 6,
                    'name' => 'Kỳ 6',
                    'color' => 'blue',
                ),

        ));
    }
}
