<?php

namespace Tests\Feature;

use App\Models\Schools;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;

class SchoolTest extends TestCase
{
	use RefreshDatabase;
	/**
	 * Index
	 *
	 * @return void
	 */
	public function testIndexWithError()
	{
		$response = $this->json('GET', '/api/schools', []);

		$response->assertStatus(400);

	}

	/**
	 * Index
	 *
	 * @return void
	 */
	public function testIndex()
	{
		$response = $this->json('GET', '/api/schools', []);

		$response->assertStatus(200)->assertJsonStructure([
			'data' => [
				'*' => ['id', 'name', 'code']
			]
		]);

	}

	/**
	 * Store
	 *
	 * @return void
	 */
	public function testStoreWithError()
	{
		$response = $this->json('POST', '/api/schools', []);

		$response->assertStatus(400);

	}

	/**
	 * Store
	 *
	 * @return void
	 */
	public function testStore()
	{

		$school = Schools::factory()->create()->toArray();

		$response = $this->json('POST', '/api/schools', $school);

		$response->assertStatus(201)->assertJson(fn (AssertableJson $json) => 
		$json->hasAny('name'));

	}

}
