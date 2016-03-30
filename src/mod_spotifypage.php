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
 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Include the syndicate functions only once
require_once( dirname(__FILE__).DIRECTORY_SEPARATOR.'helper.php' );

// Get Parameters from Configuration
/* ========================================== */

$css = "modules/mod_spotifypage/assets/css/mod.spotifypage.css";
$fontAwesome = "https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css";

$modparams = array();

$modparams['artistSearch'] = $params->get('mod_spotifypage_artist-search');

$modparams['pageView']['showArtistName'] = $params->get('mod_spotifypage_show-artistname');
$modparams['pageView']['showArtistImage'] = $params->get('mod_spotifypage_show-artistimage');
$modparams['pageView']['showAlbums'] = $params->get('mod_spotifypage_show-albums');
$modparams['pageView']['showFollowBtn'] = $params->get('mod_spotifypage_show-follow-btn');
$modparams['pageView']['showFollowBtnPosition'] = $params->get('mod_spotifypage_show-follow-btn-position');
$modparams['pageView']['showPageLink'] = $params->get('mod_spotifypage_show-artistpagelink');
$modparams['pageView']['showFollowers'] = $params->get('mod_spotifypage_show-artistfollowers');
$modparams['pageView']['showGenres'] = $params->get('mod_spotifypage_show-artistgenres');

if ($modparams['pageView']['showArtistName'] == TRUE 
	|| $modparams['pageView']['showArtistImage'] == TRUE
	|| $modparams['pageView']['showAlbums'] == TRUE
	|| $modparams['pageView']['showFollowBtn'] == TRUE
	|| $modparams['pageView']['showPageLink'] == TRUE
	|| $modparams['pageView']['showFollowers'] == TRUE
	|| $modparams['pageView']['showGenres'] == TRUE) {
		
	$modparams['pageView']['showArtistInfos'] = TRUE;
	
}


$modparams['albumView']['showTitle'] = $params->get('mod_spotifypage_album_show-title');
$modparams['albumView']['showPlayOn'] = $params->get('mod_spotifypage_album_show-playonspotify');

$modparams['libs']['css'] = ($params->get('mod_spotifypage_libs_load-css') == 1) ? $css : false;
$modparams['libs']['fontawes'] = ($params->get('mod_spotifypage_libs_load-fontawes') == 1) ? $fontAwesome : false;
$modparams['frontendSignature'] = "by BrainSpotifyPage";

// get the items to display from the helper
$modData = new spotifyPage();
$modData = $modData->loadSpotifyPage($modparams);

require( JModuleHelper::getLayoutPath( 'mod_spotifypage', $params->get('layout', 'default' )));


?>