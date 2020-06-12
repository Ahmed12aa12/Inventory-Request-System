<?php
use App\Status;
use Illuminate\Database\Seeder;

class StatusSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Status::class)->create([

            'Name_En' => 'Order Sended',
            'Name_Ar' => 'تم إرسال الطلب',
            'Name_Ku' => 'فەرمان شاند',
        ]);
        factory(App\Status::class)->create([
            'Name_En' => 'Order Acceptet',
            'Name_Ar' => 'تم قبول الطلب',
            'Name_Ku' => 'فەرمان هاتە پەسەندکرن',
        ]);
        factory(App\Status::class)->create([
            'Name_En' => 'Order Canceled',
            'Name_Ar' => 'تم إلغاء الطلب',
            'Name_Ku' => 'فەرمان هاتە راوەستان',
        ]);
    }
}
