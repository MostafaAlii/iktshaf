<?php
namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SettingsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('settings')->truncate();
        $setting_data = Setting::create([
            'site_name' => 'موقع اكتشاف',
            'site_nickname' => 'Iktshaf',
            'site_email' => 'iktshaf@app.com',

            'site_logo' => '',
            'site_icon' => '',

            'like_count'  =>  0,
            'share_count'  =>  0,
            'comment_count'  =>  0,

            'facebook_link'  =>  '',
            'twitter_link'  =>  '',
            'instgram_link'  =>  '',
            'linkedIn_link'  =>  '',
            'whatsapp_link'  =>  '',

            'site_description' => '',
            'site_keywords' => '',
            'site_mentanance_msg'   =>  ''
        ]);
    }
}
