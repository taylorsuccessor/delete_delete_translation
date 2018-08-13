<?php
namespace App\module\upload_file\job;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;



use App\module\upload_file\model\UploadFile ;
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
        $resultCollection=UploadFile ::where('created_at','>=',now()->subDay(4))->get();

        if(count($resultCollection)){
            notification('upload_file_check_new',[
                'user'=>User::where('email',config('module.admin_to_notify_email'))->first(),
                'newNumber'=>count($resultCollection),
            ]);
        }

    }
}
