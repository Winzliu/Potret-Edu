<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\cart;
use App\Models\discount;
use App\Models\history;
use App\Models\historyDetail;
use App\Models\menu;
use App\Models\menuCategory;
use App\Models\order;
use App\Models\orderDetail;
use App\Models\paymentMethod;
use App\Models\User;
use App\Models\userDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'user_id'  => fake()->uuid(),
            'username' => 'admin',
            'password' => '$2y$10$UdKwDqcK2TG1C754y70p1u0vmupNufxvNbUtifxJjHr5ZiAcsyi5O',
            'role'     => 'admin',
        ]);
        User::factory()->create([
            'user_id'  => fake()->uuid(),
            'username' => 'waiter',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role'     => 'waiter',
        ]);
        User::factory()->create([
            'user_id'  => fake()->uuid(),
            'username' => 'cashier',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role'     => 'cashier',
        ]);
        User::factory()->create([
            'user_id'  => fake()->uuid(),
            'username' => 'kitchen',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role'     => 'kitchen',
        ]);

        userDetail::factory(4)->create();
    //     discount::factory(3)->create();
    //     menuCategory::factory(5)->create();
    //     menu::factory(40)->create();
    //     order::factory(20)->create();
    //     orderDetail::factory(200)->create();
    //     history::factory(30)->create();
    //     historyDetail::factory(80)->create();
    //     cart::factory(10)->create();

    //     paymentMethod::factory()->create([
    //         'payment_method_id' => Str::uuid(),
    //         'method'            => 'Cash',
    //         'taxes'             => 0,
    //     ]);
    //     paymentMethod::factory()->create([
    //         'payment_method_id' => Str::uuid(),
    //         'method'            => 'QRIS',
    //         'taxes'             => 0,
    //     ]);
    //     paymentMethod::factory()->create([
    //         'payment_method_id' => Str::uuid(),
    //         'method'            => 'BRI',
    //         'taxes'             => 0.02,
    //     ]);
    //     paymentMethod::factory()->create([
    //         'payment_method_id' => Str::uuid(),
    //         'method'            => 'BCA',
    //         'taxes'             => 0,
    //     ]);
    }
}