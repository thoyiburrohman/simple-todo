<?php

namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class DailyTaskReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:daily-task-reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List Task yang belum selesai';

    /**
     * Execute the console command.
     */
    public function handle(Api $telegram)
    {
        // Ambil tugas yang belum selesai (pastikan ada beberapa tugas belum selesai di DB lokalmu)
        $incompleteTasks = Task::where('is_completed', false)->get();

        if ($incompleteTasks->isEmpty()) {
            $message = "🎉 Semua tugas selesai, Kamu keren! 🎉";
        } else {
            $message = "🔔 *Pengingat Tugas Belum Selesai Pagi Ini:*\n\n";
            foreach ($incompleteTasks as $task) {
                // Pastikan relasi 'category' di-eager load atau diakses dengan aman
                $categoryName = $task->project ? $task->project->name : 'Tanpa Kategori';
                // Escaping karakter khusus untuk MarkdownV2
                $title = Str::upper($task->title);
                $description = $task->description ? Str::of(Str::limit($task->description, 50)) : '';

                $message .= "• \\[" . $categoryName . "\\] *" . $title . "*\n";
                if (!empty($description)) {
                    $message .= "  _Deskripsi: " . $description . "_\n\n";
                }
            }
            $message .= "Lanjutkan pekerjaan mu hari ini 💪";
        }

        $chatId = '181194724';

        if (!$chatId) {
            $this->error('TELEGRAM_CHAT_ID belum diatur di .env');
            $this->info('Pastikan Anda sudah mendapatkan BOT_TOKEN dari BotFather dan CHAT_ID Anda.');
            return Command::FAILURE;
        }

        $response = $telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => 'MarkdownV2', // Penting untuk format Markdown
        ]);
    }
}
