<?php
/**
*
@file
 * Adaptivetheme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * Adaptivetheme supplied variables:
 * - $site_logo: Themed logo - linked to front with alt attribute.
 * - $site_name: Site name linked to the homepage.
 * - $site_name_unlinked: Site name without any link.
 * - $hide_site_name: Toggles the visibility of the site name.
 * - $visibility: Holds the class .element-invisible or is empty.
 * - $primary_navigation: Themed Main menu.
 * - $secondary_navigation: Themed Secondary/user menu.
 * - $primary_local_tasks: Split local tasks - primary.
 * - $secondary_local_tasks: Split local tasks - secondary.
 * - $tag: Prints the wrapper element for the main content.
 * - $is_mobile: Mixed, requires the Mobile Detect or Browscap module to return
 *   TRUE for mobile.  Note that tablets are also considered mobile devices.
 *   Returns NULL if the feature could not be detected.
 * - $is_tablet: Mixed, requires the Mobile Detect to return TRUE for tablets.
 *   Returns NULL if the feature could not be detected.
 * - *_attributes: attributes for various site elements, usually holds id, class
 *   or role attributes.
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Core Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * Adaptivetheme Regions:
 * - $page['leaderboard']: full width at the very top of the page
 * - $page['menu_bar']: menu blocks placed here will be styled horizontal
 * - $page['secondary_content']: full width just above the main columns
 * - $page['content_aside']: like a main content bottom region
 * - $page['tertiary_content']: full width just above the footer
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see adaptivetheme_preprocess_page()
 * @see adaptivetheme_process_page()
 */
?>
<style>
.inventory {
  font-size: 150%;
}

#edit-submit-button {
box-shadow: 0 5px #666;
border-radius: 12px;
color: #000000; 
line-height: 2em;
position: relative;
bottom: -15px;
}

#after_div {
position: relative;
bottom: -55px;
color: #000000;
}

#confirm {
line-height: 2em;
font-size: 25px;
box-shadow: 0 5px #666;
border-radius: 12px;
color: #008000;
bottom: -100px;
font-weight: bold;
position: relative;
}

#add {
line-height: 2em;
box-shadow: 0 5px #666;
border-radius: 12px;
bottom: -100px;
position: relative;
left: 15px;
color: #000000;
}

#Flag {
line-height: 2em;
font-size: 25px;
box-shadow: 0 5px #666;
border-radius: 12px;
color: #FF0000;
bottom: -100px;
font-weight: bold;
position: relative;
left: 30px;
}

#after_div {
font-size: 75%;
position: relative;
}

#edit-save-item-button {
box-shadow: 0 5px #666;
border-radius: 12px;
line-height: 2em;
position: relative;
}
#home-button {
line-height: 2em;
color: black;
background-color:#D8D8D8;
position: relative;
bottom: -10px;
}
body {
padding-bottom: 100px;
}

</style>

    <!-- !Messages and Help -->
   		<?php print $messages; ?>
			<?php print render($page['help']); ?>

    <!-- Moves the content over to the right a little-->
   		<<?php print $tag; ?> id="main-content">
			<?php print render($title_prefix); // Does nothing by default in D7 core ?>

    <!-- !Main Content -->
	<div ><a class="button" id="home-button"  href="/">Back to Home Page!</a></div>
		<div class='inventory'>
        	<?php if ($content = render($page['content'])): ?>
            	<div id="content" class="region">
                	<?php print $content; ?>
              	</div>
            <?php endif; ?>
        </div>
    <!-- !Feed Icons -->
    	<?php print $feed_icons; ?>
     		<?php print render($title_suffix); // Prints page level contextual links ?>
      			</<?php print $tag; ?>><!-- /end #main-content -->

    <!-- !Content Aside Region-->
    	<?php print render($page['content_aside']); ?>

    <!-- !Sidebar Regions -->
        <?php $sidebar_first = render($page['sidebar_first']); print $sidebar_first; ?>
        	<?php $sidebar_second = render($page['sidebar_second']); print $sidebar_second; ?>

    <!-- !Tertiary Content Region -->
    	<?php print render($page['tertiary_content']); ?>

    <!-- Four column Gpanel -->
    <?php if (
      $page['four_col1'] ||
      $page['four_col2'] ||
      $page['four_col3'] ||
      $page['four_col4']
    ): ?>
    <div class="four-col-container">
        <?php print render($page['four_col1']); ?>
        <?php print render($page['four_col2']); ?>
        <?php print render($page['four_col3']); ?>
        <?php print render($page['four_col4']); ?>
    </div>
    <?php endif; ?>

<script>
        window.onload = function(){
                document.getElementById('edit-barcode').focus();
        };
</script>
