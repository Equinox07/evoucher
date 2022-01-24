<?php

namespace Tests\Feature;

use App\Models\Schools;
use Tests\TestCase;
use App\Models\Student;
use App\Models\Voucher;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;

class StudentTest extends TestCase
{
	use RefreshDatabase;
	

	/**
	 * Index
	 *
	 * @return void
	 */
	public function testIndex()
	{
		Student::factory()->count(3)->create();

		$response = $this->json('GET', '/api/students', []);

		$response->assertOk()->assertJson(fn ( AssertableJson $json) => $json->has('data'));
	}


	/**
	 * Store
	 *
	 * @return void
	 */
	public function testStore()
	{
		$voucher = Voucher::factory()->create();

		$school = Schools::factory()->create();

		$student = Student::factory()->create()->toArray();

		$student['voucher_id'] = $voucher->id;
		$student['school_id'] = $school->id;

		$response = $this->json('POST', '/api/students', $student);

		$response->assertOk()->assertJson(fn (AssertableJson $json) =>
		$json->has('token'));


	}

	/**
	 * Show
	 *
	 * @return void
	 */
	public function testStoreWithError()
	{

		$data = [
			'firstname' => 'Jon',
			'lastname' => 'Doe'
		];

		$response = $this->json('POST', '/api/students', $data);

		$response->assertStatus(401);
	}
	/**
	 * Show
	 *
	 * @return void
	 */
	public function testShowWithError()
	{
		$response = $this->json('GET', '/api/students/{student}', []);

		$response->assertStatus(400);
	}

	/**
	 * Show
	 *
	 * @return void
	 */
	public function testShow()
	{
		$response = $this->json('GET', '/api/students/{student}', []);

		$response->assertStatus(200);
	}

	/**
	 * Update
	 *
	 * @return void
	 */
	public function testUpdateWithError()
	{
		$response = $this->json('PUT', '/api/students/{student}', []);

		$response->assertStatus(400);
	}

	/**
	 * Update
	 *
	 * @return void
	 */
	public function testUpdate()
	{
		$response = $this->json('PUT', '/api/students/{student}', []);

		$response->assertStatus(200);
	}
	/**
	 * Destroy
	 *
	 * @return void
	 */
	public function testDestroyWithError()
	{
		$response = $this->json('DELETE', '/api/students/{student}', []);

		$response->assertStatus(400);
	}

	/**
	 * Destroy
	 *
	 * @return void
	 */
	public function testDestroy()
	{
		$response = $this->json('DELETE', '/api/students/{student}', []);

		$response->assertStatus(200);
	}

	/**
	 * A basic unit test example.
	 *
	 * @return void
	 */
	public function testStudentHasAVoucher()
	{
		$voucher = Voucher::factory()->create();

		$student = Student::factory()->create();

		$student->vouchers()->attach($voucher->id);

		$this->assertEquals(1, $student->vouchers()->count());
	}
	/**
	 * A basic unit test example.
	 *
	 * @return void
	 */
	public function testStudentHasASchool()
	{

		$school = Schools::factory()->create();

		$student = Student::factory()->create();

		$student->details()->create(['school_id' => $school->id]);

		$this->assertDatabaseHas('students_details', ['school_id' => $school->id, 'student_id' => $student->id]);
	}
}
