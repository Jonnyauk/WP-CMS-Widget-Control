=== WP-CMS Widget Control ===
Contributors: Jonnyauk
Tags: widget, widgets, admin
Requires at least: 3.0.1
Tested up to: 4.4
Stable tag: 1.21
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Remove any available core, theme or plugin widgets from admin and customizer options.

== Description ==
<a href="http://codex.wordpress.org/WordPress_Widgets">Widgets</a> can be added to many areas within your theme, but you (and your users) may not need access to all the widgets provided by WordPress, your theme and other plugins.

This plugin provides simple admin controls that can remove any core WordPress widget, along with all (well coded) additional third-party widgets. Great for simplifying a cluttered widget screen, or if you limit user access to a smaller number of core widgets.

This plugin can remove the following core WordPress widgets:

* Pages widget
* Calendar widget
* Archives widget
* Meta widget
* Search widget
* Text widget
* Categories widget
* Recent Posts widget
* Recent Comments widget
* RSS Entries widget
* Tag Cloud widget
* Custom Menu widget

== Installation ==
1. Upload `wp-cms-widget-control` directory to the `/wp-content/plugins/` directory.
2. Activate the plugin through the `Plugins` menu in WordPress.
3. Go to `Settings->Widget Control` in the admin area.
4. Select options to remove widgets available in `Appearance->Widgets` and `Customizer->Widgets`.

== Frequently Asked Questions ==
= What happens if I remove a widget that I am currently using? =
**DO NOT do this!** Remove the widgets from widget areas in Appearance->Widgets before removing any widgets using this plugin. Removed widgets will be removed *permanently* from your site (not into inactive widgets) and all settings and configuration will likely be lost!

= Are settings saved for removed widgets? =
No - all active, configured widget settings in your theme will be lost when you remove a widget using this plugin. It should only be used for widgets you do not want to use in your theme.

= Will this remove the widget added by a plugin or theme? =
Almost certainly! Any well-coded theme or plugin that adds custom widgets for you to use, should show up in the options for you to remove! However, if your plugin or theme doesn't do things the WordPress way, sadly it won't be able to remove it - please contact the theme or plugin author!

== Screenshots ==
1. Admin screen for plugin (Settings->Widget Control)
2. A simplifed widget control screen (Appearance->Widgets)

== Changelog ==

= 1.21 =
* Checked full compatibility with WordPress v4.4x
* Text string changes

= 1.2 =
* Fixed full compatibility with WordPress v4.3.x and tested with v4.4rc1
* Options now control which widgets are available in Customizer too, not just admin

= 1.1 =
* Small text changes, fix text domain for translation and tested full compatibility with WordPress 3.9x

= 1.0 =
* Initial release

== Upgrade Notice ==

= 1.21 =
Confirmed compatibility with WordPress 4.4 and minor text changes.

= 1.2 =
Fixed compatibility with WordPress v4.3.x and tested with v4.4rc1. Added Customiser support.