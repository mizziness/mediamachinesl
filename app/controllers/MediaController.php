<?php

class MediaController extends BaseController {

/********* Movies *********/

	public function movies() {
		$featured = DB::table("media")->where(array(
			"category" => "movies",
			"active" => 1,
			"featured" => 1
		))->orderByRaw("RAND()")->take(1)->get();
		
		if ( $featured ) {
			$movies = DB::table("media")->where(array(
				"category" => "movies",
				"active" => 1,
			))->whereNotIn('id', [$featured[0]->id])->orderBy("title")->get();
		} else {
			$movies = DB::table("media")->where(array(
				"category" => "movies",
				"active" => 1,
			))->orderBy("title")->get();
		}
		
		$view = View::make('movies')
			->with("featured", $featured)
			->with("movies", $movies);
		return $view;
	}
	
	public function playMovie($id) {
		$movie = DB::table("media")->where("id", $id)->where("active", 1)->first();
		$customerID = NULL;
		if ( Session::has("customerID") ) {
			$customerID = Session::get("customerID");
		}
		$view = View::make('playMovie')
			->with("movie", $movie)
			->with("customerID", $customerID);
		return $view;
	}
	
/********* Music *********/

	public function music() {
		$featured = DB::table("media")->where(array(
			"category" => "radio",
			"active" => 1,
			"featured" => 1
		))->orderByRaw("RAND()")->take(1)->get();
		
		if ( $featured ) {
			$music = DB::table("media")->where(array(
				"category" => "radio",
				"active" => 1,
			))->whereNotIn('id', [$featured[0]->id])->orderBy("title")->get();
		} else {
			$music = DB::table("media")->where(array(
				"category" => "radio",
				"active" => 1,
			))->orderBy("title")->get();
		}
			
		$view = View::make('music')
			->with("featured", $featured)
			->with("music", $music);
		return $view;
	}
	
	public function playMusic($id) {
		$station = DB::table("media")->where("id", $id)->where("active", 1)->first();
		$backgrounds = DB::table("backgrounds")->orderByRaw("RAND()")->get();
		$view = View::make('playMusic')
			->with("station", $station)
			->with("backgrounds", $backgrounds);
		return $view;
	}
	

/********* TV *********/

	public function television() {
		$featured = DB::table("media")->where(array(
			"category" => "television",
			"active" => 1,
			"featured" => 1
		))->orderByRaw("RAND()")->take(1)->get();
		
		if ( $featured ) {		
			$television = DB::table("media")->where(array(
				"category" => "television",
				"active" => 1,
			))->whereNotIn('id', [$featured[0]->id])->orderBy("title")->get();
		} else {
			$television = DB::table("media")->where(array(
				"category" => "television",
				"active" => 1,
			))->orderBy("title")->get();
		}
		
		$parents = DB::table('media')->where("category", "television")->lists('parent');
		$parents = array_unique(array_filter($parents));
			
		$view = View::make('television')
			->with("parents", $parents)
			->with("featured", $featured)
			->with("television", $television);
		return $view;
	}
	
	public function playTV($id) {
		$show = DB::table("media")->where("id", $id)->where("active", 1)->first();		
		$view = View::make('playMovie')
			->with("movie", $show);
		return $view;
	}
	
	public function tvShow($slug) {
		$episodes = DB::table("media")->where("category", "television")->where("parentSlug", $slug)->where("active", 1)->orderBy("id")->get();
		$parents = DB::table('media')->where("category", "television")->lists('parent');
		$latestEpisode = DB::table("media")->where("parentSlug", $slug)->where("active", 1)->orderBy("id", "DESC")->take(1)->first();
		
		$view = View::make('television')
			->with("latestEpisode", $latestEpisode)
			->with("parents", $parents)
			->with("episodes", $episodes);
		return $view;		
	}
	
	/********* Games *********/

	public function games() {
		$featured = DB::table("media")->where(array(
			"category" => "games",
			"active" => 1,
			"featured" => 1
		))->orderByRaw("RAND()")->take(1)->get();
		
		if ( $featured ) {
			$movies = DB::table("games")->where(array(
				"category" => "movies",
				"active" => 1,
			))->whereNotIn('id', [$featured[0]->id])->orderBy("title")->get();
		} else {
			$games = DB::table("media")->where(array(
				"category" => "games",
				"active" => 1,
			))->orderBy("title")->get();
		}
		
		$view = View::make('games')
			->with("featured", $featured)
			->with("games", $games);
		return $view;
	}
	
	public function playGame($id) {
		$game = DB::table("media")->where("id", $id)->where("active", 1)->first();		
		$view = View::make('playGame')
			->with("game", $game);
		return $view;
	}
	
	/********* Search *********/
	
	public function search() {
		$searchTerm = trim(strip_tags(Input::get("search")));
		
		$results = DB::table("media")
			->where('title', 'LIKE', '%'. $searchTerm .'%')
			//->orWhere('description', 'LIKE', '%'. $searchTerm .'%')
			//->orWhere('parent', 'LIKE', '%'. $searchTerm .'%')
		->orderBy("title")->get();
		
		$view = View::make('search')
			->with("results", $results)
			->with("searchTerm", $searchTerm);
		return $view;
	}
	
	/********* YouTube *********/
	
