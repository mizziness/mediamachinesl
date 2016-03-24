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
	
	/*************************** YouTube ***************************/
	public static function getYTCategories() {		
		$APIURL = "https://www.googleapis.com/youtube/v3/videoCategories";
		$fields = array(
			"part" => "snippet",
			"key" => "AIzaSyBfyTTj9vcb2yZzn3kYslOgmeq8A-YF9Q8",
			"regionCode" => "US"
		);
		$fieldstr = http_build_query($fields, '', '&');
		
		// Create our cURL call and set the parameters
        $call = curl_init();
		curl_setopt($call, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($call, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($call, CURLOPT_HTTPGET, true);
        curl_setopt($call, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($call, CURLOPT_URL, $APIURL . "?" . $fieldstr);
        curl_setopt($call, CURLOPT_POSTFIELDS, null);
        curl_setopt($call, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($call, CURLOPT_SSL_VERIFYPEER, TRUE);
		
		// Execute the call
		$result = curl_exec($call);
		$httpCode = curl_getinfo($call, CURLINFO_HTTP_CODE);

		$values = json_decode($result,true);
		return $values;
	}
	
	public static function getYTChannelGuides() {		
		$APIURL = "https://www.googleapis.com/youtube/v3/guideCategories";
		$fields = array(
			"part" => "snippet",
			"key" => "AIzaSyBfyTTj9vcb2yZzn3kYslOgmeq8A-YF9Q8",
			"regionCode" => "US"
		);
		$fieldstr = http_build_query($fields, '', '&');
		
		// Create our cURL call and set the parameters
        $call = curl_init();
		curl_setopt($call, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($call, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($call, CURLOPT_HTTPGET, true);
        curl_setopt($call, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($call, CURLOPT_URL, $APIURL . "?" . $fieldstr);
        curl_setopt($call, CURLOPT_POSTFIELDS, null);
        curl_setopt($call, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($call, CURLOPT_SSL_VERIFYPEER, TRUE);
		
		// Execute the call
		$result = curl_exec($call);
		$httpCode = curl_getinfo($call, CURLINFO_HTTP_CODE);

		$values = json_decode($result,true);
		return $values;
	}
	
	public static function getYTPopular($snippet = "snippet", $chart = "mostPopular", $max = 24, $region = "US"){		
		$APIURL = "https://www.googleapis.com/youtube/v3/videos";
		$fields = array(
			"part" => $snippet,
			"key" => "AIzaSyBfyTTj9vcb2yZzn3kYslOgmeq8A-YF9Q8",
			"regionCode" => $region,
			"chart" => $chart,
			"maxResults" => $max		
		);
		$fieldstr = http_build_query($fields, '', '&');
		
		// Create our cURL call and set the parameters
        $call = curl_init();
		curl_setopt($call, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($call, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($call, CURLOPT_HTTPGET, true);
        curl_setopt($call, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($call, CURLOPT_URL, $APIURL . "?" . $fieldstr);
        curl_setopt($call, CURLOPT_POSTFIELDS, null);
        curl_setopt($call, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($call, CURLOPT_SSL_VERIFYPEER, TRUE);
		
		// Execute the call
		$result = curl_exec($call);
		$httpCode = curl_getinfo($call, CURLINFO_HTTP_CODE);

		$values = json_decode($result,true);
		return $values;
	}
	
	public static function getYTSearch($data){
		$category = array_key_exists("category", $data) ? $data["category"] : "";
		$term = array_key_exists("term", $data) ? $data["term"] : "";	
		
		$APIURL = "https://www.googleapis.com/youtube/v3/search";
		
		$fields = array(
			"part" => "snippet",
			"key" => "AIzaSyBfyTTj9vcb2yZzn3kYslOgmeq8A-YF9Q8",
			"regionCode" => "US",
			"maxResults" => 23,
			//"videoCategoryId" => $category,
			"type" => "video",
			"q" => $term,
			"relevanceLanguage" => "en",
			"order" => "relevance",
			"safeSearch" => "none"
		);
		if ( array_key_exists("pageToken", $data) ) {
			$fields["pageToken"] = $data["pageToken"];
		}		
		$fieldstr = http_build_query($fields, '', '&');
		
		// Create our cURL call and set the parameters
        $call = curl_init();
		curl_setopt($call, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($call, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($call, CURLOPT_HTTPGET, true);
        curl_setopt($call, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($call, CURLOPT_URL, $APIURL . "?" . $fieldstr);
        curl_setopt($call, CURLOPT_POSTFIELDS, null);
        curl_setopt($call, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($call, CURLOPT_SSL_VERIFYPEER, TRUE);
		
		// Execute the call
		$result = curl_exec($call);
		$httpCode = curl_getinfo($call, CURLINFO_HTTP_CODE);

		$values = json_decode($result,true);
		return $values;
	}
						
}