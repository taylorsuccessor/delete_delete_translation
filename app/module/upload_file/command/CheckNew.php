<?php
namespace App\module\upload_file\command;

use Illuminate\Console\Command;
use App\module\upload_file\job\CheckNew as jCheckNew;

class CheckNew extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upload_file:check_new';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        jCheckNew::dispatch()
            ->allOnQueue('default');


    }
}
