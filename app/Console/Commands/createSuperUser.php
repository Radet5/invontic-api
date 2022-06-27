<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class createSuperUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:createSuperUser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a superuser and grants them all permissions';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->ask('Enter an email');
        $username = $this->anticipate('Enter a name', ['superadmin']);
        $password = $this->secret('password? (leave blank to auto generate)');
        $generatedPassword = false;
        if(!$password) {
            $password = $this->generatePassword(16);
            $generatedPassword = true;
        }

        $user = User::create(["name"=>$username, "email"=>$email, "password"=> \Hash::make($password)]);

        // output their password if necessary
        if($generatedPassword){
            $this->line("Your Generated Password is:");
            $this->line($password);
        }

        \Bouncer::assign('superadmin')->to($user);
        $this->line("Superuser created!");
        return Command::SUCCESS;
    }

    protected function getRandomBytes($nbBytes = 32)
    {
        $bytes = openssl_random_pseudo_bytes($nbBytes, $strong);
        if (false !== $bytes && true === $strong) {
            return $bytes;
        }
        else {
            throw new \Exception("Unable to generate secure token from OpenSSL.");
        }
    }

    protected function generatePassword($length){
        return substr(preg_replace("/[^a-zA-Z0-9]/", "", base64_encode($this->getRandomBytes($length+1))),0,$length);
    }
}
