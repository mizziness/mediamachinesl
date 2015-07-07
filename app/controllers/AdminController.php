<?php

class AdminController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function init() {
		$movies = DB::table("media")->where("category", "movies")->orderBy("id", "DESC")->take(5)->get();
		$music = DB::table("media")->where("category", "radio")->orderBy("id", "DESC")->take(5)->get();
		$television = DB::table("media")->where("category", "television")->orderBy("id", "DESC")->take(5)->get();
		$games = DB::table("media")->where("category", "games")->orderBy("id", "DESC")->take(5)->get();
		
		$parentFolders = DB::table('media')->lists('parent');
		$parents = array("" => "Select One");
		foreach ( $parentFolders as $folder ) {
			if ( $folder && $folder != NULL ) {
			$parents[$folder] = $folder;
			}
		}		
		$parents = array_unique(array_filter($parents));
		
		Session::flash('backUrl', Request::fullUrl());
		
		$view = View::make('admin')
			->with("parents", $parents)
			->with("movies", $movies)
			->with("television", $television)
			->with("radio", $music)
			->with("games", $games);
		return $view;
    }
	
	public function addMedia() {
		if (Session::has('backUrl')) {
			Session::keep('backUrl');
		}

		$mediaType = Input::get("mediaType");
		$mediaURL = "";
		$mediaThumb = "";
		$mediaTitle = Input::get("mediaTitle");
		$mediaDescription = Input::get("mediaDescription");
		$featured = Input::get("featured") ?: "0";
		$newRelease = Input::get("newRelease") ?: "0";
		$active = Input::get("active") ?: "0";
		
		// Parent
		if ( Input::has("mediaParentExisting") ) { $parent = Input::get("mediaParentExisting"); }
		else if ( Input::has("mediaParent") ) { $parent = Input::get("mediaParent"); }
		else { $parent = ""; }
		
		$movieSlug = Helpers::makeSlug($mediaTitle);
		$parentSlug = Helpers::makeSlug($parent);
		
		if ( Input::get("mediaURL") ) {
			$mediaURL = Input::get("mediaURL");
		}
		
		if ( $mediaType == "radio") {
			$mediaThumb = "/images/default-icon-music.png";
		}
		
		if ( Input::hasFile("mediaThumb") ) {
			$image = Input::file('mediaThumb');
			$path = public_path() . "/media/thumbnails";
			$newName = "thumb_" . $movieSlug . "." . $image->getClientOriginalExtension();
			$moveThumb = $image->move($path, $newName);
			$mediaThumb = "/media/thumbnails/" . $newName;
		}
		
		DB::table('media')->insert(array(
			'category' => $mediaType,
			'title' => $mediaTitle,
			'url' => $mediaURL,
			'thumbnail' => $mediaThumb,
			'description' => $mediaDescription,
			'featured' => $featured,
			'newRelease' => $newRelease,
			'active' => $active,
			'parent' => $parent,
			'parentSlug' => $parentSlug
		));
		
		$message = "Media was added successfully!";
		return Redirect::action('AdminController@init')->with("message", $message);
	}
	
	public function editMedia($id) {
		if (Session::has('backUrl')) {
			Session::keep('backUrl');
		}

		$media = DB::table("media")->where("id", $id)->first();
		
		$parentFolders = DB::table('media')->lists('parent');
		$parents = array("" => "Select One");
		foreach ( $parentFolders as $folder ) {
			if ( $folder && $folder != NULL ) {
			$parents[$folder] = $folder;
			}
		}		
		$parents = array_unique(array_filter($parents));
		
		$view = View::make('editMedia')
			->with("parents", $parents)
			->with("media", $media);
		return $view;
	}
	
	public function updateMedia($id) {	
		if (Session::has('backUrl')) {
			Session::keep('backUrl');
		}
		$url = Session::get('backUrl');
		
		$media = DB::table("media")->where("id", $id)->first();
		
		$mediaType = Input::get("mediaType");
		$mediaURL = "";
		$mediaThumb = "";
		$mediaTitle = Input::get("mediaTitle");
		$mediaDescription = Input::get("mediaDescription");
		$featured = Input::get("featured") ?: "0";
		$newRelease = Input::get("newRelease") ?: "0";
		$active = Input::get("active") ?: "0";
		
		// Parent
		if ( Input::has("mediaParentExisting") ) { $parent = Input::get("mediaParentExisting"); }
		else if ( Input::has("mediaParent") ) { $parent = Input::get("mediaParent"); }
		else { $parent = ""; }
		
		$movieSlug = Helpers::makeSlug($mediaTitle);
		$parentSlug = Helpers::makeSlug($parent);
		
		if ( Input::get("mediaURL") ) {
			$mediaURL = Input::get("mediaURL");
		}
		
		$data = array(
			'category' => $mediaType,
			'title' => $mediaTitle,
			'url' => $mediaURL,
			'description' => $mediaDescription,
			'featured' => $featured,
			'newRelease' => $newRelease,
			'active' => $active,
			'parent' => $parent,
			'parentSlug' => $parentSlug
		);
		
		if ( $mediaType == "radio") {
			$mediaThumb = "/images/default-icon-music.png";
			$data['thumbnail'] = $mediaThumb;
		}
		
		if ( Input::hasFile("mediaThumb") ) {
			$image = Input::file('mediaThumb');
			$path = public_path() . "/media/thumbnails";
			$newName = "thumb_" . $movieSlug . "." . $image->getClientOriginalExtension();
			$moveThumb = $image->move($path, $newName);
			$mediaThumb = "/media/thumbnails/" . $newName;
			
			$data['thumbnail'] = $mediaThumb;
		}
		
		
		
		DB::table('media')->where("id", $id)->update($data);
		
		$message = "Media was updated successfully!";
		return Redirect::to($url)->with("message", $message);
	}
	
	public function deleteMedia($id) {
		if (Session::has('backUrl')) {
			Session::keep('backUrl');
		}
		$url = Session::get('backUrl');
		
		DB::table('media')->where("id", $id)->delete();
		
		$message = "Media was deleted successfully!";
		return Redirect::to($url)->with("message", $message);
	}
	
	public function viewAll($type) {
		Session::flash('backUrl', Request::fullUrl());
		
		$media = DB::table("media")->where("category", $type)->orderBy("title")->get();
		
		$view = View::make('viewAll')
			->with("media", $media)
			->with($type, $media)
			->with("type", $type);
		return $view;
	}

}