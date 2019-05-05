<?php

use App\Events\Inst;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        // Create admin account
        DB::table('users')->insert([
            'usertype' => 'Admin',
            'first_name' => 'John',
            'last_name' => 'Deo',            
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'image_icon' => 'admin',
            'remember_token' => str_random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
        DB::table('widgets')->insert([
            'footer_widget1_title' => 'About Restaurant',
            'footer_widget1_desc' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'footer_widget2_title' => 'Recent Tweets',
            'footer_widget2_desc' => '',
            'footer_widget3_title' => 'Contact Info',
            'footer_widget3_address' => 'Lorem Ipsum is simply dummy text of the printing Lorem Ipsum is simply dummy text of the printing',
            'footer_widget3_phone' => '+01 123 456 78',
            'footer_widget3_email' => 'demo@example.com',
            'about_title' => 'About Us',
            'about_desc' => 'Aenean ultricies mi vitae est. Mauris placerat eleifend leosit amet est.',
            'need_help_title' => 'Need Help?',
            'need_help_phone' => '+61 3 8376 6284',
            'need_help_time' => 'Monday to Friday 9.00am - 7.30pm'
             
        ]);
        
        DB::table('settings')->insert([            
            'site_name' => 'Viavi Food Delivery',
            'currency_symbol' => '$',
            'site_email' => 'admin@admin.com',
            'site_logo' => 'logo.png',
            'site_favicon' => 'favicon.png',
            'site_description' => 'Viavi - Food Delivery Script Viavi - Food Delivery is an laravel script for Delivery Restaurants',
            'site_copyright' => 'Copyright © 2016 Viavi - Food Delivery Script. All Rights Reserved.',
            'home_slide_image1' => 'home_slide_image1.png',
            'home_slide_image2' => 'home_slide_image2.png',
            'home_slide_image3' => 'home_slide_image3.png',
            'page_bg_image' => 'page_bg_image.png',
            'total_restaurant' => '2550',
            'total_people_served' => '5355',
            'total_registered_users' => '12454'
        ]);
         
        DB::table('restaurant_types')->insert([
            'type' => 'American',
            'type_image' => 'American_1458535213'
        ]);
        
        DB::table('restaurant_types')->insert([
            'type' => 'Chinese',
            'type_image' => 'Chinese_1458535609'
        ]);

        DB::table('restaurant_types')->insert([
            'type' => 'Indian',
            'type_image' => 'Indian_1458535662'   
        ]);

        DB::table('restaurant_types')->insert([
            'type' => 'Mexican',
            'type_image' => 'Mexican_1458535796'
        ]);

        DB::table('restaurant_types')->insert([
            'type' => 'Pizza',
            'type_image' => 'Sushi_1458535621'
        ]);

        DB::table('restaurant_types')->insert([
            'type' => 'Sushi',
            'type_image' => 'Thai_1458535292'
        ]); 
        
       // factory('App\User', 20)->create();
    }
}
