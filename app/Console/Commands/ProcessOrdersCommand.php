<?php

namespace App\Console\Commands;

use App\Mail\TodayOrdersMail;
use App\Models\Orders;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class ProcessOrdersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:process';

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
        $orders = Orders::whereDate('created_at', Carbon::today())->get();
        Mail::to('susicuros@gmail.com')->send(new TodayOrdersMail($orders));

        return 0;
    }
}
