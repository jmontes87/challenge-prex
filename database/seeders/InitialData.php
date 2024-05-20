<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class InitialData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $scribeUser = new User();
        $scribeUser->email = 'info@scribe.com';
        $scribeUser->name = 'Scribe';
        $scribeUser->password = bcrypt('info@scribe.com');
        $scribeUser->save();

        $token = $scribeUser->createToken('ScribeToken')->accessToken;
        echo $token;
    }
}
