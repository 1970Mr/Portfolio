<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin
    {--env-values : Read from environment file}
    {--reset : Reset users table}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin with env values or custom values';

    /**
     * Execute the console command.
     *
     * @return int
     */

    public function handle()
    {
        $this->resetUsersTable();

        if ($this->option('env-values')) {
            $name = config('admin.name');
            $email = config('admin.email');
            $password = config('admin.password');
        } else {
            $name = $this->ask('Enter the user name');
            $email = $this->ask('Enter the user email');
            $password = $this->secret('Enter the user password');
        }

        $validator = $this->validateData($name, $email, $password);
        if ($validator->fails())
            return Command::FAILURE;

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->info('User created successfully!');
        return Command::SUCCESS;
    }

    private function resetUsersTable()
    {
        if ($this->option('reset')) {
            User::truncate();
            $this->info('Users table reset successfully.');
        }
    }

    private function validateData($name, $email, $password)
    {
        Config::set('app.locale', 'en');
        $validator = Validator::make([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ], [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
        }

        return $validator;
    }
}
