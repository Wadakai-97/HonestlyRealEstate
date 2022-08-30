<?php

namespace App\Console\Commands;

use App\Models\Mansion;
use App\Models\BatchJob;
use Illuminate\Console\Command;

class MansionCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:mansioncount';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'マンションの物件数をカウントする。';

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
        $mansions = Mansion::count();
        $batch_job = new BatchJob;
        $batch_job = fill({
            'conditions_of_transactions' => $request->conditions_of_transactions,
        });
        $batch_job->save();
    }
}
