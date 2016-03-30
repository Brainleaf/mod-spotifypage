<?php

/**
*   @package BrainSpotifyPage
*   @subpackage Modules
*   @link http://www.brainleaf.eu
*   @license GNU/GPL
*
*   ==================================================================
*   BRAINLEAF Spotify Page
*   ==================================================================
*   Simple module to show a Spotify artist page inside your Joomla.
*   ==================================================================
* 
*   Author: BRAINLEAF Communication | http://brainleaf.eu | (C) 2016
*   Compatibility: Joomla 3.2.x or superior
* 
*   ==================================================================
*/ 

defined('_JEXEC') or die('Restricted access');

class spotifyPage {
		
	private $searchUrl = "https://api.spotify.com/v1/search?";
		
	public function loadSpotifyPage($modparams) {
		$artistName = str_replace(" ", "+", $modparams['artistSearch']);
		$moduleData['artistInfos'] = $this->getArtistInfos($artistName);
		$moduleData['artistAlbums'] = $this->getArtistAlbums($artistName);
		return $moduleData;
	}	
		
	private function getArtistInfos($artistName) {
		$query = "q=" .$artistName. "&type=artist";
		$json = file_get_contents($this->searchUrl.$query);	
		$infos = json_decode($json,true);
		$artistInfo['id'] = $infos['artists']['items'][0]['id'];
		$artistInfo['name'] = $infos['artists']['items'][0]['name'];
		$artistInfo['page'] = $infos['artists']['items'][0]['external_urls']['spotify'];
		$artistInfo['genres'] = $infos['artists']['items'][0]['genres'];
		$artistInfo['images'] = $infos['artists']['items'][0]['images'];
		$artistInfo['followers'] = $infos['artists']['items'][0]['followers']['total'];
		return $artistInfo;
	}	 
		
	private function getArtistAlbums($artistName)	{
		$query = "q=" .$artistName. "&type=album";
		$json = file_get_contents($this->searchUrl.$query);	
		$albums = json_decode($json,true);
		$artistAlbums = $albums['albums']['items'];
		return $artistAlbums;
	}
    
}

?>