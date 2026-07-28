<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Shield\Entities\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        $users = auth()->getProvider(); // Shield's UserModel (your extended version)

        // Change these before running, especially the password
        $username = 'admin123';
        $email    = 'admin@example.com';
        $password = 'ChangeThisPassword123!';
        $role     = 'superadmin'; // must match a real group name in your Shield config

        // Skip if this user already exists, so re-running the seeder is safe
        $existing = $users->findByCredentials(['email' => $email]);
        if ($existing) {
            echo "User with email {$email} already exists — skipping.\n";
            return;
        }

        // 1. Create and save the user first (no identity yet)
        $user = new User([
            'username'   => $username,
            'active'     => 1,
            'first_name' => 'Super',
            'last_name'  => 'Admin',
        ]);

        $users->save($user);

        // 2. Re-fetch to get a real id
        $newUser = $users->find($users->getInsertID());

        // 3. Now attach the email/password identity
        $newUser->createEmailIdentity([
            'email'    => $email,
            'password' => $password,
        ]);

        // 4. Assign role
        $newUser->syncGroups($role);

        echo "Admin user created: {$email} / username: {$username}\n";
    }
}