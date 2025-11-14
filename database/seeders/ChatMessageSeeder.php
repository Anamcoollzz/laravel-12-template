<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ChatMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Schema::hasTable('chat_messages')) return;
        $users = User::select(['id', 'name', 'avatar', 'last_seen_at', 'is_anonymous'])->role('user')->get();
        foreach ($users as $user) {
            foreach (range(1, 50) as $i) {
                \App\Models\ChatMessage::create([
                    'to_user_id'   => $user->id,
                    'message'      => fake()->sentence(10),
                    'from_user_id' => 1,
                    'created_at'   => fake()->dateTimeBetween('-10 days', 'now'),
                    'category' => fake()->randomElement([
                        \App\Models\ChatMessage::CATEGORY_CURHAT,
                        \App\Models\ChatMessage::CATEGORY_KELUHAN_PENYAKIT,
                        \App\Models\ChatMessage::CATEGORY_PERTANYAAN_LAINNYA,
                    ]),
                ]);
                \App\Models\ChatMessage::create([
                    'to_user_id'   => 1,
                    'message'      => fake()->sentence(10),
                    'from_user_id' => $user->id,
                    'created_at'   => fake()->dateTimeBetween('-10 days', 'now'),
                    'category' => fake()->randomElement([
                        \App\Models\ChatMessage::CATEGORY_CURHAT,
                        \App\Models\ChatMessage::CATEGORY_KELUHAN_PENYAKIT,
                        \App\Models\ChatMessage::CATEGORY_PERTANYAAN_LAINNYA,
                    ]),
                ]);
            }
        }
    }
}
