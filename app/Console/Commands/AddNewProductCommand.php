<?php

namespace App\Console\Commands;

use App\Models\Products;
use Illuminate\Console\Command;

class AddNewProductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:addNew {name} {price} {amount} {categoryId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new product to products';

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
        $name = $this->argument('name');
        $price = $this->argument('price');
        $amount = $this->argument('amount');
        $categoryId = $this->argument('categoryId');
        Products::addProduct($name, $price, $amount, $categoryId);

        return 0;
    }
}
