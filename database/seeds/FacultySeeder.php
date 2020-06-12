<?php

use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Faculty::class)->create([

            'Name_En' => 'Faculty of Science',
            'Name_Ar' => 'قسم العلوم',
            'Name_Ku' => 'فاکولتيا زانست',
        ]);
        factory(App\Faculty::class)->create([
            'Name_En' => 'Faculty of Humanities',
            'Name_Ar' => 'قسم الانسانية',
            'Name_Ku' => 'فاکولتيا مروڤاتي',
        ]);
        factory(App\Faculty::class)->create([
            'Name_En' => 'Faculty of Education',
            'Name_Ar' => 'قسم التربية',
            'Name_Ku' => 'فاکولتيا پەروەردە',
        ]);
        factory(App\Faculty::class)->create([

            'Name_En' => 'College of Medicine',
            'Name_Ar' => 'کليە الطب',
            'Name_Ku' => 'کوليژا پزيشکی',
        ]);
        factory(App\Faculty::class)->create([
            'Name_En' => 'College of Engineering',
            'Name_Ar' => 'کليە الهندسە',
            'Name_Ku' => 'کوليژ ئەندازیاری',
        ]);
        factory(App\Faculty::class)->create([
            'Name_En' => 'College of Basic Education',
            'Name_Ar' => 'کليە تربية اساس',
            'Name_Ku' => 'کوليژا پەروەردا بنەرەت',
        ]);
        factory(App\Faculty::class)->create([

            'Name_En' => 'College of Administration & Economics',
            'Name_Ar' => 'کليە ادارە و اقتصاد',
            'Name_Ku' => 'کوليژا کارگيری و ئابووری',
        ]);
        
    }
}
