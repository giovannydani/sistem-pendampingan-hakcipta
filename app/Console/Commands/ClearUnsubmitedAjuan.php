<?php

namespace App\Console\Commands;

use App\Models\DetailHakcipta;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ClearUnsubmitedAjuan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear-unsubmited-ajuan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $date = Carbon::yesterday()->startOfDay();
        DetailHakcipta::where('created_at', '<', $date)->where('is_submited', 0)->delete();
        echo "success";
    }
}
