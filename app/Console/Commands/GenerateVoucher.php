<?php

namespace App\Console\Commands;

use App\User;
use App\Models\Voucher;
use App\Jobs\SendAdminEmail;
use Illuminate\Console\Command;
use App\Jobs\GenerateVoucher as JobsGenerateVoucher;
use App\Jobs\NotifySubscribers;
use Illuminate\Support\Facades\Bus;

class GenerateVoucher extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'voucher:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generating subscription vouchers';

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
        
        $user = User::admin()->first();

        $jobChains = [
            new JobsGenerateVoucher(),
            new SendAdminEmail($user),
            new NotifySubscribers()
        ];


        Bus::chain($jobChains)->dispatch();

        // foreach ($users as $user) {
        //     # code...
        // }


        $vouchers = Voucher::notSold()->count();

        $this->line(sprintf('%d Vouchers Generated', $vouchers));

        return 0;


    }
}
