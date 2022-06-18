<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\Question;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<=20; $i++) {
            News::create([
                'title' => 'This is news title ' . $i,
                'content' => '<p>Here comes some content u may like</p><a href="https://github.com/XuZhixuan">看看沙雕</a>',
                'cover' => 'https://www.acgtubao.com/wp-content/uploads/2021/10/yande809410-544x1024.jpg'
            ]);
            Question::create([
                'question' => $i . ' == ' . $i . '?',
                'answer' => $i & 1 ? 'yes' : null,
                'show' => $i & 1,
                'weight' => random_int(1, 20)
            ]);
        }
    }
}
