<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class otp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'forget:otp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Forget otp';

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
             session()->forget('otp'); 
             
    }
}
