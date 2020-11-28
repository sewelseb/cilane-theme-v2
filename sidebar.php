<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/#sidebar-php
 *
 * @package Primer
 * @since   1.0.0
 */

if ( ! primer_layout_has_sidebar() || ! is_active_sidebar( 'sidebar-1' ) ) return;


function isAPost() {
	global  $post;
	$posttype = get_post_type($post );
	return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;
}

function isWhatIsCilane(string $id) :bool {
	if($id == 165) return true;

	return false;
}

function isCongres(string $id) :bool {
	if($id == 1449) return true;
	if($id == 1638) return true;
	if($id == 1576) return true;

	return false;
}

function isJugendaustausch(string $id) :bool {
	if($id == 72) return true;

	return false;
}

function isArticles(string $id) :bool {
	if($id == 2057) return true;
	if(is_home()) return true;
	if(isAPost()) return true;

	return false;
}

function isWhoIsWho(string $id) :bool {
	if($id == 34) return true;
	if($id == 66) return true;

	return false;
}


?>

<?php
	if(isWhatIsCilane($id))
	{
		?>
		<div id="secondary" class="widget-area" role="complementary">

			<?php dynamic_sidebar( 'sidebar-what-is-cilane-contextual' ); ?>

		</div><!-- #secondary -->
		<?php
	}
	elseif(isCongres($id))
	{
		?>
		<div id="secondary" class="widget-area" role="complementary">

			<?php dynamic_sidebar( 'sidebar-congres-contextual' ); ?>

		</div><!-- #secondary -->
		<?php
	}
	elseif(isJugendaustausch($id))
	{
		?>
		<div id="secondary" class="widget-area" role="complementary">

			<?php dynamic_sidebar( 'sidebar-Jugendaustausch-contextual' ); ?>

		</div><!-- #secondary -->
		<?php
	}
	elseif(isArticles($id))
	{
		?>
		<div id="secondary" class="widget-area" role="complementary">

			<?php dynamic_sidebar( 'sidebar-Articles-contextual' ); ?>

		</div><!-- #secondary -->
		<?php
	}
	elseif(isWhoIsWho($id))
	{
		?>
		<div id="secondary" class="widget-area" role="complementary">

			<?php dynamic_sidebar( 'sidebar-who-is-who-contextual' ); ?>

		</div><!-- #secondary -->
		<?php
	}
	elseif(is_front_page()) //do not display on landing page 
	{

	}
	else
	{
		?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>

		</div><!-- #secondary -->
		<?php
	}
?>

