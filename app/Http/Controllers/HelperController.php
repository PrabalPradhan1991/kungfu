<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelperController extends Controller
{
	public static function getOrdering($model, $ordering_field) {
		$max_order = \DB::table((new $model)->getTable())
						->max($ordering_field);

		return ++$max_order;
	}

	public static function getUserDetails($user_id) {
		$user_table = (new \App\User)->getTable();
		$user_details_table = (new \App\UserDetailsModel)->getTable();

		$user = \DB::table($user_details_table)
					->join($user_table, $user_details_table.'.user_id', '=', $user_table.'.id')
					->select($user_details_table.'.*', $user_table.'.email', $user_table.'.name')
					->where('user_id', $user_id)->first();

		return !is_null($user) ? $user : new \App\UserDetailsModel;
	}

	public static function changeNullToX($array) {
		foreach($array as $index => $a) {
			$array[$index] = is_null($a) ? 'x' : $a;
		}

		return $array;
	}

	public static function limitWords($text, $limit=100)	
	{
		$text = strip_tags($text);
		$_text = substr($text, 0, $limit);
		if(strlen($text) > $limit)
		{
			$_text .= '...';
		}

		return $_text;
	}

	public static function tagEncode($tags)
	{
		$_tags = explode(',', $tags);
        $tags = '';
        foreach($_tags as $index => $t)
        {
            $_tags[$index] = '#'.$t.'#';
        }

        $tags = implode(',', $_tags);

        return $tags;
	}

	public static function getContactUs($property = NULL)
	{
		$data = \App\Http\Controllers\CmsModules\ContactUs\ContactUsModel::first();
        $data = is_null($data) ? (new \App\Http\Controllers\CmsModules\ContactUs\ContactUsModel) : $data;
        return is_null($property) ? $data : $data->$property;
	}

	public static function getFooterBlockTitle($property = NULL)
	{
		$data = \App\Http\Controllers\CmsModules\FooterBlockTitle\FooterBlockTitleModel::first();
		$data = is_null($data) ? (new \App\Http\Controllers\CmsModules\FooterBlockTitle\FooterBlockTitleModel) : $data;
        return is_null($property) ? $data : $data->$property;
	}

	public static function getFooterBlockOne($property = NULL)
	{
		$data = \App\Http\Controllers\CmsModules\FooterBlockTitle\FooterBlockOneModel::first();
        $data = is_null($data) ? (new \App\Http\Controllers\CmsModules\FooterBlockTitle\FooterBlockOneModel) : $data;
        $_data = new \stdClass();
        $_data = $data;
        $_data->links = [];
        if($property == 'link_icons' || $property == 'link_urls' || is_null($property))
        {
        	$links = explode(',', $data->link_urls);
        	$icons = explode(',', $data->link_icons);
        	$data = [];
        	
        	foreach($links as $index => $l)
        	{
        		if(isset($icons[$index]))
        		{
        			$data[] = ['icon' => $icons[$index], 'link' => $l];
        		}
        	}

        	$_data->links = $data;
        }
        
        return is_null($property) ? $_data : (in_array(['link_icons', 'link_urls'], $propery) ? $_data->links  : $_data->$property);	
        
	}

	public static function getMenuLink($link)
	{
		$return = '#';
		if($link)
		{
			$_link = $link;
			$count = 0;
			str_replace(['http://', 'https://', '#'], '', $_link, $count);
			$return = $count > 0 ? $link : config('app.url') . $link;
		}

		return $return;

	}
	//['url' => 'url', 
	public static function addJsFile($js_type, $url, $type=NULL, $integrity=NULL, $cross_origin=NULL) {
		$session_js = session()->get($js_type);
		$session_js = !is_null($session_js) ? $session_js : [];
		$type = !is_null($type) ? 'type="'.$type.'"' : '';
		$integrity = !is_null($integrity) ? 'integrity="'.$integrity.'"' : '';
		$cross_origin = !is_null($cross_origin) ? 'crossorigin="'.$cross_origin.'"' : '';
		$session_js[] = '<script src="'.$url.'" '.$type.' '.$integrity.' '.$cross_origin.'></script>';
		$session_js = array_unique($session_js);
		session()->put($js_type, $session_js);
	}

	public static function displayJsFile($js_type) {
		$js = session()->get($js_type);
		session()->forget($js_type);
		$js = !is_null($js) ? $js : [];
		$html = '';
		foreach($js as $j) {
			$html .= $j;
		}
			
		return $html;
	}

	public static function getUserGroupId($name='user')
	{
		return \App\GroupModel::where('group_name', $name)->firstOrFail()->id;
	}

	public static function getAdminGroupId($name='admin')
	{
		return \App\GroupModel::where('group_name', $name)->firstOrFail()->id;
	}

	public static function getSuperadminGroupId($name='superadmin')
	{
		return \App\GroupModel::where('group_name', $name)->firstOrFail()->id;
	}

	public static function isSuperadmin($id=0, $name="superadmin")
	{

		$id = $id ? $id : \Auth::check() ? \Auth::user()->id : 0;
		$user = \App\UserDetailsModel::firstOrNew([
			'user_id'	=>	$id
		]);

		return $user->group_id == self::getSuperadminGroupId($name) ? true : false;
	}

	public static function isAdmin($id=0, $name="admin")
	{
		$id = $id ? $id : \Auth::check() ? \Auth::user()->id : 0;
		$user = \App\UserDetailsModel::firstOrNew([
			'user_id'	=>	$id
		]);

		return $user->group_id == self::getAdminGroupId($name) ? true : false;
	}

	public static function isUser($id=0, $name="user")
	{
		$id = $id ? $id : \Auth::check() ? \Auth::user()->id : 0;
		$user = \App\UserDetailsModel::firstOrNew([
			'user_id'	=>	$id
		]);

		return $user->group_id == self::getUserGroupId($name) ? true : false;
	}

	public static function storeJsInSession($script)
	{
		$scripts = session()->get('custom-js');
		$scripts[] = $script;
		session()->put('custom-js', $scripts);
	}

	public static function retrieveJsFromSession()
	{
		$scripts = session()->get('custom-js');
		$script = '';
		if($scripts)
		{
			foreach($scripts as $s)
			{
				$script .= $s;
			}	
		}
		
		session()->forget('custom-js');
		return $script;
	}
}