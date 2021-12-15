<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpParser\Node\Stmt\Echo_;
use App\Models\User;
use App\Notifications\TestEnrollment;

class DailyMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'message:everyminute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artisan command to send Every Minute messages';

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
            'body' => 'You recieved a new test notification',
            'enrollmentText' => 'You are allowed to enroll',
            'url' => url('/'),
            'thankyou' => 'You have 14 days to enroll'
        ];


        $user->notify(new TestEnrollment($enrollmentData));
    }
}
