<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('products')->delete();

        \DB::table('products')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'code' => '9999_20',
                    'price' => '16353',
                ),
            1 =>
                array(
                    'id' => 2,
                    'code' => '9999_05',
                    'price' => '16553',
                ),
            2 =>
                array(
                    'id' => 3,
                    'code' => '1660_25',
                    'price' => '15521',
                ),
            3 =>
                array(
                    'id' => 4,
                    'code' => '1660_05',
                    'price' => '15521',
                ),
            4 =>
                array(
                    'id' => 5,
                    'code' => '1800_25',
                    'price' => '14108',
                ),
            5 =>
                array(
                    'id' => 6,
                    'code' => '1800_05',
                    'price' => '14308',
                ),
            6 =>
                array(
                    'id' => 7,
                    'code' => 'FS9999_20',
                    'price' => '15879',
                ),
            7 =>
                array(
                    'id' => 8,
                    'code' => '1110_05',
                    'price' => '20802',
                ),
            8 =>
                array(
                    'id' => 9,
                    'code' => '1110_20',
                    'price' => '20152 ',
                ),
            9 =>
                array(
                    'id' => 10,
                    'code' => '1110P_05',
                    'price' => '21802 ',
                ),
            10 =>
                array(
                    'id' => 11,
                    'code' => '1110P_20',
                    'price' => '21152 ',
                ),
            11 =>
                array(
                    'id' => 12,
                    'code' => '1120_25',
                    'price' => '15216 ',
                ),
            12 =>
                array(
                    'id' => 13,
                    'code' => '1130S_25',
                    'price' => '9943 ',
                ),
            13 =>
                array(
                    'id' => 14,
                    'code' => '1100S_25',
                    'price' => '9242 ',
                ),
            14 =>
                array(
                    'id' => 15,
                    'code' => '1100_25',
                    'price' => '8771 ',
                ),
            15 =>
                array(
                    'id' => 16,
                    'code' => '1200S_25',
                    'price' => '8477 ',
                ),
            16 =>
                array(
                    'id' => 17,
                    'code' => '1410_25',
                    'price' => '8047 ',
                ),
            17 =>
                array(
                    'id' => 18,
                    'code' => '1430_25',
                    'price' => '10330 ',
                ),
            18 =>
                array(
                    'id' => 19,
                    'code' => '1100FS_25',
                    'price' => '8655 ',
                ),
            19 =>
                array(
                    'id' => 20,
                    'code' => '1100LS_25',
                    'price' => '8390 ',
                ),
            20 =>
                array(
                    'id' => 21,
                    'code' => '1100LS_40',
                    'price' => '8366 ',
                ),
            21 =>
                array(
                    'id' => 22,
                    'code' => '1170LS_25',
                    'price' => '8202 ',
                ),
            22 =>
                array(
                    'id' => 23,
                    'code' => '1170LS_40',
                    'price' => '8183 ',
                ),
            23 =>
                array(
                    'id' => 24,
                    'code' => '1200L_25',
                    'price' => '7509 ',
                ),
            24 =>
                array(
                    'id' => 25,
                    'code' => '2600_25',
                    'price' => '16063 ',
                ),
            25 =>
                array(
                    'id' => 26,
                    'code' => '2700_25',
                    'price' => '15314 ',
                ),
            26 =>
                array(
                    'id' => 27,
                    'code' => 'G218_25',
                    'price' => '13316 ',
                ),
            27 =>
                array(
                    'id' => 28,
                    'code' => '2000S_25',
                    'price' => '10890 ',
                ),
            28 =>
                array(
                    'id' => 29,
                    'code' => '2000_25',
                    'price' => '10910 ',
                ),
            29 =>
                array(
                    'id' => 30,
                    'code' => '2100_25',
                    'price' => '10212 ',
                ),
            30 =>
                array(
                    'id' => 31,
                    'code' => '2200_25',
                    'price' => '9992 ',
                ),
            31 =>
                array(
                    'id' => 32,
                    'code' => '2300_25',
                    'price' => '9746 ',
                ),
            32 =>
                array(
                    'id' => 33,
                    'code' => '2000GOT_25',
                    'price' => '10280 ',
                ),
            33 =>
                array(
                    'id' => 34,
                    'code' => '2100L_25',
                    'price' => '9881 ',
                ),
            34 =>
                array(
                    'id' => 35,
                    'code' => '2200L_25',
                    'price' => '9292 ',
                ),
            35 =>
                array(
                    'id' => 36,
                    'code' => '2200LV_25',
                    'price' => '9490 ',
                ),
            36 =>
                array(
                    'id' => 37,
                    'code' => '2420_25',
                    'price' => '7330 ',
                ),
            37 =>
                array(
                    'id' => 38,
                    'code' => '2430_25',
                    'price' => '7150 ',
                ),
            38 =>
                array(
                    'id' => 39,
                    'code' => '2430S_25',
                    'price' => '7354 ',
                ),
            39 =>
                array(
                    'id' => 40,
                    'code' => '4410_40',
                    'price' => '7163 ',
                ),
            40 =>
                array(
                    'id' => 41,
                    'code' => '4100_25',
                    'price' => '9211 ',
                ),
            41 =>
                array(
                    'id' => 42,
                    'code' => '4420_40',
                    'price' => '7252 ',
                ),
            42 =>
                array(
                    'id' => 43,
                    'code' => '6410_25',
                    'price' => '8373 ',
                ),
            43 =>
                array(
                    'id' => 44,
                    'code' => '6430_25',
                    'price' => '7602 ',
                ),
            44 =>
                array(
                    'id' => 45,
                    'code' => '8100_40',
                    'price' => '7250 ',
                ),
            45 =>
                array(
                    'id' => 46,
                    'code' => '8200_25',
                    'price' => '7690 ',
                ),
            46 =>
                array(
                    'id' => 47,
                    'code' => '8430S_40',
                    'price' => '8210 ',
                ),
            47 =>
                array(
                    'id' => 48,
                    'code' => 'Max9000_20',
                    'price' => '16353 ',
                ),
            48 =>
                array(
                    'id' => 49,
                    'code' => 'Max9000_05',
                    'price' => '16553 ',
                ),
            49 =>
                array(
                    'id' => 50,
                    'code' => 'Max8000_25',
                    'price' => '15521 ',
                ),
            50 =>
                array(
                    'id' => 51,
                    'code' => 'Max8000_05',
                    'price' => '15721 ',
                ),
            51 =>
                array(
                    'id' => 52,
                    'code' => 'H120_25',
                    'price' => '15216 ',
                ),
            52 =>
                array(
                    'id' => 53,
                    'code' => 'H121S_25',
                    'price' => '9943 ',
                ),
            53 =>
                array(
                    'id' => 54,
                    'code' => 'H122S_25',
                    'price' => '9242 ',
                ),
            54 =>
                array(
                    'id' => 55,
                    'code' => 'H122_25',
                    'price' => '8771 ',
                ),
            55 =>
                array(
                    'id' => 56,
                    'code' => 'H123S_25',
                    'price' => '8477 ',
                ),
            56 =>
                array(
                    'id' => 57,
                    'code' => 'H128_25',
                    'price' => '8047 ',
                ),
            57 =>
                array(
                    'id' => 58,
                    'code' => 'H129_25',
                    'price' => '10330 ',
                ),
            58 =>
                array(
                    'id' => 59,
                    'code' => 'H125FS_25',
                    'price' => '8655 ',
                ),
            59 =>
                array(
                    'id' => 60,
                    'code' => 'H125FS_40',
                    'price' => '8636 ',
                ),
            60 =>
                array(
                    'id' => 61,
                    'code' => 'H125S_25',
                    'price' => '8390 ',
                ),
            61 =>
                array(
                    'id' => 62,
                    'code' => 'H126S_25',
                    'price' => '8202 ',
                ),
            62 =>
                array(
                    'id' => 63,
                    'code' => 'G211_25',
                    'price' => '16063 ',
                ),
            63 =>
                array(
                    'id' => 64,
                    'code' => 'G212_25',
                    'price' => '15314 ',
                ),
            64 =>
                array(
                    'id' => 65,
                    'code' => 'G220_25',
                    'price' => '10910 ',
                ),
            65 =>
                array(
                    'id' => 66,
                    'code' => 'G221_25',
                    'price' => '10212 ',
                ),
            66 =>
                array(
                    'id' => 67,
                    'code' => 'G222_25',
                    'price' => '9992 ',
                ),
            67 =>
                array(
                    'id' => 68,
                    'code' => 'G223_25',
                    'price' => '9746 ',
                ),
            68 =>
                array(
                    'id' => 69,
                    'code' => 'G220GOT_25',
                    'price' => '10280 ',
                ),
            69 =>
                array(
                    'id' => 70,
                    'code' => 'G224_25',
                    'price' => '9881 ',
                ),
            70 =>
                array(
                    'id' => 71,
                    'code' => 'G225_25',
                    'price' => '9292 ',
                ),
            71 =>
                array(
                    'id' => 72,
                    'code' => 'G225V_25',
                    'price' => '9490 ',
                ),
            72 =>
                array(
                    'id' => 73,
                    'code' => 'G228_25',
                    'price' => '7150 ',
                ),
            73 =>
                array(
                    'id' => 74,
                    'code' => 'V421_25',
                    'price' => '9211 ',
                ),
            74 =>
                array(
                    'id' => 75,
                    'code' => 'V422_25',
                    'price' => '8648 ',
                ),
            75 =>
                array(
                    'id' => 76,
                    'code' => 'V428_40',
                    'price' => '7252 ',
                ),
            76 =>
                array(
                    'id' => 77,
                    'code' => 'C628_25',
                    'price' => '7602 ',
                ),
            77 =>
                array(
                    'id' => 78,
                    'code' => 'Max208_25',
                    'price' => '7150 ',
                ),
            78 =>
                array(
                    'id' => 79,
                    'code' => 'Max208S_25',
                    'price' => '7354 ',
                ),
            79 =>
                array(
                    'id' => 80,
                    'code' => 'Max401_25',
                    'price' => '9211 ',
                ),
            80 =>
                array(
                    'id' => 81,
                    'code' => 'Max408_40',
                    'price' => '7252 ',
                ),
            81 =>
                array(
                    'id' => 82,
                    'code' => 'Max608_25',
                    'price' => '7602 ',
                ),
            82 =>
                array(
                    'id' => 83,
                    'code' => 'Max200GOT_25',
                    'price' => '10280 ',
                ),

        ));
    }
}
