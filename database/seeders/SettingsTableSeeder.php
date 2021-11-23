<?php
namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SettingsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('settings')->delete();
        $db_settings = [
            ['key' => 'site_name', 'value' => ''],
            ['key' => 'site_nickname', 'value' => ''],
            ['key' => 'site_email', 'value' => ''],
            ['key' => 'site_description', 'value' => ''],
            ['key' => 'site_keywords', 'value' => ''],
            ['key' => 'site_mentanance_msg', 'value' => ''],

            ['key' => 'site_logo', 'value' => ''],
            ['key' => 'site_icon', 'value' => ''],

            ['key' => 'site_status', 'value' => 1],
            ['key' => 'like_count', 'value' => 0],
            ['key' => 'share_count', 'value' => 0],
            ['key' => 'comment_count', 'value' => 0],

            
            ['key' => 'facebook_link', 'value' => ''],
            ['key' => 'twitter_link', 'value' => ''],
            ['key' => 'instgram_link', 'value' => ''],
            ['key' => 'linkedIn_link', 'value' => ''],
            ['key' => 'whatsapp_link', 'value' => ''],
        ];
        DB::table('settings')->insert($db_settings);
    }
}
