<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentAuthTest extends TestCase
{
	use RefreshDatabase;
	/**
	 * Login
	 *
	 * @return void
	 */
	public function testLoginWithError()
	{
		$response = $this->json('POST', '/api/student_login', []);

		$response->assertStatus(400);

	}

	/**
	 * Login
	 *
	 * @return void
	 */
	public function testLogin()
	{
		$response = $this->json('POST', '/api/student_login', []);

		$response->assertStatus(200);

	}

}
