<?php

namespace Tests\Integration\Models;

use App\Models\Schools;
use App\Models\Student;
use App\Models\Voucher;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class StudentModelTest extends TestCase
{
    use RefreshDatabase, WithFaker;

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
