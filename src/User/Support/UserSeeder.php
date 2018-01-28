<?php
namespace Virtuagym\User\Support;

use Illuminate\Database\Seeder;
use Virtuagym\User\Entity\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        factory(User::class, 10)->create();
    }
}
