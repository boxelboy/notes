<?php

use Illuminate\Database\Seeder;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notes')->insert([
            [
                'title' => 'Test note 1',
                'content' => 'Public note',
                'private' => 0,
            ],
            [
            'title' => 'Test note 2',
            'content' => 'Private note',
            'private' => 1,
            ]
        ]);
    }
}
