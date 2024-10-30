=== Corymbus Forms ===
Contributors: corymbus
Donate link: mailto:contact@corymb.us
Tags: web forms, web pages, crm, contact form
Requires at least: 4.7
Tested up to: 6.0.3
Stable tag: 1.1.3
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Corymbus Forms provides the `[corymbus-forms]` shortcode which lets you easily embed in your website a web form/page published from the [Corymbus CRM](https://corymb.us).

== Description ==

Once you have created a web page/form within Corymbus, you can embed it in any WordPress content thanks to the `[corymbus-forms]` shortcode. The web form/page will be embedded in a HTML `IFRAME`.

= Syntax =

The syntax is as follows:

`[corymbus-forms page="tenant/slug" attr1="value1" attr2="value2" ... ]`

Where:

* `tenant` is the encoded identifier of your Corymbus subscription
* `slug` is the slug of your Corymbus web page. The `tenant/slug` combination is what follows `pages/` in the entire URL
* `attr1`, `attr2` etc. are optional HTML attributes to be given to the IFRAME embedding the web form/page. 
* `value1`, `value2` etc. are the optional values of each HTML attributes.

= Example =

If the URL of your Corymbus web form is [https://srv.corymb.us/pages/2xy54zt6bc/my-contact-form], as shown in the Corymbus web page view, then you may embed it in WordPress with the following shortcode:

`[corymbus-forms page="2xy54zt6bc/my-contact-form" style="border: none" width="50%" height="600px"]`

The additional attributes `style`, `width` and `height` will be applied to the IFRAME tag encapsulating the web form, and will ensure that no border is visible, and that the form is presented with the proper width and height.

== Installation ==

* Log into the WordPress administration dashboard
* In the main menu, go to *Plugins > Add New*
* Enter *Corymbus Forms* in the search box
* Click *Install Now* in the plugin preview box
* Click the *Activate* link to enable the plugin
* You can now insert the `[corymbus-forms]` shortcode in your pages/posts/... as described above 

== Frequently Asked Questions ==

= The shortcode does not show any web page/form, what should I do? =

* Make sure that you have installed AND activated the plugin from the WordPress settings.
* Make sure the tenant and slug are correct. To avoid any typo, you can copy-paste them from Corymbus.

= Who should I contact for help? =

Please send an email to [contact@corymb.us](mailto:contact@corymb.us). We will be pleased to help!

== Screenshots ==

1. The webpage view in Corymbus shows the tenant/slug combination.

== Changelog ==

= 1.1.3 =
* Fix issue on version tag

= 1.1.2 =
* Improve handling of optional contact.id query parameter to prefill web forms with contact information. 

= 1.1.1 =
* Add handling of contact.id to prefill web forms

= 1.0 =
* First version of the plugin.

== Upgrade Notice ==

= 1.1.3 =
* Fix issue on version tag

= 1.1.2 =
Add handling of contact.id query parameter to prefill web forms with contact information.

= 1.0 =
Initial version.
