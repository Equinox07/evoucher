<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminDashboardTest extends TestCase
{
	/**
	 * LoadStats
	 *
	 * @return void
	 */
	public function testLoadStatsWithError()
	{
		$response = $this->json('GET', '/api/admin_dashboard_stats', []);

		$response->assertStatus(400);

	}

	/**
	 * LoadStats
	 *
	 * @return void
	 */
	public function testLoadStats()
	{
		$response = $this->json('GET', '/api/admin_dashboard_stats', []);

		$response->assertStatus(200)
				->assertJsonFragment([
					
				]);

	}

}
