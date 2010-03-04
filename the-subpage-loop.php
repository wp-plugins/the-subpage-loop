<?php
/*
 Plugin Name: The SubPage Loop
 Plugin URI: http://app.raysourav.com/wp-plugins/the-subpage-loop.html
 Description: This plugin can create an inner loop inside the main loop of a wordpress page. This inner loop allows user to iterate over the child page objects of the main page.
 Version: 0.1
 Author: Sourav Ray
 Author URI: http://raysourav.com
 */

 /*
  ***************************************************************************
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
  *****************************************************************************
 */
error_reporting(E_ALL);

function get_sub_pages($string='') {
	$id = get_the_ID();
	$pages = get_pages('depth=1');

	$topParent = null;
	foreach($pages as $page) {
		if ($page->post_parent == "0") {
			if ($page->ID == $id) {
				$topParent = $id;
			}
		}
	}

	if($topParent == null) {
		foreach($pages as $page) {
			if ($page->post_parent == "0") {
				$pageID = $page->ID;
				$subpages = get_pages('child_of='.$pageID);
				foreach($subpages as $subpage) {
					if ($subpage->ID == $id) {
						$topParent = $pageID;
					}
				}
			}
		}
	}

	$subpages = get_pages('child_of='.$topParent);

	if(is_array($subpages ) && count($subpages )>0)
	 $returnArr=$subpages;
	else
	 $returnArr=array();
	return $returnArr;
}

function have_subpages(){
	static $subpages = null;
	global $currnetSubPage;
	if(!is_array($subpages))
		$subpages = get_sub_pages();

	if(count($subpages)>0){
		$currnetSubPage=array_shift($subpages);
		$returnBool=true;
    }else{
    	$returnBool=false;
	}

	return $returnBool;
}

function the_subpage(){
	global $currnetSubPage;

	var_dump($currnetSubPage);
	echo "<br/><br/>";

}


// template functions

function the_subpage_content( $echo = true) {
	global $currnetSubPage;
	$content = $currnetSubPage->post_content;
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);

	if ( $echo )
		echo $content;
	else
		return $content;
}


function the_subpage_title($before = '', $after = '', $echo = true) {
	global $currnetSubPage;
	$title = $currnetSubPage->post_title;
	if ( strlen($title) == 0 )
		return;

	$title = $before . $title . $after;
	if ( $echo )
		echo $title;
	else
		return $title;
}

function the_subpage_id( $echo = true) {
	global $currnetSubPage;
	$id = $currnetSubPage->ID;
	if ( isnull($id))
		return;

	if ( $echo )
		echo $id;
	else
		return $id;
}
