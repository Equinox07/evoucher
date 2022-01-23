<?php

namespace Database\Seeders;

use Keygen\Keygen;
use App\Models\Voucher;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->generateVoucher();
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
