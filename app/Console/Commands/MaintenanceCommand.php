<?php

namespace App\Console\Commands;

use App\Models\MaintenanceLogs;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MaintenanceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maintenance:toggle {user_id} {toggle}';

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
     * @return int
     */
    public function handle()
    {
     $user_id = $this->argument('user_id');
     $toggle = $this->argument('toggle');
     $toggle = $toggle=='true'?true:false;
     if ($toggle == true){
         Artisan::call('down');
     }else{
         Artisan::call('up');
     }
     MaintenanceLogs::toggle($user_id, $toggle);
        return 0;
    }
}
