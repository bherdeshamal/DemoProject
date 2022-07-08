<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
//use Newsletter;
use App\Http\Controllers\Input;

class NewslettersSubscriptionController extends Controller
{ 
    protected $mailchimp;
    protected $listId ='c0eccef2a5';

    
        //  protected $mailchimp;
        // protected $listId ='c0eccef2a5';

       
        /**
         * Pull the Mailchimp-instance (including API-key) from the IoC-container.
         */
    public function __construct(\Mailchimp $mailchimp) 
    {
       $this->mailchimp = $mailchimp;
     // $this->mailchimp = new Newsletter();
    }

    /**
     * Access the mailchimp lists API
     */
    public function store(Request $request) 
    {
        $email = $request->email;
//echo $email;die;

        try {
            $this->mailchimp
                ->lists
                ->subscribe(
                    $this->listId, 
                    ['email' => $email]
                );
        } catch (\Mailchimp_List_AlreadySubscribed $e) {
            // do something
        } catch (\Mailchimp_Error $e) {
            // do something
        }

        return redirect()->back();

    }

}