<?php

namespace App\Jobs;

use Keygen\Keygen;
use App\Models\Voucher;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Queue\Middleware\WithoutOverlapping;
use Illuminate\Support\Facades\Log;

class GenerateVoucher implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 5;
    public $maxException = 2;

    public $voucher;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
      
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->generateVoucher();
    }

    public function middlware()
    {
        return [
            new WithoutOverlapping('vouchers')
        ];
    }

    public function failed($e)
    {
        info("Failed Generating Voucher");
    }

    public function generateVoucher()
    {
        $splitStrings = function ($key) {
            return \join('-', str_split($key, 4));
        };

        $strToUpper = function ($key) {
            return \strtoupper($key);
        };

        do {
            $codeGen = Keygen::alphanum(16)->generate($splitStrings, $strToUpper);
        } while (Voucher::where("voucher_code", $codeGen)->count() > 0);


        Voucher::create([
            'serial_no' => Str::uuid(),
            'voucher_code' => $codeGen
        ]);

    }
}
