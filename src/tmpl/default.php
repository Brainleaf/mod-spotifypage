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

/* Libs & CSS */
/* ================================= */

// Module CSS
if ($modparams['libs']['css'] !== FALSE) {
	JFactory::getDocument()->addStyleSheet($modparams['libs']['css']);
}

// FontAwesome CSS
if ($modparams['libs']['fontawes'] !== FALSE) {
    JFactory::getDocument()->addStyleSheet($modparams['libs']['fontawes']);
}

?>

<div class="brainSpotifyPage">
	<div class="brainSpotifyPage_wrapper">
		
		<?php if($modparams['pageView']['showArtistInfos'] == TRUE): ?>
		<!-- ARTIST INFO -->
		<!-- ====================================================== -->
		<div class="brainSpotifyPage_artist-infos">
			
			<?php if($modparams['pageView']['showArtistImage'] == TRUE): ?>
			<!-- Image -->	
			<div class="brainSpotifyPage_artist-image">
				<img src="<?php echo $modData['artistInfos']['images'][0]['url'] ?>" alt="Artist Image">
			</div>
			<?php endif; ?>
			
			<div class="brainSpotifyPage_artist-text">
				
				<?php if($modparams['pageView']['showArtistName'] == TRUE): ?>
				<!-- Name -->
				<div class="brainSpotifyPage_artist-name">
					<h4><?php echo $modData['artistInfos']['name']; ?></h4>
				</div>
				<?php endif; ?>
				
				<!-- Details -->
				<?php if($modparams['pageView']['showPageLink'] == TRUE || $modparams['pageView']['showFollowers'] == TRUE || $modparams['pageView']['showGenres'] == TRUE ): ?>
				<div class="brainSpotifyPage_artist-details">

					<?php if($modparams['pageView']['showPageLink'] == TRUE): ?>
					<!-- Artist's Page Link -->
					<div class="spotify-page">
						<a href="<?php echo $modData['artistInfos']['page']; ?>" title="Spotify"><i class="fa fa-spotify"></i> <?php echo JText::_( 'MOD_SPOTIFYPAGE_TXT_SPOTIFY-PAGE' ); ?></a>
					</div>
					<?php endif; ?>
					
					<?php if($modparams['pageView']['showFollowers'] == TRUE): ?>
					<!-- Artist's Followers -->
					<div class="spotify-followers">
						<h5><i class="fa fa-users"></i> <?php echo JText::_( 'MOD_SPOTIFYPAGE_TXT_FOLLOWERS' ); ?></h5>
						<span><?php echo $modData['artistInfos']['followers']; ?></span>
					</div>
					<?php endif; ?>
					
					<?php if($modparams['pageView']['showGenres'] == TRUE): ?>
					<!-- Artist's Genres -->	
					<div class="spotify-genres">
						<h5><i class="fa fa-tags"></i> <?php echo JText::_( 'MOD_SPOTIFYPAGE_TXT_GENRES' ); ?></h5>
						<?php foreach ($modData['artistInfos']['genres'] as $genre): ?>
							<span class="spotify-genre-tag">
								<?php echo $genre; ?>
							</span>
						<?php endforeach;?>
					</div>
					<?php endif; ?>
					
				</div>
				<?php endif; ?>
				
			</div>		
			
		</div>
		<!-- ====================================================== -->
		<?php endif; ?>
		
		
		<?php if($modparams['pageView']['showFollowBtn'] == TRUE && $modparams['pageView']['showFollowBtnPosition'] == "1" || $modparams['pageView']['showFollowBtnPosition'] == "3"): ?>
		<!-- FOLLOW BUTTON -->
		<!-- ====================================================== -->
		<div class="brainSpotifyPage_artist-follow ptop">
			<iframe src="https://embed.spotify.com/follow/1/?uri=spotify:artist:<?php echo $modData['artistInfos']['id']; ?>&size=detail&theme=light" width="300" height="56" scrolling="no" frameborder="0" style="border:none; overflow:hidden;" allowtransparency="true"></iframe>
		</div>
		<!-- ====================================================== -->
		<?php endif; ?>
		
		
		<?php if($modparams['pageView']['showAlbums'] == TRUE): ?>
		<!-- ALBUMS -->
		<!-- ====================================================== -->
		<h3><?php echo JText::_( 'MOD_SPOTIFYPAGE_TXT_ALBUMS-TITLE' ); ?></h3>
		<div class="brainSpotifyPage_artist-albums">
			<?php for($i=0; $i<count($modData['artistAlbums']); $i++): ?>
				<!-- Single Album -->
				<div class="brainSpotifyPage_artist-album">
					<div class="brainSpotifyPage_artist-album-inner">
						<!-- Image -->
						<div class="brainSpotifyPage_artist-album-image">
							<a href="<?php echo $modData['artistAlbums'][$i]['external_urls']['spotify'] ?>" title="Play on Spotify" target="_blank">
								<img src="<?php echo $modData['artistAlbums'][$i]['images'][0]['url'] ?>" alt="Artist Image">
								<div class="brainSpotifyPage_artist-album-image-over">
									<i class="fa fa-spotify"></i>
								</div>	
							</a>
						</div>
						<?php if($modparams['albumView']['showTitle'] == TRUE || $modparams['albumView']['showPlayOn'] == TRUE): ?>
						<!-- Details -->
						<div class="brainSpotifyPage_artist-album-details">
							
							<?php if($modparams['albumView']['showTitle'] == TRUE): ?>
							<h5><?php echo $modData['artistAlbums'][$i]['name'] ?></h5>
							<?php endif; ?>
							
							<?php if($modparams['albumView']['showPlayOn'] == TRUE): ?>
							<div class="brainSpotifyPage_artist-album-playonspotify">
								<a href="<?php echo $modData['artistAlbums'][$i]['external_urls']['spotify'] ?>" title="Play on Spotify" target="_blank">
				                    <img src="https://developer.spotify.com/wp-content/uploads/2014/06/play_on_spotify-green.png" />
				                </a>
							</div>
							<?php endif; ?>
							
						</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endfor; ?>
			
		</div>
		<!-- ====================================================== -->
		<?php endif; ?>
		
		<?php if($modparams['pageView']['showFollowBtn'] == TRUE && $modparams['pageView']['showFollowBtnPosition'] == "2" || $modparams['pageView']['showFollowBtnPosition'] == "3"): ?>
		<!-- FOLLOW BUTTON -->
		<!-- ====================================================== -->
		<div class="brainSpotifyPage_artist-follow">
			<iframe src="https://embed.spotify.com/follow/1/?uri=spotify:artist:<?php echo $modData['artistInfos']['id']; ?>&size=detail&theme=light" width="300" height="56" scrolling="no" frameborder="0" style="border:none; overflow:hidden;" allowtransparency="true"></iframe>
		</div>
		<!-- ====================================================== -->
		<?php endif; ?>
		
	</div>
</div>

<div class="brainSpotifyPage_signature">
	<?php echo $modparams['frontendSignature']; ?>
</div>
