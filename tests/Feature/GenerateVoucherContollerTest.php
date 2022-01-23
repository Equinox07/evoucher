<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GenerateVoucherContollerTest extends TestCase
{
	/**
	 * GenerateVoucher
	 *
	 * @return void
	 */
	public function testGenerateVoucherWithError()
	{
		$response = $this->json('POST', '/api/generate_code', []);

		$response->assertStatus(400);

	}

	/**
	 * GenerateVoucher
	 *
	 * @return void
	 */
	public function testGenerateVoucher()
	{
		$response = $this->json('POST', '/api/generate_code', []);

		$response->assertStatus(200);

	}

}
