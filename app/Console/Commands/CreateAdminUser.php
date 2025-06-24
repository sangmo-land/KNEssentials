<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-admin-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an admin';

    /**
     * Execute the console command.
     */
    public function handle()
        {
                $user = new User();
                $user->name = 'Admin User 2';
                $user->email = 'admin@example2.com';
                $user->password = Hash::make('secure_password');
                $user->is_admin = true;
                $user->save();
        

            $this->info('Admin user created successfully!');
            $this->info('Email: ' . $user->email);
            $this->info('Admin: ' . ($user->is_admin ? 'Yes' : 'No'));
        }
}
