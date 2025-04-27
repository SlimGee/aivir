<?php

namespace Database\Seeders;

use App\Models\Call;
use App\Models\User;
use Illuminate\Database\Seeder;

class CallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $startOfmonth = now()->startOfMonth();

        collect(range(0, 29))->each(function ($day) use ($startOfmonth) {
            $created_at = $startOfmonth->addDay($day);

            Call::factory(random_int(30, 100))->create([
                'user_id' => User::first()->id,
                'created_at' => $created_at,
            ]);
        });
    }
}
