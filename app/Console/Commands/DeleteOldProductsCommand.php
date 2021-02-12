<?php

namespace App\Console\Commands;

use App\Models\ProductLog;
use App\Models\Products;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeleteOldProductsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:delete_old';

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
        $this->info('started command');
        $products = Products::getOutOfStockProducts();
        foreach ($products as $product)
        {
            DB::transaction(function () use ($product){
               ProductLog::create([
                  'product_id' => $product->id,
                  'user_id' => 0,
                  'action' => 'deleted',
               ]);
               $product->delete();
            });
        }
        if (count($products) == 0)
        {
            $this->error('Svih proizvoda ima na stanju');
        }
        $this->info('ended command');
        return 0;
    }
}
