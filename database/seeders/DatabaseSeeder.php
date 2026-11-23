<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User\User;
use App\Models\Course\Course;
use App\Models\Course\Assessment;
use App\Models\Course\Question;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::insert([
            ['usr_role' => 'admin', 'usr_name' => 'John Doe',    'usr_phoneNo' => '0123456789', 'usr_email' => 'john@gmail.com',    'usr_company' => 'ABC Technologies Sdn Bhd',    'usr_username' => 'johndoe',    'usr_password' => bcrypt('abc123'), 'usr_status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['usr_role' => 'user',  'usr_name' => 'Jane Smith',  'usr_phoneNo' => '0134567890', 'usr_email' => 'jane@gmail.com',    'usr_company' => 'XYZ Solutions Sdn Bhd',       'usr_username' => 'janesmith',  'usr_password' => bcrypt('abc123'), 'usr_status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['usr_role' => 'user',  'usr_name' => 'Michael Tan', 'usr_phoneNo' => '0145678901', 'usr_email' => 'michael@gmail.com', 'usr_company' => 'TechPro Sdn Bhd',             'usr_username' => 'michaeltan', 'usr_password' => bcrypt('abc123'), 'usr_status' => 'active', 'created_at' => now(), 'updated_at' => now()],
        ]);
        Course::insert([
            ['crs_title' => 'Web Development Fundamentals', 'crs_code' => 'WEB101', 'crs_category' => 'Programming', 'crs_thumbnail' => 'web-development.jpg', 'crs_type' => 'online', 'crs_price' => 199.00, 'crs_duration' => 30, 'crs_status' => 'active', 'crs_description' => 'Learn the fundamentals of HTML, CSS, JavaScript and web development.', 'created_at' => now(), 'updated_at' => now()],
            ['crs_title' => 'Introduction to Laravel', 'crs_code' => 'LAR201', 'crs_category' => 'Programming', 'crs_thumbnail' => 'laravel-course.jpg', 'crs_type' => 'online', 'crs_price' => 299.00, 'crs_duration' => 45, 'crs_status' => 'active', 'crs_description' => 'Learn Laravel framework, routing, controllers, models and database management.', 'created_at' => now(), 'updated_at' => now()],
            ['crs_title' => 'UI/UX Design Essentials', 'crs_code' => 'DES301', 'crs_category' => 'Design', 'crs_thumbnail' => 'uiux-design.jpg', 'crs_type' => 'physical', 'crs_price' => 150.00, 'crs_duration' => 20, 'crs_status' => 'active', 'crs_description' => 'Understand UI/UX principles, wireframing, prototyping and user experience design.', 'created_at' => now(), 'updated_at' => now()],
        ]);
        Assessment::insert([
            ['asm_crs_id' => 1, 'asm_title' => 'Web Development - Quiz 1',              'asm_totalQuestion' => '5', 'asm_timeLimit' => '30', 'asm_status' => 'active', 'asm_score' => '100', 'created_at' => now(), 'updated_at' => now()],
            ['asm_crs_id' => 1, 'asm_title' => 'Web Development - Final Assessment',    'asm_totalQuestion' => '3', 'asm_timeLimit' => '60', 'asm_status' => 'active', 'asm_score' => '80', 'created_at' => now(), 'updated_at' => now()],
            ['asm_crs_id' => 2, 'asm_title' => 'Laravel Fundamentals - Quiz 1',         'asm_totalQuestion' => '1', 'asm_timeLimit' => '45', 'asm_status' => 'active', 'asm_score' => '30', 'created_at' => now(), 'updated_at' => now()],
        ]);
        Question::insert([
            // Assessment ID 1 (5 questions)
            ['qst_asm_id' => 1, 'qst_order' => '1', 'qst_question' => 'What does HTML stand for?', 'qst_option_A' => 'Hyper Text Markup Language', 'qst_option_B' => 'High Text Machine Language', 'qst_option_C' => 'Hyper Transfer Markup Language', 'qst_option_D' => 'Home Tool Markup Language', 'qst_answer' => 'A', 'created_at' => now(), 'updated_at' => now()],
            ['qst_asm_id' => 1, 'qst_order' => '2', 'qst_question' => 'Which language is used to style web pages?', 'qst_option_A' => 'JavaScript', 'qst_option_B' => 'CSS', 'qst_option_C' => 'PHP', 'qst_option_D' => 'Python', 'qst_answer' => 'B', 'created_at' => now(), 'updated_at' => now()],
            ['qst_asm_id' => 1, 'qst_order' => '3', 'qst_question' => 'Which HTML tag is used to create a hyperlink?', 'qst_option_A' => '<link>', 'qst_option_B' => '<href>', 'qst_option_C' => '<a>', 'qst_option_D' => '<url>', 'qst_answer' => 'C', 'created_at' => now(), 'updated_at' => now()],
            ['qst_asm_id' => 1, 'qst_order' => '4', 'qst_question' => 'Which language makes web pages interactive?', 'qst_option_A' => 'CSS', 'qst_option_B' => 'HTML', 'qst_option_C' => 'SQL', 'qst_option_D' => 'JavaScript', 'qst_answer' => 'D', 'created_at' => now(), 'updated_at' => now()],
            ['qst_asm_id' => 1, 'qst_order' => '5', 'qst_question' => 'Which HTML tag is used for the largest heading?', 'qst_option_A' => '<h1>', 'qst_option_B' => '<h6>', 'qst_option_C' => '<head>', 'qst_option_D' => '<header>', 'qst_answer' => 'A', 'created_at' => now(), 'updated_at' => now()],

            // Assessment ID 2 (3 questions)
            ['qst_asm_id' => 2, 'qst_order' => '1', 'qst_question' => 'Which command starts a Laravel development server?', 'qst_option_A' => 'php artisan start', 'qst_option_B' => 'php artisan serve', 'qst_option_C' => 'php artisan run', 'qst_option_D' => 'php artisan launch', 'qst_answer' => 'B', 'created_at' => now(), 'updated_at' => now()],
            ['qst_asm_id' => 2, 'qst_order' => '2', 'qst_question' => 'Which file contains Laravel environment variables?', 'qst_option_A' => 'config.php', 'qst_option_B' => 'web.php', 'qst_option_C' => '.env', 'qst_option_D' => 'artisan.php', 'qst_answer' => 'C', 'created_at' => now(), 'updated_at' => now()],
            ['qst_asm_id' => 2, 'qst_order' => '3', 'qst_question' => 'Which Artisan command creates a model?', 'qst_option_A' => 'php artisan make:model', 'qst_option_B' => 'php artisan create:model', 'qst_option_C' => 'php artisan model:new', 'qst_option_D' => 'php artisan generate:model', 'qst_answer' => 'A', 'created_at' => now(), 'updated_at' => now()],

            // Assessment ID 3 (1 question)
            // ['qst_asm_id' => 3, 'qst_order' => '1', 'qst_question' => 'Which command is used to create a Laravel controller?', 'qst_option_A' => 'php artisan make:model', 'qst_option_B' => 'php artisan make:migration', 'qst_option_C' => 'php artisan make:controller', 'qst_option_D' => 'php artisan make:middleware', 'qst_answer' => 'C', 'created_at' => now(), 'updated_at' => now()],
        ]);

    }
}
