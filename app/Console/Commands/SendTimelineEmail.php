<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\{Composer, EmailList};
use App\Mail\Timeline\OnThisDay;

class SendTimelineEmail extends Command
{
    protected $composer;
    protected $signature = 'pianolit:timeline-email';
    protected $description = 'Send daily emails with birthdays along with historical events that happened around that time.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        if (testing())
            return null;

        $this->composer = Composer::famous()->bornToday()->inRandomOrder()->first();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->composer) {
            EmailList::birthdays()->send();
            // foreach (->subscribers as $subscriber) {
            //     \Mail::to($subscriber->email)->send(new OnThisDay($this->composer, $subscriber));
            // }

            return $this->info('The birthday email was sent successfully.');
        }

        return $this->info('There are no birthdays today.');
    }
}
