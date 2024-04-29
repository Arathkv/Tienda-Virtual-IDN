<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::deleteDirectory('products');
        Storage::makeDirectory('products');

        $role = Role::create(['name' => 'admin']);
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'last_name' => 'User',
            /*'document_type' => '1',
            'document_number' => '87654321',*/
            'email' => 'admin@gmail.com',
            'phone' => '9171100253',
            'password' => bcrypt('R3f9L2NZ')
        ])->assignRole('admin');

        $this->call([
            FamilySeeder::class,
            optionSeeder::class,
        ]);

        Product::factory(150)->create();
    }
}
