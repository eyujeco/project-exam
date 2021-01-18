<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Thread;
use Carbon\Carbon;

class ThreadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('threads')->insert([
            [
                'user_id' => "1",
                'threadtitle' => "Sample Thread 1",
                'threaddetails' => "sample description",
                'slug' => "sample-thread-1",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => "1",
                'threadtitle' => "Sample Thread 2",
                'threaddetails' => "sample description 2",
                'slug' => "sample-thread-2",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => "1",
                'threadtitle' => "Sample Thread 3",
                'threaddetails' => "sample description3",
                'slug' => "sample-thread-3",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]           
        ]);
    }
}
