<?php



namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateSlug extends Command
{
    // اسم الأمر الذي ستكتبه في التيرمنال
    protected $signature = 'make:slug {title}';

    // وصف الأمر
    protected $description = 'Generate a URL-friendly slug from a title';

    public function handle()
    {
        $title = $this->argument('title');

        // استخدام Laravel Helper (Str::slug) الذي يطبق القواعد المطلوبة تلقائياً
        $slug = Str::slugCustom($title);

        $response = [
            'original_title' => $title,
            'slug' => $slug,
            'status' => 'success'
        ];

        // طباعة النتيجة بصيغة JSON في التيرمنال
        $this->line(json_encode($response, JSON_PRETTY_PRINT));
        
        return 0;
    }
}





// namespace App\Console\Commands;

// use Illuminate\Console\Attributes\Description;
// use Illuminate\Console\Attributes\Signature;
// use Illuminate\Console\Command;

// #[Signature('app:generate-slug')]
// #[Description('Command description')]
// class GenerateSlug extends Command
// {
//     /**
//      * Execute the console command.
//      */
//     public function handle()
//     {
//         //
//     }
// }