	public function youTube() {
		$youTube = App::make('youTube');
		$ytCategories = Helpers::getYTCategories();
		$ytBest = Helpers::getYTPopular();
		
		$view = View::make('youtube')			
			->with("ytCategories", $ytCategories["items"])
			->with("ytBest", $ytBest["items"]);
		return $view;
	}
	
	public function youtubeBrowse($type, $value, $page = 1) {
		$youTube = App::make('youTube');
		$ytCategories = Helpers::getYTCategories();
		$ytBest = Helpers::getYTPopular();
		
		$data = array();
		if ( $type == "guide" ) { $data["guide"] = $value; }
		if ( $type == "category" ) { $data["category"] = $value; }
		if ( $type == "search" ) { $data["term"] = $value; }
		if ( $page != 1 ) { $data["pageToken"] = $page; }
		
		$results = Helpers::getYTSearch($data);
		$nextPage = isset($results["nextPageToken"]) ? $results["nextPageToken"] : "";
		
		$prettyCats = array();
		foreach( $ytCategories["items"] as $cat ) {
			$prettyCats[$cat["id"]] = $cat["snippet"]["title"];
		}
		
		Session::put('youTubeBack', Request::fullUrl());
		
		$view = View::make('youTubeBrowse')
			->with("nextPage", $nextPage)
			->with("browseType", $type)
			->with("browseValue", $value)
			->with("page", $page)
			->with("results", $results)
			->with("ytCategories", $ytCategories["items"])
			->with("prettyCats", $prettyCats);
		return $view;
	}
	
	public function youTubePlay($id) {			
		$view = View::make('playYouTube')
			->with("id", $id);
		return $view;
	}
	
	/********* Adult / RedTube *********/
	
	public function adult() {
		if ( App::environment('pg') ) {
			return Redirect::action('HomeController@init'); 
		}
		$rtCategories = Helpers::redTubeCategories();
		$categories = array();
		foreach ( $rtCategories["categories"] as $cat ) {
			$categories[$cat["category"]] = $cat["category"];
		}
		$categories["doublepenetration"] = "double penetration";
		$categories["wildcrazy"] = "wild and crazy";
		$categories["youngandold"] = "young and old";
		$categories["bigtits"] = "big tits";
		$categories["japanesecensored"] = "japanese censored";
		
		$rTtags = Helpers::redTubeTags();		
		$tags = array();
		foreach ( $rTtags["tags"] as $tag ) {
			$tags[] = $tag["tag"]["tag_name"];
		}
		
		$rTStars = Helpers::redTubeStars();
		$stars = array();
		foreach ( $rTStars["stars"] as $star ) {
			$stars[] = $star["star"]["star_name"];
		}
		
		$defaultData = array(
			"ordering" => "newest",
			"period" => "weekly"
		);
		$results = Helpers::searchRedTube($defaultData);		

		$view = View::make('adult')
			->with("categories", $categories)
			->with("tags", $tags)
			->with("stars", $stars)
			->with("results", $results);
		return $view;
	}
	
	public function adultBrowse($type, $value, $page = 1) {
		if ( App::environment('pg') ) {
			return Redirect::action('HomeController@init'); 
		}
		
		$rtCategories = Helpers::redTubeCategories();
		$categories = array();
		foreach ( $rtCategories["categories"] as $cat ) {
			$categories[$cat["category"]] = $cat["category"];
		}
		$categories["doublepenetration"] = "double penetration";
		$categories["wildcrazy"] = "wild and crazy";
		$categories["youngandold"] = "young and old";
		$categories["bigtits"] = "big tits";
		$categories["japanesecensored"] = "japanese censored";
		
		$rTtags = Helpers::redTubeTags();		
		$tags = array();
		foreach ( $rTtags["tags"] as $tag ) {
			$tags[] = $tag["tag"]["tag_name"];
		}
		
		$rTStars = Helpers::redTubeStars();
		$stars = array();
		foreach ( $rTStars["stars"] as $star ) {
			$stars[] = $star["star"]["star_name"];
		}
		
		$prettyValue = $value;
		switch($value) {
			case "doublepenetration":
				$prettyValue = "double penetration";
			break;
			case "wildcrazy":
				$prettyValue = "wild and crazy";
			break;
			case "youngandold":
				$prettyValue = "young and old";
			break;
			case "bigtits":
				$prettyValue = "big tits";
			break;
			case "japanesecensored":
				$prettyValue = "japanese censored";
			break;
		}
		
		$data = array();
		if ( $type == "category" ) {
			$data["category"] = $value;
		}
		if ( $type == "tag" ) {
			$data["tags"] = array($tags[$value]);
			$prettyValue = $tags[$value];
		}
		if ( $type == "star" ) {
			$data["stars"] = array($stars[$value]);
			$prettyValue = $stars[$value];
		}
		if ( $type == "search" ) {
			$data["search"] = $value;
		}
		$data["page"] = $page;
		
		$results = Helpers::searchRedTube($data);
		
		$view = View::make('adultBrowse')
			->with("browseType", $type)
			->with("browseValue", $value)
			->with("prettyValue", $prettyValue)
			->with("page", $page)
			->with("categories", $categories)
			->with("tags", $tags)
			->with("stars", $stars)
			->with("results", $results);
		return $view;
	}
	
	public function adultPlay($id) {
		if ( App::environment('pg') ) {
			return Redirect::action('HomeController@init'); 
		}
		$video = Helpers::getRTVideo($id);
			
		$view = View::make('playAdult')
			->with("video", $video);
		return $view;
	}
	
}