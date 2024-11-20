<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
                    //  Ticketing::factory(10)->create();

        $this->call([
            UsersTableSeeder::class,
            // User::factory(10)->create(),
            TicketingsTableSeeder::class,
        ]);


        Permission::create(['name' => 'edit ticket']);
        Permission::create(['name' => 'delete ticket']);

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(['edit ticket', 'delete ticket']);

        $user = User::find(1);
        $user->assignRole('admin');
        $user->givePermissionTo('edit ticket');


        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
