<?php

use Illuminate\Database\Seeder;

use App\Models\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $set = new Setting();
        $set->blog_name = 'Droidtronix';
        $set->blog_title = 'Open source technologies for developers and geeks';
        $set->blog_description = 'Droidtronix is simple blog on modern open source technologies';

        $set->save();
    }
}
