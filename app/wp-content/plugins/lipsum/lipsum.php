<?php
/*
Plugin Name: Lipsum
Version: 0.1
Plugin URI: http://www.beliefmedia.com/wp-plugins/lipsum.php
Description: Generate random 'Lorum ipsum' text to populate posts and/or pages for dummy templates and websites.
Author: Marty
Author URI: http://www.beliefmedia.com/
*/


	/* Add Admin Menu Action */
	add_action('admin_menu', 'beliefmedia_lipsum');


	/* Menu & JS/CSS for Admin Page */
	function beliefmedia_lipsum() {
	 $seazon_settings = add_submenu_page( 'options-general.php', 'Lipsum Shortcode', 'Lipsum Shortcode', 'manage_options', 'lipsum-shortcode', 'seazon_shortcode_page' ); 
	 add_action( "admin_head-{$seazon_settings}", 'seazon_admin_js_css' );
	 }
	 function seazon_admin_js_css() { ?>

 	 <script language="JavaScript">
  	  function showhidefield() {
    	   if (document.frm.chkbox.checked) {
             document.getElementById("hideablearea").style.visibility = "hidden";
    	   } else {
             document.getElementById("hideablearea").style.visibility = "visible";
    	   }
  	 }
	 </script>

	<?php
	}

	/* Menu Links */
	function seazon_action_links($links, $file) {
    	   static $this_plugin;
    	   if (!$this_plugin) {
            $this_plugin = plugin_basename(__FILE__);
    	   }
    	   if ($file == $this_plugin) {
          $links[] = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/options-general.php?page=lipsum-shortcode">Settings</a>';
          $links[] = '<a href="http://www.internoetics.com/" target="_blank">Internoetics</a>';
          $links[] = '<a href="http://api.seazon.org/" target="_blank">API</a>';
    	  }
    	 return $links;
	}
	add_filter('plugin_action_links', 'seazon_action_links', 10, 2);


	/* SC Generator */
	function seazon_shortcode_page() {

	  echo '<div class="wrap"><div id="icon-tools" class="icon32"></div>';

	    if ( ($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['seazon_options'])) ) {
		echo '<div id="setting-error-settings_updated" class="updated settings-error"><p><strong>Successfully Generated Lipsum Shortcode.</strong></p></div>';
		} elseif ( ($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['shortcode_sidebar'])) ) {
		echo '<div id="setting-error-settings_updated" class="updated settings-error"><p><strong>Successfully Updated "Shortcodes in Widgets" Setting.</strong></p></div>';
		} elseif ( ($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['shortcode_title'])) ) {
		echo '<div id="setting-error-settings_updated" class="updated settings-error"><p><strong>Successfully Updated "Shortcodes in Titles" Setting.</strong></p></div>';
		} elseif ( ($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['seazon_url_options'])) ) {
		echo '<div id="setting-error-settings_updated" class="updated settings-error"><p><strong>Successfully Updated URL Options.</strong></p></div>';
		}
	
		echo '<h2>Lipsum Shortcode Generator</h2>';

		if ( ($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['seazon_options'])) ) {

		echo '<h3 class="title">Shortcode Result</h3>';
		echo "Now copy the following shortcode and paste it into your WordPress <strong>text editor</strong>.<br><br>";

		$type = $_POST['chkbox'];
		$loremipsum = $_POST['loremipsum'];
		$periods = $_POST['periods'];
		$uppercase = $_POST['uppercase'];
		$doublespaces = $_POST['doublespaces'];

		$numbers = $_POST['numbers'];
		$latinlike = $_POST['latinlike'];

		$minimum = $_POST['minimum'];
		$maximum = $_POST['maximum'];
		$minwords = $_POST['minwords'];
		$maxwords = $_POST['maxwords'];
		$minpara = $_POST['minpara'];
		$maxpara = $_POST['maxpara'];

		$upperfirst = $_POST['upperfirst'];
		$cache = $_POST['cache'];

		$links = $_POST['links'];
		$quantity = $_POST['quantity'];

		$lipsum_sc .= "&#91;lipsum";

		if (!$type) {
		$lipsum_sc .= "&nbsp;type=&quot;0&quot;";
		}

		if (!$loremipsum) {
		$lipsum_sc .= "&nbsp;lorumipsum=&quot;0&quot;";
		}

		if (!$periods) {
		$lipsum_sc .= "&nbsp;periods=&quot;0&quot;";
		}

		if (!$uppercase) {
		$lipsum_sc .= "&nbsp;uppercase=&quot;0&quot;";
		}

		if ($doublespaces) {
		$lipsum_sc .= "&nbsp;doublespaces=&quot;1&quot;";
		}

		if ($minimum) {
		$lipsum_sc .= "&nbsp;minimum=&quot;$minimum&quot;";
		}

		if ($maximum) {
		$lipsum_sc .= "&nbsp;maximum=&quot;$maximum&quot;";
		}

		if ($minpara) {
		$lipsum_sc .= "&nbsp;minpara=&quot;$minpara&quot;";
		}

		if ($maxpara) {
		$lipsum_sc .= "&nbsp;maxpara=&quot;$maxpara&quot;";
		}

		if ($minwords) {
		$lipsum_sc .= "&nbsp;minwords=&quot;$minwords&quot;";
		}

		if ($maxwords) {
		$lipsum_sc .= "&nbsp;maxwords=&quot;$maxwords&quot;";
		}

		if ($numbers) {
		$lipsum_sc .= "&nbsp;numbers=&quot;1&quot;";
		}

		if (!$latinlike) {
		$lipsum_sc .= "&nbsp;latinlike=&quot;0&quot;";
		}

		if ($links) {
		$lipsum_sc .= "&nbsp;links=&quot;1&quot;";
		}

		if ($links) {
		$lipsum_sc .= "&nbsp;quantity=&quot;$quantity&quot;";
		}

		if ($upperfirst) {
		$lipsum_sc .= "&nbsp;upperfirst=&quot;1&quot;";
		}

		if ($cache) {
		$lipsum_sc .= "&nbsp;cache=&quot;$cache&quot;";
		}

 		$lipsum_sc .= "&#93;";

		echo '<input type="text" value = "' . $lipsum_sc . '" STYLE="font-size: 16px; width: 45em;" onClick="this.select();">';

		}
		?>

		<h3 class="title">Lipsum Shortcode Generator.</h3>

		The generator will assist with creating suitable shortcode for you copy and paste into your website.


		<form action="" method="post" name="frm" id="hiztoryshortcode">
		<table class="form-table" style="width: 100%;">

			<tr>
				<th scrope="row"><label for="position"><strong>Type of text?</strong></label></th>
				<td>

 				<input type="checkbox" name="chkbox" value="1" onclick="showhidefield()" CHECKED> <em>Yes</em>, generate <strong>Latin</strong> text. Unticking generates <em>random</em> non-Latin text.
 				<div id='hideablearea' style='visibility:hidden;'>
				Include numbers in random text? <select name="numbers" id="numbers">
					<option value="0">No</option>
					<option value="1">Yes</option>
				</select>
				&nbsp;Increase vowel density to make the text more Latin-like?&nbsp;
				<select name="latinlike" id="latinlike">
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select>
				</div>
				</td>
			</tr>


			<tr>
				<th scrope="row"><label for="loremipsum">Begin the <em>first</em> paragraph with Lorem ipsum?</label></th>

				<td><select name="loremipsum" id="loremipsum">
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>


			<tr>
				<th scrope="row"><label for="periods">Use periods in sentences?</label></th>

				<td><select name="periods" id="periods">
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>

			<tr>
				<th scrope="row"><label for="type">First word in each paragraph as UPPER-case?</label></th>

				<td><select name="uppercase" id="uppercase">
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>

			<tr>
				<th scrope="row"><label for="doublespaces">Double Spaces between each sentence?</label></th>

				<td><select name="doublespaces" id="doublespaces">
					<option value="0">No</option>
					<option value="1">Yes</option>
				</select></td>
			</tr>

			<tr>
				<th scrope="row"><label for="doublespaces">Make the first letter of each word upper-case?<br><code>Useful only for titles</code></label></th>

				<td><select name="upperfirst" id="upperfirst">
					<option value="0">No</option>
					<option value="1">Yes</option>
				</select></td>
			</tr>

			<tr>
				<th scrope="row"><label for="minimum">Characters in each word:</label></th>
				<td>Minimum value :: <select name="minimum" id="minimum">

					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
				</select>
				&nbsp; and Maximum value :: &nbsp;
				<select name="maximum" id="maximum">
					<option value="12">12</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
				</select><br><code>We may return words of lesser value.</code></td>
			</tr>

			<tr>
				<th scrope="row"><label for="minpara">Minimum & Maximum paragraphs:</label></th>
				<td>Minimum paragraphs :: <select name="minpara" id="minpara">
					<option value="2">2</option>
					<option value="1">1</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
				</select>
				&nbsp; and Maximum :: &nbsp;
				<select name="maxpara" id="maxpara">
					<option value="4">4</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
				</select></td>
			</tr>


			<tr>
				<th scrope="row"><label for="minwords">Words in Paragraphs</label></th>

				<td>
				Minimum Words :: <input type="text" name="minwords" id="minwords" size="5" value="45">&nbsp;&nbsp;Maximum Words :: <input type="text" name="maxwords" id="maxwords" size="5" value="85">
				</td>
			</tr>


			<tr>
				<th scrope="row"><label for="cache">Cache Results Using WordPress Transient?</label></th>

				<td>
				<select name="cache" id="cache">
					<option value="0">0 - Nil expiry</option>
					<option value="86400">1 day</option>
					<option value="604800">1 week</option>
					<option value="604800*4">1 month</option>
					<option value="604800*4*12">1 year</option>
				</select> <code>All data deleted on deactivation</code>
				</td>
			</tr>


			<tr>
				<th scrope="row"><label for="links">Include links in generated text?</label></th>
				<td><select name="links" id="links">
					<option value="0">No</option>
					<option value="1">Yes</option>
				</select> <code>You <strong>must</strong> update URL options in the text box below.</code>
			</tr>

			<tr>
				<th scrope="row"><label for="quantity">Number of unique words to link?</label></th>
				<td>Link <select name="quantity" id="quantity">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select> unique words.
			</tr>


			<tr>

				<th scrope="row">Help:</th>
				<td>
				The best place to get any help is via the <a href="http://www.beliefmedia.com/wp-plugins/lipsum.php" target="_blank">BeliefMedia</a> website.
				</td>
			</tr>

		</table>
		<p class="submit"><input type="submit" name="seazon_options" value="Get Shortcode &raquo;" class="button button-primary"/></p>
		</form>


		<?php

		/* Shortcode Filter Option */
		if ( ($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['seazon_url_options'])) ) {
		$data = $_POST['linkurls'];
		$url_array = array();
		$url_array = explode("\n", $data);
		   foreach ($url_array as $url) {
 		    $singleURLcheck = explode(" ", $url);
 		    $url = $singleURLcheck[0];
 		    $url = trim($url);
 		    if (preg_match("#^https?://.+#", $url)) $urlString .= $url . ',';
		   }

		$urlString = rtrim($urlString, ',');

		if ( get_option('beliefmedia_url_seazon_options', 0) !== false ) {
		  update_option('beliefmedia_url_seazon_options', "$urlString");
		  } else {
		  add_option('beliefmedia_url_seazon_options', "$urlString", $deprecated = null, $autoload = 'no' );
		  }
		}


		/*
			Process shortcode option widget/title
		*/


		/* Shortcode in widget area option */
		if ( ($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['shortcode_sidebar'])) ) {
		$new_sc_value = $_POST['widget_shortcode'];
		if ( get_option('beliefmedia_widget_shortcode', 0) !== false ) {
		  update_option('beliefmedia_widget_shortcode', "$new_sc_value");
		  } else {
		  add_option('beliefmedia_widget_shortcode', "$new_sc_value", $deprecated = null, $autoload = 'no' );
		  }
		}

		/* Shortcode in title option */
		if ( ($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['shortcode_title'])) ) {
		$new_sct_value = $_POST['title_shortcode'];
		if ( get_option('beliefmedia_title_shortcode', 0) !== false ) {
		  update_option('beliefmedia_title_shortcode', "$new_sct_value");
		  } else {
		  add_option('beliefmedia_title_shortcode', "$new_sct_value", $deprecated = null, $autoload = 'no' );
		  }
		}


		/*
			URL Options
		*/


		echo '<h3>Links to Include in Generated Text</h3>';

		echo 'To enable links from this textbox in your Lipsum text, select the "Include links in generated text" option to <em>Yes</em>.';

		$url_options = get_option('beliefmedia_url_seazon_options');
		 if ($url_options != '') {
		  $urls = explode(',', $url_options);
		   foreach ($urls AS $url) {
		    $uri .= $url . "\n";
		   }
		   $uri = rtrim($uri, ',');
		 }

		echo '<table class="form-table" style="width: 100%;">';
		echo '<tr><th scrope="row"><label for="scmsg">URL Options:<br><code>Each URL on <strong>new line</strong></code></label></th>';
		echo '<form method="post" action="">';
		echo '<td><textarea name="linkurls" id="linkurls" rows="5" cols="80">' . $uri . '</textarea></td></tr>';	
		echo '</table>';
		echo '<p class="submit"><input type="submit" name="seazon_url_options" value="Update URL Options &raquo;" class="button button-primary" /></p>';
		echo '</form>';


		/*
			Enable shortcode in sidebar
		*/


		echo '<h3>Sidebar Shortcode Support?</h3>';

		echo 'Enable shortcode support to sidebar widgets? (Use <strong>only</strong> if your shortcode doesn\'t execute and instead shows plain text)';

		echo '<table class="form-table" style="width: 100%;">';
		echo '<tr><th scrope="row"><label for="scmsg">Enable Shortcodes in Widgets?</label></th>';
		echo '<form method="post" action="">';
		$seazon_sc_mg = get_option('beliefmedia_widget_shortcode');
	        ($seazon_sc_mg == '1') ? $seazon_sc_mg = '<code>Currently set to <strong>Yes</strong> (active)</code>' : $seazon_sc_mg = '<code>Currently set to <strong>No</strong> (disabled)</code>';
		echo '<td><select name="widget_shortcode" id="widget_shortcode"><option value="0">No</option><option value="1">Yes</option></select>&nbsp;<strong>Status</strong> :: ' . $seazon_sc_mg . '</td></tr>';	
		echo '</table>';
		echo '<p class="submit"><input type="submit" name="shortcode_sidebar" value="Update &raquo;" class="button button-primary" /></p>';
		// submit_button();
		echo '</form>';


		/*
			Enable shortcode in titles
		*/


		echo '<h3>Title Shortcode Support?</h3>';

		echo 'Enable shortcode support in the title area? (Use <strong>only</strong> if your shortcode doesn\'t execute and instead shows plain text)<br>Something like <code>&#91;lipsum lorumipsum="0" periods="0" minimum="3" maximum="9" minpara="1" maxpara="1" minwords="3" maxwords="4" upperfirst="1"&#93;</code> would work as a title.';

		echo '<table class="form-table" style="width: 100%;">';
		echo '<tr><th scrope="row"><label for="scmsg">Enable Shortcodes in Titles?</label></th>';
		echo '<form method="post" action="">';
		$seazon_sct_mg = get_option('beliefmedia_title_shortcode');
	        ($seazon_sct_mg == '1') ? $seazon_sct_mg = '<code>Currently set to <strong>Yes</strong> (active)</code>' : $seazon_sct_mg = '<code>Currently set to <strong>No</strong> (disabled)</code>';
		echo '<td><select name="title_shortcode" id="title_shortcode"><option value="0">No</option><option value="1">Yes</option></select>&nbsp;<strong>Status</strong> :: ' . $seazon_sct_mg . '</td></tr>';	
		echo '</table>';
		echo '<p class="submit"><input type="submit" name="shortcode_title" value="Update &raquo;" class="button button-primary" /></p>';
		echo '</form>';

	  echo '</div>';
	}


	/*
		Delete transients on deactivation
	*/

	register_deactivation_hook( __FILE__, 'remove_lipsum_transient' );
	function remove_lipsum_transient() {
		global $wpdb;
		 $wpdb->query("DELETE FROM $wpdb->options WHERE `option_name` LIKE ('_transient%_lipsum_%')" );
		 $wpdb->query("DELETE FROM $wpdb->options WHERE `option_name` LIKE ('_transient_timeout%_lipsum_%')" );
	}


	/*
		Add shortcode filter(s) if enabled
	*/


	if (get_option('beliefmedia_widget_shortcode', 0) != '0') add_filter('widget_text', 'do_shortcode');
	if (get_option('beliefmedia_title_shortcode', 0) != '0') add_filter( 'the_title', 'do_shortcode' );


	/*
		Shortcode function
	*/


	function getLipsum($atts) {
  	  extract(shortcode_atts(array(

    	   'cache' => '0',

    	   /* For all options, Yes = 1, No = 0 */

    	   'type' => '1', // 1 = latin, 0 = random
    	   'lorumipsum' => '1', // Begin first paragraph with Lorum ipsum?
    	   'periods' => '1', // Use periods in sentences?
    	   'uppercase' => '1', // First character in sentence upper case?
    	   'doublespaces' => '0', // Double spaces after each period?
    	   'upperfirst' => '0', // First letter of every word Upper-Case?

    	   /* Paragraph formatting */

    	   'minimum' => '2', // Min letters in each word?
    	   'maximum' => '9', // Max letters in each word?
    	   'minwords' => '45', //  Minimum word count?
    	   'maxwords' => '85', // Maximum word count?
    	   'minpara' => '2', // Min Paragraphs?
    	   'maxpara' => '3',  // Max Paragraphs?

    	   /* Options apply only to random text (not Latin) */

    	   'numbers' => '0', // Random numbers in text?
    	   'latinlike' => '1', // Make random text more 'latin-like'?

    	   /* Linking Options */

    	   'links' => '0', // Include random links in text?
    	   'quantity' => '1' // How many words to link (words linked multiple times)

    	  ), $atts));

	  global $post;
	  $id = get_the_ID();

    	   $options = md5("$cache-$type-$lorumipsum-$periods-$uppercase-1-$doublespaces-$numbers-$latinlike-$minimum-$maximum-$minwords-$maxwords-$minpara-$maxpara-$links-$quantity-$upperfirst-$id");
    	    $lipsumtransient = 'lipsum_' . $options;
    	    $cachedresult =  get_transient($lipsumtransient);
    	    if ($cachedresult !== false ) {
    	     return $cachedresult;

     	     } else {

    	     /* http://api.seazon.org */
    	     $result = file_get_contents("http://api.seazon.org/$type-$lorumipsum-$periods-$uppercase-1-$doublespaces/$numbers-0-$latinlike/$minimum-$maximum-$minwords-$maxwords-$minpara-$maxpara/api.txt");
    	     $wordCount = str_word_count($result);

      	   $uri_db = get_option('beliefmedia_url_seazon_options');
      	    if (($links) && ($uri_db != "")) {
       	     $urlArray = explode(',', $uri_db);
              $disallowed_words = array('sit', 'ut', 'a', 'non', 'nec', 'sed', 'eu', 'at', 'ac', 'id', 'in', 'et', 'ad', 'ut', 'mi', 'quis', 'p', '<p>', '</p>', 'hac');
              $wordCount = str_word_count($result, 1);
              $goodWords = array_diff($wordCount, $disallowed_words);
              $count = count($goodWords);
       	     $urls = count($urlArray);

             $i = 1;
             while ($i <= $quantity) {
    		$randomKey = mt_rand(2, $count);
    		$randomURL = array_rand($urlArray, 1);
    		$newWord = $goodWords["$randomKey"];
    		$rand_keys = array_rand($urlArray, 2);
    		$result = str_replace($newWord, '<a href="' . $urlArray[$randomURL] . '">' . $newWord . '</a>', $result);
    		$i++;
   		}
 	     }

	  if ($upperfirst) $result = ucwords($result);
 	  set_transient($lipsumtransient, $result, $cache);
 	  return $result;
 	  }
	}
   add_shortcode('lipsum', 'getLipsum');
?>