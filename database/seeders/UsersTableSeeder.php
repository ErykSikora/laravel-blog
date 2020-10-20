<?php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //PostFactory.php

        $factory = User::factory();
        $factory->admin()->create(); // generates user (type admin)
        $factory->count(3)->create(); // generates three regular users

    }
}
