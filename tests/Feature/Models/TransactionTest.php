<?php

namespace Tests\Feature\Models;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    use RefreshDatabase;

    public function test_transaction_factory_creates_user_and_transaction(): void
    {
        $transaction = Transaction::factory()->create();

        $this->assertModelExists($transaction);
        $this->assertModelExists($transaction->user);
        $this->assertSame('completed', $transaction->status);
    }

    public function test_transaction_detail_factory_creates_transaction_and_product(): void
    {
        $detail = TransactionDetail::factory()->create();

        $this->assertModelExists($detail);
        $this->assertInstanceOf(Transaction::class, $detail->transaction);
        $this->assertInstanceOf(Product::class, $detail->product);
        $this->assertInstanceOf(User::class, $detail->transaction->user);
        $this->assertSame($detail->transaction_id, $detail->transaction->id);
    }
}
