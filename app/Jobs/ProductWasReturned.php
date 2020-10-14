<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Http\Request;
use App\Http\Services\SaleService;
use App\Http\Services\StockService;
use App\Models\Product;
use App\Repository\Eloquent\ProductRepository;

class ProductWasReturned implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Product
     */
    protected $product;

    /**
     * @var int
     */
    protected $quantity;

    /**
     * @var int
     */
    protected $saleId;

    /**
     * Create a new job instance.
     *
     * @param Product $product
     * @param integer $quantity
     * @param integer $saleId
     */
    public function __construct(Product $product, int $quantity, int $saleId)
    {
        $this->product = $product;
        $this->quantity = $quantity;
        $this->saleId = $saleId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(StockService $stockService, ProductRepository $productRepository)
    {
        // remove product quantity
        $productRepository->update($this->product->id, [
            'quantity' => $this->product->quantity + $this->quantity
        ]);

        // log remove item from stock
        $stockService->store([
            'description' => "Produto retornado, venda id: #{$this->saleId}",
            'quantity' => $this->quantity,
            'product_id' => $this->product->id
        ]);
    }
}
