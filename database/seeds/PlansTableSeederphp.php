<?php

use Illuminate\Database\Seeder;

class PlansTableSeederphp extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            ['title' => 'Baby', 'description' => 'Basic Description', 'stripe_plan_id' => 'plan_EJPHFRwmiXHbHy', 'scope' => '$30.00 USD / month'],
            ['title' => 'Kid', 'description' => 'Intermediate Description', 'stripe_plan_id' => 'plan_EJPM7kfMon7EU1', 'scope' => '$75.00 USD every 3 months'],
            ['title' => 'Young', 'description' => 'Advance Description', 'stripe_plan_id' => 'plan_EJPQgnJvbySYw7', 'scope' => '$150.00 USD every 6 months'],
            ['title' => 'Legend', 'description' => 'Expert Description', 'stripe_plan_id' => 'plan_EJPS8AWOu3EH2w', 'scope' => '$200.00 USD / year']
        ]);
    }
}
