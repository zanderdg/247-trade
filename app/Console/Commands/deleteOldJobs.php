<?php

namespace App\Console\Commands;

use App\Models\Job;
use Illuminate\Console\Command;

class deleteOldJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:old-jobs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete jobs which are posted week ago';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        
        $todayMinusOneWeekAgo = \Carbon\Carbon::today()->subWeek();
        $jobs = Job::where('created_at', '<', $todayMinusOneWeekAgo)->get();
        if(count($jobs) > 0) {
            $this->comment("Total jobs: ".count($jobs));
            foreach($jobs as $job) {
                $job->delete();
            }
            $this->info("Jobs deleted Successfully.");
        } else {
            $this->info("No jobs are able to delete.");
        }
    }
}
