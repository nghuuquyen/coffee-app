<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;

class QueryBuilderPlayground extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:query-builder-playground';

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
        $categories = Category::query()->with('products')->get();

        foreach ($categories as $cateory) {
            dump('Category name: '.$cateory->name);
            dump('Total products: '.count($cateory->products));

            foreach($cateory->products as $product) {
                dump('--- Product name: '.$product->name);
            }

            dump('--------------------------------------------');
        }
    }
}
