Notice Board WordPress Plugin
===================

A simple worpress plugin that provides both widgets and shortcodes to help you display notices and special announcements on your website.

----------


Description
-------------

This plugin allows you to show off notices and special announcements on your WordPress site. You can use the Notice Board widget to display recent notices and special announcements in a widget area. Or use a shortcode to display notices and special announcements within a table or as a list in the main content area for a post or page. 

> **Note:** This plugin registers a 'notice' slug for all notices as post, so don't create a page or post with 'notice' slug or set the parmalink to "http://yourwordpressdomain/notice". It would conflict with the permalinks.


----------

Installation
-------------
Notice Board plugin can be installed in your WordPress site by using any of the methods below

#### Upload Manually

 1. Download and unzip the plugin
 2. Upload the 'Notice-Board-Wordpress-Plugin-master' folder into the '/wp-content/plugins/' directory
 3. Go to the Plugins admin page and activate the plugin

#### Install from WordPress

 1. In the admin area go to Plugins > Add New and search for "Notice Board"
 2. Click install and then click activate

----------

Usage
----------------

#### Creating Notices
1. Go to Notices to View, Edit or Delete all Notices.
2. Go to Notices > Add New Notice to create a new notice .
3. Enter Title, Content, Notice url (optional) and click on the publish button.
4. To add an external link or file for the notice, use Notice url field.
5. While adding file to a notice, first upload the file to your Media Library, and just copy the file URL to the "Notice url" Field. 

> **Tip:**  You do not have to insert any media to the notice itself. Just the link to the file is required in the "Notice url" field.

#### How to Use the Notice Board Widget

1. Go to Appearance > Widgets and drag the 'Notice Board' to your widget area.  
2. Enter a Title to appear above Notices list.  For example "Recent Notices".
3. Enter how many Notices you would like to display.
4. Choose the type of Notice Display(Static or Scroll). The scroll type will display a scrolling list of notices.
5. Choose the scroll direction of Notice Display(Upwards or Downwards), and save the widget.

>![Notice board widget](https://lh5.googleusercontent.com/-vWTdirxPQkU/VJfG3vn_1fI/AAAAAAAAANg/4mvBCw2rVyU/s0/Notice-Board-Widget.png "Notice-Board-Widget.png")

#### How to Use the Shortcode
1. Navigate to the post or page you would like to add the notice table to
2. Type the shortcode `[notice-board]`
3. Customize the number of notices displayed by adding any of these parameters
	* `count` => Specify the number of notices you want to display. `[notice-board count="10"]`.  By default, 10 notices are displayed.
	* `format` => table|list specify whether to output the notices in a table or unordered list `[notice-board format="table"]`. Default = 'table'.
	* `class` => Specify the wrapping class for the notices `[notice-board class="table-bordered"]`. Default = 'table'.

Frequently Asked Questions
-------------------

1. **How can I display the notices in  my site?**
	You can use the 'Notice Board' widget to display a scrolling or static list of notices in your widget area or you can use the `[notice-board]` shortcode to display them in a post or page.
2. **How do I change the default display of the notices in a page/post?**
	When using the notice board shortcode, You can specify aditional options to controll its appearance. Refer to the usage instructions above to know about the options available. 
3. **How can I customize the CSS for the notices?**
	Both the shortcode and the widget are wrapped inside the css class 'msnb-notice' and 'widget_notice_board_widget' respectively. You can target them using their respective classes in your theme's custom CSS code.

Changelog
--------------

    = 1.0 =
    * Initial release of the plugin

