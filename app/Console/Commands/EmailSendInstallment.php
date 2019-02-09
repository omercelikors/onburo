<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mailgun\Mailgun;
class EmailSendInstallment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:installment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email to accounting staff for student installments';

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
     * @return mixed
     */
    public function handle()
    {   $mailgun_secret=env('MAILGUN_SECRET',false);
        $domain = env('MAILGUN_DOMAIN',false);
        $mgClient = new Mailgun($mailgun_secret);
        $result = $mgClient->sendMessage("$domain",
        array  ('from'    => 'info@tsc.com',
                'to'      => 'omerr.celikors@gmail.com',
                'subject' => 'Hello',
                'text'    => 'Testing some Mailgun awesomeness!'));
    }
}
