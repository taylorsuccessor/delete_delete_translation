<?php 
namespace App\module\translation\database\seed;

use Illuminate\Database\Seeder;
use App\module\translation\model\Translation as mTranslation;

class translation extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

mTranslation::insert([

    [


        "translate_en"=>'يوم الكتابة العالمي في الأزهر',
        "translate_ar"=>'Al-Azhar International Writing Day',
        "translate_before_en"=>'in real',
        "translate_after_en"=>'the last issue',
        "translate_before_ar"=>'في الحقيقة',
        "translate_after_ar"=>' آخر قضية',
        "user_id"=>'45',
        "status"=>'2',

    ],


    [


        "translate_en"=>' في الأزهر يوم الكتابة العالمي',
        "translate_ar"=>'International Writing Day in Al-Azhar ',
        "translate_before_en"=>'in  real',
        "translate_after_en"=>' issue the last',
        "translate_before_ar"=>'عن الحقيقة',
        "translate_after_ar"=>' اخر قضية',
        "user_id"=>'45',
        "status"=>'2',

    ],

    [


        "translate_en"=>' الكتبة العالمي في يوم  أزهر',
        "translate_ar"=>'Al-Azhar International Writing Day',
        "translate_before_en"=>'in real',
        "translate_after_en"=>'the last issue',
        "translate_before_ar"=>'في الحقيقة',
        "translate_after_ar"=>' آخر قضية',
        "user_id"=>'45',
        "status"=>'2',

    ],

    [


        "translate_en"=>'يوم الكتابة عالمي في الأزهر',
        "translate_ar"=>'Al-Azhar International Writing Day',
        "translate_before_en"=>'in real',
        "translate_after_en"=>'the last issue',
        "translate_before_ar"=>'في الحقيقة',
        "translate_after_ar"=>' آخر قضية',
        "user_id"=>'45',
        "status"=>'2',

    ],

    [


        "translate_en"=>'يوم الكتابة في الأزهر العالمي',
        "translate_ar"=>'Al-Azhar International Writing Day',
        "translate_before_en"=>'in real',
        "translate_after_en"=>'the last issue',
        "translate_before_ar"=>'في الحقيقة',
        "translate_after_ar"=>' آخر قضية',
        "user_id"=>'45',
        "status"=>'2',

    ],

    [


        "translate_en"=>'أيام الكتابة العالمي  الأزهر',
        "translate_ar"=>'Al-Azhar International Writing Day',
        "translate_before_en"=>'in real',
        "translate_after_en"=>'the last issue',
        "translate_before_ar"=>'في الحقيقة',
        "translate_after_ar"=>' آخر قضية',
        "user_id"=>'45',
        "status"=>'2',

    ],

    [


        "translate_en"=>'الكتابة العالمي يوم عن أزهر',
        "translate_ar"=>'Al-Azhar International Writing Day',
        "translate_before_en"=>'in real',
        "translate_after_en"=>'the last issue',
        "translate_before_ar"=>'في الحقيقة',
        "translate_after_ar"=>' آخر قضية',
        "user_id"=>'45',
        "status"=>'2',

    ],

    [


        "translate_en"=>'يوم الكتاب العالمي في الأزهر',
        "translate_ar"=>'Al-Azhar International Writing Day',
        "translate_before_en"=>'in real',
        "translate_after_en"=>'the last issue',
        "translate_before_ar"=>'في الحقيقة',
        "translate_after_ar"=>' آخر قضية',
        "user_id"=>'45',
        "status"=>'2',

    ],

    [


        "translate_en"=>' في الأزهر يوم الكتب العالمي',
        "translate_ar"=>'Al-Azhar International Writing Day',
        "translate_before_en"=>'in real',
        "translate_after_en"=>'the last issue',
        "translate_before_ar"=>'في الحقيقة',
        "translate_after_ar"=>' آخر قضية',
        "user_id"=>'45',
        "status"=>'2',

    ],

]);


        factory(mTranslation::class,30)->create();
    }
}
