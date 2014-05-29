=== WP-CMS Widget Control ===
Contributors: Jonnyauk
Tags: widget, widgets, admin
Requires at least: 3.0.1
Tested up to: 3.9.1
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Remove any core, theme or plugin widgets from the Widgets admin screen.

== Description ==
[Widgets](http://codex.wordpress.org/WordPress_Widgets \"WordPress Codex - Widgets\") can be added to many areas within your theme, but you (and your users) may not need access to all the widgets available.

WordPress, your theme and plugins add additional widgets available to be used within your theme. This plugin provides simple admin controls that can remove any core WordPress widget, along with all (well coded) additional third-party widgets. Great for simplifying a cluttered widget screen, or if you limit user access to a smaller number of core widgets.

Can remove the following core WordPress widgets:

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
1. Upload \"wp-cms-widget-control\" directory to the \"/wp-content/plugins/\" directory.
2. Activate the plugin through the \"Plugins\" menu in WordPress.
3. Go to Settings->Widget Control in the admin area.
4. Select options to remove widgets available in Appearance->Widgets.

== Frequently Asked Questions ==
= What happens if I remove a widget that I am currently using? =
**DO NOT do this!** It\'s best to remove the widgets from widget areas in Appearance->Widgets before removing any widgets using this plugin. Removed widgets will be removed *permanently* from your site (it won\'t go into inactive widgets) and all settings and configuration will be lost.

= Are settings saved for removed widgets? =
No - all active, configured widget settings in your theme will be lost when you remove a widget using this plugin. It should only be used for widgets you do not want to use in your theme.

== Screenshots ==
1. Admin screen for plugin (Settings->Widget Control)
2. A simplifed widget control screen (Appearance->Widgets)

== Changelog ==
= 1.0 =
* Initial release.