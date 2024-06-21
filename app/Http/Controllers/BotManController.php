<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
use App\Models\Bot; // Import the Boot model
use Illuminate\Support\Facades\Log; // Import Log facade

class BotManController extends Controller
{
    /**
     * Handle incoming requests.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function($botman, $message) {
            // Sanitize and log the incoming message
            $sanitizedMessage = strtolower(trim($message));
            Log::info('Received message: ' . $sanitizedMessage);

            // Fetch the question from the boot table, exact case-insensitive match
            $question = Bot::whereRaw('LOWER(question) = ?', [$sanitizedMessage])->first();

            if ($question) {
                Log::info('Question found: ' . $question->question);
                $botman->reply($question->answer);
            } else {
                Log::info('No matching question found for: ' . $sanitizedMessage);
                $botman->reply("Question with main topic.");
            }
        });

        $botman->listen();
    }

    /**
     * Ask the user's name.
     */
    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function(Answer $answer) {
            $name = $answer->getText();
            $this->say('Nice to meet you ' . $name);
        });
    }

    /**
     * Helper function to send a message.
     */
    private function say($message)
    {
        $botman = app('botman');
        $botman->say($message, $botman->getUser()->getId());
    }
}