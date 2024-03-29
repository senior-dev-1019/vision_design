<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use URL;
use Session;
use Cookie;
use Redirect;
use Input;
use App\User;
use DB;
class SearchController extends Controller
{
	public function __construct()
{
    $this->middleware('auth');
}
	public function getdata(Request $request)
	{
		$search = $request->get("search_data");
		$ch=curl_init();
		curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1" );
		curl_setopt($ch, CURLOPT_URL,'https://search.yahoo.co.jp/search?ei=UTF-8&fr=sfp_as&aq=-1&oq=&p='.$search.'&meta=fl%3D3&b=1');
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
        curl_setopt( $ch, CURLOPT_ENCODING, "" );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );    # required for https urls
		$html = curl_exec($ch);
		curl_close($ch);
		$start_pos = strpos($html, '<ol><li>');
		$real_html = substr($html, $start_pos +8);
		$end_pos = strripos($real_html, '</li><li>');
		$data = '<li>'.substr($real_html, 0, $end_pos);
		
		$ch=curl_init();
		curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1" );
		curl_setopt($ch, CURLOPT_URL,'https://search.yahoo.co.jp/search?ei=UTF-8&fr=sfp_as&aq=-1&oq=&p='.$search.'&meta=fl%3D3&b=11');
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
        curl_setopt( $ch, CURLOPT_ENCODING, "" );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );    # required for https urls
		$html = curl_exec($ch);
		curl_close($ch);
		$start_pos = strpos($html, '<ol><li>');
		$real_html = substr($html, $start_pos +8);
		$end_pos = strripos($real_html, '</li><li>');
		$data .= '</li><li>'.substr($real_html, 0, $end_pos);
		
		$array_data = array();
		$return = array();
		$i = 0;
		$start_pos = strpos($data, '<li>');
		$data1 = substr($data, $start_pos + 4);
		$end_pos = strpos($data1, '</li><li>');
		$array_data[$i][0] = '<li>'.substr($data1, 0, $end_pos);

		while($start_pos = strpos($data1, '</li><li>')){
			$i++;
			$data1 = substr($data1, $start_pos + 9);
			$end_pos = strpos($data1, '</li><li>');
			$array_data[$i][0] = '<li>'.substr($data1, 0, $end_pos);
		}
        
		$i = 0;
		$start_pos = strpos($data, '%3A//');
		$data1 = substr($data, $start_pos + 5);
		$end_pos = strpos($data1, '">');
		$array_data[$i][1] = substr($data1, 0, $end_pos);
		while($start_pos = strpos($data1, '%3A//')){
			$i++;
			$data1 = substr($data1, $start_pos + 5);
			$end_pos = strpos($data1, '">');
			$array_data[$i][1] = substr($data1, 0, $end_pos);
		}
		
