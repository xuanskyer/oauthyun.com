<?php

use Illuminate\Database\Seeder;
use App\Models\TestModel as Test;
class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('test')->delete();

        for ($i=0; $i < 10; $i++) {
            Test::create([
                'title'   => 'Title '.$i,
                'body'    => 'Body '.$i,
            ]);
        }
    }
}
