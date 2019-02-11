<?php

use Illuminate\Database\Seeder;

class CourseStudentNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course_student_numbers')->insert([
            'id' => 1,
            'A1' => 0,
            'A2' => 0,
            'B1' => 0,
            'B2' => 0,
            'C1' => 0,
            'C1+' => 0,
            'YOS' => 0,
            'Other' => 0,
        ]);
    }
}
