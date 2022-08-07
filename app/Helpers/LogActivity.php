<?php
namespace App\Helpers;
use Request;
use App\Models\LogActivity as LogActivityModel;
use Illuminate\Support\Facades\App;

class LogActivity
{
    public static function addToLog($subject)
    {
    	$log = [];
    	$log['subject'] = $subject;
    	$log['url'] = Request::fullUrl();
    	$log['method'] = Request::method();
    	$log['ip'] = Request::ip();
    	$log['agent'] = Request::header('user-agent');
    	if(Request::isMethod('GET')){
            if (App::environment(['local', 'staging'])) {
                LogActivityModel::create($log);
            }
        }elseif(Request::isMethod('POST') || Request::isMethod('DELETE')){
            LogActivityModel::create($log);
        }    
    }
}