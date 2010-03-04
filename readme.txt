=== The SubPage Loop ===
Contributors: raysourav
Donate link: http://raysourav.com/
Tags: page,teplate,child pages,custom iterator
Requires at least: 2.0.2
Tested up to: 2.9
Stable tag: 0.1

== Description ==

This plugin creates an inner loop inside the main loop of a wordpress page. This inner loop allows user to iterate over the child page objects of the main page. 


== Installation ==

1. Upload `the-subpage-loop.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Add the following code in the page.php in your themes. Make sure that the code snippet is inside the main WP    LOOP.  while(have_subpages()): 
            the_subpage_title();
            the_subpage_content(); 
          endwhile;

== Frequently Asked Questions ==

== Screenshots ==

== Changelog ==

== Upgrade Notice ==

== License ==

Copyright (c) 2010 Sourav Ray <me@raysourav.com>

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.