=== Lipsum ===

Contributors: beliefmedia
Donate link: http://www.internoetics.com/
Tags: lipsum, lorem, lorem ipsum, latin, dummy text, shortcode, generator, text, placeholder
Requires at least: 3.1
Tested up to: 3.7.1
Stable tag: 0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Generate dummy Lorem ipsum text in posts and pages with shortcode. Includes a generator for unique and random customisation.

== Description ==

**Lipsum** is a highly configurable plugin that generates shortcode that'll permit you to display dummy Latin (and non Latin) Lorem ipsum text in posts/pages with shortcode. 

Features include:

* Generator shortcode (via the admin control panel) with the appropriate options that you can cut and paste into your post, page or widget. We built the little generator because of the multiple shortcode options that made fluid usage difficult.
* Options to update WP to enable shortcode in widgets and titles.
* One shortcode works on multiple posts or pages and generates new random text and paragraphs that'll be cached by page ID.
* URL options lets you define multiple URLs and have random links created in text.

Lipsum is an early version of a plugin that we use to generate a single shortcode to populate mutiple pages in different ways. Since you can define the maximum and minimum paragraph count and words in each paragraph, each page is generated and cached individually. All transient cache data is deleted upon plugin deactivation.

Lipsum utilises our own [seazon.org](http://www.seazon.org/ "Seazon API") API.

Related links:

* [Usage](http://www.beliefmedia.com/wp-plugins/hiztory.php)
* [Seazon API](http://www.seazon.org)
* [Internoetics](http://www.internoetics.com/)

== Installation ==

**To install the plugin manually:**

1. Extract the contents of the archive (zip file)
2. Upload the lipsum folder to your '/wp-content/plugins' folder
3. Activate the plugin through the Plugins section in your WordPress admin panel.

**Upload via the WordPress administration panel:**

1. Click on "Plugins" in the left panel, then click on "Add new".
2. You should now see the Install Plugins page. Click on "Upload".
3. Click on Browse and select your "lipsum.zip" file.
4. Click on "Install now", activate it and you're done!

== Screenshots ==

1. Shortcode Generator.

2. URL and shortcode filter options.

3. Example Lipsum Page.

== Changelog ==

= 0.1 =

* Initial Release.

== Upgrade Notice == 

= 0.1 =
Initial basic release.

== Frequently Asked Questions ==

**What will the plugin do?**

The plugin is in very early stages. It will retrieve data from the Seazon API and render dummy Latin Lorem Ipsum data in your page or post. There are a large number of customisable options since each page is rendered individually (meaning you can use the same shortcode on each page yet it'll remain unique).

**I can't see shortcode in my WordPress sidebar or titles. What should I do?**

There's an option in the plugin to activate/deactivate the filter that'll enable you to use shortcodes in your sidebar and title.

**What are the plans for the future?**

We plan on developing a huge number of options. They include:

* More defined Latin text.
* Support WP-centric features such as captioned and other randomly sized images. 
* Support lists, blockquotes and other text formatting.

**What happens with the large amounts of cached data?**

All transient and other data will be deleted upon plugin deactivation.

**Where can I go for more information?**

View the complete FAQs and other Hiztory information [here](http://www.beliefmedia.com/wp-plugins/lipsum.php). 