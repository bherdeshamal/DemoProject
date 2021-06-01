<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Order;
use Mail;

class everyMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'hii';

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
    {
     // echo "hii shamal";
        //Mail::to('shamalbherde02@gmail.com')->send(hii); 

        $user = Order::all();
        foreach ($user as $a)
        {
            Mail::raw("Your Order is in Process", function($message) use ($a)
         {
             $message->from('anitabherde10@gmail.com');
             $message->to($a->user_email)->subject('Order Update');
         });

         
        $this->info('Hourly Update has been send successfully');
        }
       
    }
}
