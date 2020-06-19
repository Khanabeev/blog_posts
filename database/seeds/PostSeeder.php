<?php

use Illuminate\Database\Seeder;
use App\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Post::class,5)->create();
        factory(\App\Post::class)->create([
            'title' => 'My favorite post',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut blandit mauris, quis ornare odio. Fusce magna quam, maximus id iaculis et, accumsan eu leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam rutrum dui ac leo imperdiet fermentum. Nam eros ante, pharetra nec urna iaculis, lobortis feugiat nibh. Maecenas arcu ligula, auctor ac ipsum eget, scelerisque efficitur lacus. Maecenas bibendum mauris sit amet mauris imperdiet, in scelerisque arcu vulputate. Praesent id massa tempor erat sodales dictum. Sed vestibulum rutrum eros, sed consequat sem. Duis et dolor ac arcu venenatis egestas.',
            'user_id' => User::where('email' , 'admin@gmail.com')->first()->id
        ]);
    }
}
