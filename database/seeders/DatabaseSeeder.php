<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\ClientRepository;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear o encontrar los usuarios
        $user1 = User::firstOrCreate(
            ['email' => 'test@scribe.com'],
            [
                'name' => 'User Scribe',
                'password' => Hash::make('123456')
            ]
        );

        $user2 = User::firstOrCreate(
            ['email' => 'test@prex.com'],
            [
                'name' => 'Test Prex',
                'password' => Hash::make('123456')
            ]
        );

        // Crear clientes de Passport
        $clientRepository = new ClientRepository();

        // Crear un cliente de acceso personal
        $personalAccessClient = $clientRepository->createPersonalAccessClient(
            null, 'Personal Access Client', 'http://localhost'
        );

        // Crear un cliente de concesión de contraseña
        $passwordGrantClient1 = $clientRepository->createPasswordGrantClient(
            $user1->id, 'Scribe API Client', ''
        );

        $passwordGrantClient2 = $clientRepository->createPasswordGrantClient(
            $user2->id, 'Prex API Client', ''
        );

        // Actualizar el archivo .env con las credenciales del cliente de acceso personal
        $this->updateEnvFile($personalAccessClient->id, $personalAccessClient->secret);
    }

    protected function updateEnvFile($clientId, $clientSecret)
    {
        $path = base_path('.env');

        if (File::exists($path)) {
            $env = File::get($path);

            $env = preg_replace('/^PASSPORT_PERSONAL_ACCESS_CLIENT_ID=.*$/m', "PASSPORT_PERSONAL_ACCESS_CLIENT_ID={$clientId}", $env);
            $env = preg_replace('/^PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET=.*$/m', "PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET={$clientSecret}", $env);

            if (!preg_match('/^PASSPORT_PERSONAL_ACCESS_CLIENT_ID=.*$/m', $env)) {
                $env .= "\nPASSPORT_PERSONAL_ACCESS_CLIENT_ID={$clientId}";
            }

            if (!preg_match('/^PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET=.*$/m', $env)) {
                $env .= "\nPASSPORT_PERSONAL_ACCESS_CLIENT_SECRET={$clientSecret}";
            }

            File::put($path, $env);
        }
    }
}
