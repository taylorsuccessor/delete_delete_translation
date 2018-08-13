<?php
namespace App\module\project\job;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;



use App\module\project\model\Project ;
use App\module\user\model\User;

class CheckNew implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $resultCollection=Project ::where('created_at','>=',now()->subDay(4))->get();

        if(count($resultCollection)){
            notification('project_check_new',[
                'user'=>User::where('email',config('module.admin_to_notify_email'))->first(),
                'newNumber'=>count($resultCollection),
            ]);
        }

    }
}
