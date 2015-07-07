<?php

class Helpers {

	public static function makeSlug($string) {
		$slug = str_replace(" ", "_", strtolower($string));
		$slug = preg_replace('/[^_A-Za-z0-9]/', '', $slug);
		$slug = str_replace("__", "_", trim($slug));
		return $slug;
	}
	
	/*************** Red Tube ********************/
	
	public static function RedTubeApiCall($http_server, $params = array()) {
		$query_string	=	'?';
 
		if (is_array($params) && count($params)) {
			foreach($params as $k=>$v){
				if ( is_array($v) ) {
					$query_string .= $k.'[]=' . implode(",", $v) . '&';
				} else {
					$query_string .= $k.'='.$v.'&';
				}
			}
			$query_string	=	rtrim($query_string,'&');
		}
		return file_get_contents($http_server.$query_string);
	}
	
	public static function redTubeCategories() {
		$http = 'http://api.redtube.com/';
		$call = 'redtube.Categories.getCategoriesList';	 
	 
		$params = array(
			'output' => 'json',
			'data' => $call
		);
	 
		$response = Helpers::RedTubeApiCall($http , $params);	 
		return json_decode($response, true);
	}
	
	public static function redTubeTags() {
		$http = 'http://api.redtube.com/';
		$call = 'redtube.Tags.getTagList';	 
	 
		$params = array(
			'output' => 'json',
			'data' => $call
		);
	 
		$response = Helpers::RedTubeApiCall($http , $params);	 
		return json_decode($response, true);
	}
	
	public static function redTubeStars() {
		$http = 'http://api.redtube.com/';
		$call = 'redtube.Stars.getStarList';	 
	 
		$params = array(
			'output' => 'json',
			'data' => $call
		);
	 
		$response = Helpers::RedTubeApiCall($http , $params);	 
		return json_decode($response, true);
	}
	
	public static function searchRedTube( $searchData ) {
		// Set defaults
		$data = array(
			"page" => 1,
			"thumbsize" => "medium",
			"ordering" => "newest"
		);
		
		//Override defaults
		foreach ( $searchData as $key => $value ) {
			$data[$key] = $value;		
		}
		$http = 'http://api.redtube.com/';
		$call = 'redtube.Videos.searchVideos';
		
		$params = array(
			'output' => 'json',
			'data' => $call
		);
		
		$params = array_merge($params, $data);		
		$response = Helpers::RedTubeApiCall($http , $params);	 
		return json_decode($response, true);
	}
	
	public static function embedRedTube( $id ) {
		$http = 'http://api.redtube.com/';
		$call = 'redtube.Videos.getVideoEmbedCode';	 
	 
		$params = array(
			'output' => 'json',
			'data' => $call, 
			'video_id' => $id
		);
				
		$response = Helpers::RedTubeApiCall($http , $params);	 
		return json_decode($response, true);
	}	
	
	public static function getRTVideo( $id ) {
		$http = 'http://api.redtube.com/';
		$call = 'redtube.Videos.getVideoById';	 
	 
		$params = array(
			'output' => 'json',
			'data' => $call, 
			'video_id' => $id
		);
				
		$response = Helpers::RedTubeApiCall($http , $params);	 
		return json_decode($response, true);
	}
						
}