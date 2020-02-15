<?php

use App\Document;
use App\Organisation;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organisations')->truncate();
        DB::table('documents')->truncate();
        DB::table('users')->truncate();

        $user = factory(User::class)->create([
            'name' => 'Tony Messias',
            'email' => 'tony@example.com',
        ]);

        factory(Organisation::class)->times(20)->create();
        factory(Document::class)->times(4)->create([
            'creator_user_id' => $user,
        ]);
        factory(Document::class)->times(15)->create();
    }
}
