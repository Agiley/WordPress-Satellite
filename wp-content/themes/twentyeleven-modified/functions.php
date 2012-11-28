<?php
add_action('template_redirect', 'slimmed_twenty_eleven_template_redirect');

function slimmed_twenty_eleven_template_redirect()
{
	global $wp_query, $post;

	if (is_author() || is_attachment() || is_day())
	{
		$wp_query->set_404();
	}

	if (is_feed())
	{
		$author 	    =   get_query_var('author_name');
		$attachment   =   get_query_var('attachment');
		$attachment   =   (empty($attachment)) ? get_query_var('attachment_id') : $attachment;
		$day		      =   get_query_var('day');

		if (!empty($author) || !empty($attachment) || !empty($day))
		{
			$wp_query->set_404();
			$wp_query->is_feed = false;
		}
	}
}


function twentyeleven_posted_on() 
{	
	echo '';
}
?>