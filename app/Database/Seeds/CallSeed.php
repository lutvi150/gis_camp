<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CallSeed extends Seeder
{
    public function run()
    {
        $this->call('UserSeeder');
    }
}