// 		$return_str = "";
// 		$temp_str = "";
// 		$allowed_tags = '<script><style><br></br>';
// 		$array_search = array();
// 		$array_search[0][0] = "<script";
// 		$array_search[0][1] = "</script>";
// 		$array_search[1][0] = "<style";
// 		$array_search[1][1] = "</style>";
// 		// 		$array_search[1][0] = "<a";
// 		// 		$array_search[1][1] = "</a>";
// 		// 		$array_search[2][0] = "<base";
// 		// 		$array_search[2][1] = ">";
// // 		$array_search[3][0] = "http";
// // 		$array_search[3][1] = '>';
// 		// 		$array_search[4][0] = "<ul";
// 		// 		$array_search[4][1] = '</ul>';
// 		// 		$array_search[5][0] = "{";
// 		// 		$array_search[5][1] = '}';
// 		foreach ($array_data as $id => $value) {
// 		    if($value[0] != '<li>'){
//     			$ch = curl_init();
// 		        curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1" );
//     		    curl_setopt( $ch, CURLOPT_URL, $value[1] );
//     		    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
//     		    curl_setopt( $ch, CURLOPT_ENCODING, "" );
//     		    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
//     		    curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
//     		    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );    # required for https urls
//     		    curl_setopt( $ch, CURLOPT_MAXREDIRS, 10 );
//     			$data = curl_exec( $ch );
//     			$response = curl_getinfo( $ch );
//     		    curl_close ( $ch );
//     			if (stripos($response["content_type"], "euc-jp")) {
//     				header("Content-Type: text/html; charset=euc-jp");
//     			}
//     			else{
//     				header("Content-Type: text/html; charset=utf-8");
//         			// $start_pos = strpos($data, $search);
//         			// $data = substr($data, $start_pos);
//         			foreach ($array_search as $key => $array_row) {
//         				$start_pos = strpos($data, $array_row[0]);
//         				$search_data = substr($data, $start_pos);
//         				$end_pos = strpos($search_data, $array_row[1]);
//         				$replace_str = substr($search_data, 0, $end_pos+strlen($array_row[1]));
//         				$data = str_replace($replace_str, "", $data);
//         				while($start_pos = strpos($data, $array_row[0])){
//         					$search_data = substr($data, $start_pos);
//         					$end_pos = strpos($search_data, $array_row[1]);
//         					$replace_str = substr($search_data, 0, $end_pos+strlen($array_row[1]));
//         					$data = str_replace($replace_str, "", $data);
//         				}
//         			}
//         			$temp_str = strip_tags($data, $allowed_tags);
//         			$pos = strripos($temp_str, "※");
//         			if ($pos)
//         				$temp_str = substr($temp_str, 0, $pos);
//         			if(!empty($temp_str))
//         				$return_str .= $value[0].$temp_str.'</br>';
//     			}
// 			}
// 		}
		$return_str = "";
		$temp_str = "";
		$array_urls = array();
		foreach ($array_data as $id => $value) {
		    if($value[0] != '<li>'){
    			$ch = curl_init();
		        curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1" );
    		    curl_setopt( $ch, CURLOPT_URL, $value[1] );
    		    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
    		    curl_setopt( $ch, CURLOPT_ENCODING, "" );
    		    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    		    curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
    		    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
    		    curl_setopt( $ch, CURLOPT_MAXREDIRS, 10 );
    			$data = curl_exec( $ch );
    			$response = curl_getinfo( $ch );
    		    curl_close ( $ch );
    			if (stripos($response["url"], "wiki/")) {
    			    $start_pos = strpos($response["url"], "wiki/");
    				$response['url'] = substr($response["url"], 0, $start_pos + 5);
    				$response["url"] .= $search;
    			}
            	$array_urls[$id] = $response['url'];
    			$return_str .= $value[0]."<iframe id='".$id."' src='".$response['url']."' width = '100%' height = '100%'></iframe>";
    // 			if(stripos($response['content_type'], 'charset=UTF-8')){
    // 			    if(stripos($response['url'], 'youtube')){
    			        
    //     			}
    //     			else{
    //         			$array_urls[$id] = $response['url'];
    //             		//header("Content-Type: text/html; charset=utf-8");
    //                     $return_str .= $value[0]."<iframe id='{$id}' src='".$response['url']."' width = '100%' height = '100%'></iframe>";
    //     			}
    // 			}
			}
		}
		return json_encode(array("html"=>$return_str,"urls"=>$array_urls));
	}
	public function logout(Request $request){
        Auth::logout();
        return redirect('/signin');
    }
    public function dashboard(Request $request){
        $status = Session::get('status');

        if ($status == 2) {
            $users = DB::select('select * from users');
            return view('auth.dashboard')->with('users', $users);
        }
        else{
            return redirect('/signin');
        }
        
    }

	public function getUsers($id = 0){
		$userData['data'] = DB::select('select * from users where id = ?', [$id]);
		echo json_encode($userData);
		exit;
	}
	public function getUser_data($id = 0){
		$userData['data'] = DB::select('select * from users where id = ?', [$id]);
		echo json_encode($userData);
		exit;
	}
	
	public function update(Request $request){
		$username = $request->get("mfullname");
		// $email = $request->get("memail");
		$pass = $request->get("mpassword");
		$status = $request->get("mstatus");
		$id = $request->get("mid");  
		if ($pass == "" || strlen($pass)<6) {
		      $result = DB::update('update users set name = ?, status = ? where id = ?', [$username, $status, $id]);
		}
		else {
		    $pass = bcrypt($pass);
		    $result = DB::update('update users set name = ?, password = ?, status = ? where id = ?', [$username, $pass, $status, $id]);
		}  
		return redirect('/dashboard');
	}
	public function userupdate(Request $request){
		$username = $request->get("mfullname");
		// $email = $request->get("memail");
		$pass = $request->get("mpassword");
	
		$id = $request->get("mid");  
		if ($pass == "" || strlen($pass)<6) {
		      $result = DB::update('update users set name = ? where id = ?', [$username, $id]);
		}
		else {
		    $pass = bcrypt($pass);
		    $result = DB::update('update users set name = ?, password = ? where id = ?', [$username, $pass, $id]);
		}  
		return redirect('/dashboard');
	} 	
	public function delete($id = 0){
		DB::delete('delete from users where id = ?', [$id]);
		return redirect('/dashboard');
	}

}
