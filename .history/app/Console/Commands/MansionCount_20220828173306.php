<?php

namespace App\Console\Commands;

use App\Models\Mansion;
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
        Log::info('現在の物件数は' . $mansions . '件です。');
    }
}