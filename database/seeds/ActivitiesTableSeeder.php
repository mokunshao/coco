<?php

use App\Activity;
use Illuminate\Database\Seeder;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersId = [1, 2, 3];
        $faker = app(Faker\Generator::class);
        $activities = factory(Activity::class)
            ->times(50)
            ->make()
            ->each(function ($activity) use ($faker, $usersId) {
                $activity->user_id = $faker->randomElement($usersId);
            });

        Activity::insert($activities->toArray());
    }
}
