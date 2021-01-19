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
	return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) ) ? true : false ;
}

function isWhatIsCilane(string $id) :bool {
	if($id == 165) return true;
	if($id == 63) return true;
	if($id == 70) return true;
	if($id == 47) return true;
	if($id == 2017) return true;
	if($id == 2460) return true;
	if($id == 1116) return true;
	if($id == 1123) return true;
	if($id == 1167) return true;
	if($id == 1649) return true;

	return false;
}

function isAssociations(string $id) :bool {
	if($id == 1998) return true;
	if($id == 135) return true;
	if($id == 137) return true;
	if($id == 139) return true;
	if($id == 141) return true;
	if($id == 143) return true;
	if($id == 145) return true;
	if($id == 147) return true;
	if($id == 149) return true;
	if($id == 151) return true;
	if($id == 153) return true;
	if($id == 155) return true;
	if($id == 157) return true;
	if($id == 159) return true;
	if($id == 161) return true;
	if($id == 163) return true;

	return false;
}

function isArchives(string $id) :bool {
	if($id == 2626) return true;
	if($id == 2628) return true;
	if($id == 2632) return true;

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
	if($id == 2649) return true;
	if($id == 2653) return true;

	return false;
}

function isArticles(string $id) :bool {
	if($id == 2057) return true;
	if($id == 2138) return true;
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
	// echo isArticles($id)."t<br>";
	// echo $id;

	if(isWhatIsCilane($id))
	{
		?>
		<div id="secondary" class="widget-area" role="complementary">

			<?php dynamic_sidebar( 'sidebar-what-is-cilane-contextual' ); ?>

		</div><!-- #secondary -->
		<?php
	}
	elseif(isAssociations($id))
	{
		?>
		<div id="secondary" class="widget-area" role="complementary">

			<?php dynamic_sidebar( 'sidebar-Associations-contextual' ); ?>

		</div><!-- #secondary -->
		<?php
	}
	elseif(isArchives($id))
	{
		?>
		<div id="secondary" class="widget-area" role="complementary">

			<?php dynamic_sidebar( 'sidebar-Archives-contextual' ); ?>

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

			<?php dynamic_sidebar( 'sidebar-articles-contextual' ); ?>

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

