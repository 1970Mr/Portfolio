<?php

namespace Database\Seeders;

use App\Models\Qualification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QualificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Qualification::factory()->createMany([
            [
                'period' => '1401',
                'title' => 'طراحی سایت خبری - mohebnews',
                'descriptions' => 'سایت mohebnews.com رو با وردپرس برای یکی از آشنایانم ایجاد کردم',
                'type' => Qualification::$types[0],
                'status' => 1,
            ],
            [
                'period' => 'زمان‌های مختلف',
                'title' => 'طراحی چندین بلاگ',
                'descriptions' => 'بلاگ‌های ساده مختلفی رو به عنوان تمرین برای خودم و آشنایانم ایجاد کرده‌ام',
                'type' => Qualification::$types[0],
                'status' => 1,
            ],
            [
                'period' => '1402',
                'title' => 'طراحی و توسعه یک سایت portfolio برای خودم',
                'descriptions' => 'یک سایت portfolio برای ارائه نمونه کارهای خودم ایجاد کردم',
                'type' => Qualification::$types[0],
                'status' => 1,
            ],
            [
                'period' => '1398 - 1400',
                'title' => 'کاردانی - نرم‌افزار - چمران اهواز',
                'descriptions' => 'مدرک کاردانی نرم افزار رو از دانشگاه چمران اهواز کسب کردم',
                'type' => Qualification::$types[1],
                'status' => 1,
            ],
            [
                'period' => '1400 - درحال تحصیل',
                'title' => 'کارشناسی - مهندسی نرم‌افزار - کارون اهواز',
                'descriptions' => 'در حال حاظر مشغول گذراندن دوره کارشناسی در دانشگاه کارون هستم',
                'type' => Qualification::$types[1],
                'status' => 1,
            ],
        ]);

        Qualification::factory(10)->state(['status' => 0])->create();
    }
}
