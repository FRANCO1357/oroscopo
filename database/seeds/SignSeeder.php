<?php

use App\Models\sign;

use Illuminate\Database\Seeder;

class SignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $signs = config('signs');

        foreach($signs as $sign){
            $new_sign = new sign();
            $new_sign->name = $sign['name'];
            $new_sign->start_date = $sign['start-date'];
            $new_sign->end_date = $sign['end-date'];
            $new_sign->save();
        }
    }
}
