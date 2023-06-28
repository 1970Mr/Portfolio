<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create([
            'title' => 'بیا با هم صحبت کنیم!',
            'description' => 'سلام دوست عزیز!
            خیلی خوشحالم که اینجا هستی و می‌خوای با من ارتباط برقرار کنی. داشتن ارتباط با شما برای من ارزشمنده و همیشه به دنبال شنیدن حرفهای شما هستم.
            اینجا همونجاست که می‌تونی پیامت رو بنویسی، هر سوالی که داری رو بپرسی یا حتی یه ایده‌ی خوبی رو باهام به اشتراک بذاری. من تا جایی که می‌تونم بهت جواب می‌دم و با هم به چالش‌های جدید پی می‌بریم.
            بی‌خیال پیامهای رسمی باش، فقط برام یه پیام ساده بنویس. هر چی که تو دلته رو بهم بگو. مطمئن باش که همه پیام‌هاتو با احترام می‌خونم و تلاش می‌کنم بهشون بهترین پاسخ رو بدم.
            منتظر پیام خوبت هستم و هیچ وقت از ارتباط با تو خسته نمی‌شم. بیا با هم صحبت کنیم، برای شروع فقط پیامت رو بفرست و ببین چه اتفاقی میفته...',
            'email' => 'rasoolmorshedi10@gmail.com',
            'phone_number' => '+989387908594',
        ]);

        Contact::factory(10)->create();
    }
}
