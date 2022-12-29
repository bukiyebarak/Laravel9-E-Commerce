<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        City::factory()->count(1)->create();
        DB::table('city')->insert([
            ['sehir_id' => 1,'sehir_title'=> "\u0130STANBUL", 'sehir_key' => 34],
            ['sehir_id' => 2,'sehir_title'=> "ANKARA", 'sehir_key' => 6],
            ['sehir_id' => 3,'sehir_title'=> "\u0130ZM\u0130R", 'sehir_key' => 35],
            ['sehir_id' => 4,'sehir_title'=> "BURSA", 'sehir_key' => 16],
            ['sehir_id' => 5,'sehir_title'=> "ADANA", 'sehir_key' => 1],
            ['sehir_id' => 6,'sehir_title'=> "ADIYAMAN", 'sehir_key' => 2],
            ['sehir_id' => 7,'sehir_title'=> "AFYONKARAH\u0130SAR", 'sehir_key' => 3],
            ['sehir_id' => 8,'sehir_title'=> "A\u011eRI", 'sehir_key' => 4],
            ['sehir_id' => 9,'sehir_title'=> "AKSARAY", 'sehir_key' => 68],
            ['sehir_id' => 10,'sehir_title'=> "AMASYA", 'sehir_key' => 5],
            ['sehir_id' => 11,'sehir_title'=> "ANTALYA", 'sehir_key' => 7],
            ['sehir_id' => 12,'sehir_title'=> "ARDAHAN", 'sehir_key' => 75],
            ['sehir_id' => 13,'sehir_title'=> "ARTV\u0130N", 'sehir_key' => 8],
            ['sehir_id' => 14,'sehir_title'=> "AYDIN", 'sehir_key' => 9],
            ['sehir_id' => 15,'sehir_title'=> "BALIKES\u0130R", 'sehir_key' => 10],
            ['sehir_id' => 16,'sehir_title'=> "BARTIN", 'sehir_key' => 74],
            ['sehir_id' => 17,'sehir_title'=> "BATMAN", 'sehir_key' => 72],
            ['sehir_id' => 18,'sehir_title'=> "BAYBURT", 'sehir_key' => 69],
            ['sehir_id' => 19,'sehir_title'=> "B\u0130LEC\u0130K", 'sehir_key' => 11],
            ['sehir_id' => 20,'sehir_title'=> "B\u0130NG\u00d6L", 'sehir_key' => 12],
            ['sehir_id' => 21,'sehir_title'=> "B\u0130TL\u0130S", 'sehir_key' => 13],
            ['sehir_id' => 22,'sehir_title'=> "BOLU", 'sehir_key' => 14],
            ['sehir_id' => 23,'sehir_title'=> "BURDUR", 'sehir_key' => 15],
            ['sehir_id' => 24,'sehir_title'=> "\u00c7ANAKKALE", 'sehir_key' => 17],
            ['sehir_id' => 25,'sehir_title'=> "\u00c7ANKIRI", 'sehir_key' => 18],
            ['sehir_id' => 26,'sehir_title'=> "\u00c7ORUM", 'sehir_key' => 19],
            ['sehir_id' => 27,'sehir_title'=> "DEN\u0130ZL\u0130", 'sehir_key' => 20],
            ['sehir_id' => 28,'sehir_title'=> "D\u0130YARBAKIR", 'sehir_key' => 21],
            ['sehir_id' => 29,'sehir_title'=> "KOCAEL\u0130", 'sehir_key' => 41],
            ['sehir_id' => 30,'sehir_title'=> "KONYA", 'sehir_key' => 42],
            ['sehir_id' => 31,'sehir_title'=> "K\u00dcTAHYA", 'sehir_key' => 43],
            ['sehir_id' => 32,'sehir_title'=> "MALATYA", 'sehir_key' => 44],
            ['sehir_id' => 33,'sehir_title'=> "MAN\u0130SA", 'sehir_key' => 45],
            ['sehir_id' => 34,'sehir_title'=> "MARD\u0130N", 'sehir_key' => 47],
            ['sehir_id' => 35,'sehir_title'=> "MERS\u0130N", 'sehir_key' => 33],
            ['sehir_id' => 36,'sehir_title'=> "MU\u011eLA", 'sehir_key' => 48],
            ['sehir_id' => 37,'sehir_title'=> "MU\u015e", 'sehir_key' => 49],
            ['sehir_id' => 38,'sehir_title'=> "NEV\u015eEH\u0130R", 'sehir_key' => 50],
            ['sehir_id' => 39,'sehir_title'=> "N\u0130\u011eDE", 'sehir_key' => 51],
            ['sehir_id' => 40,'sehir_title'=> "ORDU", 'sehir_key' => 52],
            ['sehir_id' => 41,'sehir_title'=> "OSMAN\u0130YE", 'sehir_key' => 80],
            ['sehir_id' => 42,'sehir_title'=> "R\u0130ZE", 'sehir_key' => 53],
            ['sehir_id' => 43,'sehir_title'=> "SAKARYA", 'sehir_key' => 54],
            ['sehir_id' => 44,'sehir_title'=> "SAMSUN", 'sehir_key' => 55],
            ['sehir_id' => 45,'sehir_title'=> "S\u0130\u0130RT", 'sehir_key' => 56],
            ['sehir_id' => 46,'sehir_title'=> "S\u0130NOP", 'sehir_key' => 57],
            ['sehir_id' => 47,'sehir_title'=> "\u015eIRNAK", 'sehir_key' => 73],
            ['sehir_id' => 48,'sehir_title'=> "S\u0130VAS", 'sehir_key' => 58],
            ['sehir_id' => 49,'sehir_title'=> "TEK\u0130RDA\u011e", 'sehir_key' => 59],
            ['sehir_id' => 50,'sehir_title'=> "TOKAT", 'sehir_key' => 60],
            ['sehir_id' => 51,'sehir_title'=> "TRABZON", 'sehir_key' => 61],
            ['sehir_id' => 52,'sehir_title'=> "TUNCEL\u0130", 'sehir_key' => 62],
            ['sehir_id' => 53,'sehir_title'=> "\u015eANLIURFA", 'sehir_key' => 63],
            ['sehir_id' => 54,'sehir_title'=> "U\u015eAK", 'sehir_key' => 64],
            ['sehir_id' => 55,'sehir_title'=> "VAN", 'sehir_key' => 65],
            ['sehir_id' => 56,'sehir_title'=> "YALOVA", 'sehir_key' => 77],
            ['sehir_id' => 57,'sehir_title'=> "YOZGAT", 'sehir_key' => 66],
            ['sehir_id' => 58,'sehir_title'=> "ZONGULDAK", 'sehir_key' => 67],
            ['sehir_id' => 59,'sehir_title'=> "D\u00dcZCE", 'sehir_key' => 81],
            ['sehir_id' => 60,'sehir_title'=> "ED\u0130RNE", 'sehir_key' => 22],
            ['sehir_id' => 61,'sehir_title'=> "ELAZI\u011e", 'sehir_key' => 23],
            ['sehir_id' => 62,'sehir_title'=> "ERZ\u0130NCAN", 'sehir_key' => 24],
            ['sehir_id' => 63,'sehir_title'=> "ERZURUM", 'sehir_key' => 25],
            ['sehir_id' => 64,'sehir_title'=> "ESK\u0130\u015eEH\u0130R", 'sehir_key' => 26],
            ['sehir_id' => 65,'sehir_title'=> "GAZ\u0130ANTEP", 'sehir_key' => 27],
            ['sehir_id' => 66,'sehir_title'=> "G\u0130RESUN", 'sehir_key' => 28],
            ['sehir_id' => 67,'sehir_title'=> "G\u00dcM\u00dc\u015eHANE", 'sehir_key' => 29],
            ['sehir_id' => 68,'sehir_title'=> "HAKKAR\u0130", 'sehir_key' => 30],
            ['sehir_id' => 69,'sehir_title'=> "HATAY", 'sehir_key' => 31],
            ['sehir_id' => 70,'sehir_title'=> "I\u011eDIR", 'sehir_key' => 76],
            ['sehir_id' => 71,'sehir_title'=> "ISPARTA", 'sehir_key' => 32],
            ['sehir_id' => 72,'sehir_title'=> "KAHRAMANMARA\u015e", 'sehir_key' => 46],
            ['sehir_id' => 73,'sehir_title'=> "KARAB\u00dcK", 'sehir_key' => 78],
            ['sehir_id' => 74,'sehir_title'=> "KARAMAN", 'sehir_key' => 70],
            ['sehir_id' => 75,'sehir_title'=> "KARS", 'sehir_key' => 36],
            ['sehir_id' => 76,'sehir_title'=> "KASTAMONU", 'sehir_key' => 37],
            ['sehir_id' => 77,'sehir_title'=> "KAYSER\u0130", 'sehir_key' => 38],
            ['sehir_id' => 78,'sehir_title'=> "K\u0130L\u0130S", 'sehir_key' => 79],
            ['sehir_id' => 79,'sehir_title'=> "KIRIKKALE", 'sehir_key' => 71],
            ['sehir_id' => 80,'sehir_title'=> "KIRKLAREL\u0130", 'sehir_key' => 39],
            ['sehir_id' => 81,'sehir_title'=> "KIR\u015eEH\u0130R", 'sehir_key' => 40]
        ]);

    }
}
