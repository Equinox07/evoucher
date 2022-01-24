<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use UserTableSeeder;
use App\Models\Voucher;
use App\Jobs\SendAdminEmail;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Jobs\GenerateVoucher as JobsGenerateVoucher;
use App\Jobs\NotifySubscribers;
use Illuminate\Support\Facades\Queue;

class GenerateVoucherCommandTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGenerateVoucher()
    {
        Mail::fake();

        $this->seed(UserTableSeeder::class);

        $user = User::admin()->first();

        Voucher::factory()->count(5)->create();

        $vouchers = Voucher::notSold()->count();

     
        $this->artisan('voucher:generate')
        ->expectsOutput("Vouchers Generated")
        ->assertExitCode(0);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGenerateVoucherAndDispatchJobs()
    {
        Bus::fake();
        Mail::fake();

        $this->seed(UserTableSeeder::class);

        $user = User::admin()->first();

        Bus::assertChained([
            new JobsGenerateVoucher,
            new SendAdminEmail($user),
            new NotifySubscribers
        ]);
        

     
        $this->artisan('voucher:generate')
        ->expectsOutput("Vouchers Generated")
        ->assertExitCode(0);
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGenerateVoucherQueue()
    {
        Bus::fake();
        Mail::fake();

        $this->seed(UserTableSeeder::class);

        $user = User::admin()->first();

    
        Bus::assertDispatched(GenerateVoucher::class);

        Queue::assertPushedWithChain(GenerateVoucher::class, [
            SendAdminEmail::class,
            NotifySubscribers::class
        ]);
        

     
        $this->artisan('voucher:generate')
        ->expectsOutput("Vouchers Generated")
        ->assertExitCode(0);
    }
}
