<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Notifications\TestEnrollment;

class EveryMinuteMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'message:everyfiveminute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Send Notification Every 5 Minute';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::first();

        $enrollmentData = [
            'body' => 'Test Send Notification Every 5 Minute',
            'enrollmentText' => 'You are allowed to enroll',
            'url' => url('/'),
            'thankyou' => 'You have 14 days to enroll'
        ];


        $user->notify(new TestEnrollment($enrollmentData));
    }
}
