<?php 
define("CURRENTURL", top_current_page());
define("CWP_TEXTDOMAIN", "TweetOldPost");
define("SETTINGSURL", admin_url('admin.php?page=TweetOldPost'));

// Settings Array
$cwp_top_settings = array(
	'name' 				=> __("Tweet Old Post", CWP_TEXTDOMAIN),
	'slug' 				=> "TweetOldPost",
	'oAuth_settings'	=> array( // Based on TOP Dev Application settings.
	    'oauth_access_token' 		=> "2256465193-KDpAFIYfxpWugX2OU025b1CPs3WB0RJpgA4Gd4h",
	    'oauth_access_token_secret' => "abx4Er8qEJ4jI7XDW8a90obzgy8cEtovPXCUNSjmwlpb9",
	    'consumer_key' 				=> "negZDmFdW1qJqcHkw6Z4EPMbH",
	    'consumer_secret' 			=> "1BiuP4yvs4JnVx7vYnV0b3NMdpXACGnxtWkQOOYJPO4Rn88QoV"
		)
);


// Options Array
$cwp_top_fields = array(

	'tweet-content' 	=> array(
			'id' 				=> '1',
			'name'  			=> __('Tweet Content', CWP_TEXTDOMAIN), 
			'type'				=> 'select',
			'slug'				=> 'tweet-content',
			'option'			=> 'top_opt_tweet_type',
			'description'		=> __('What do you want to share?', CWP_TEXTDOMAIN),
			'options'			=> array(
				'title'			=> __('Title Only', CWP_TEXTDOMAIN),
				'body'			=> __('Body Only', CWP_TEXTDOMAIN),
				'titlenbody'	=> __('Title & Body', CWP_TEXTDOMAIN),
				'custom-field'	=> __('Custom Field', CWP_TEXTDOMAIN)
				)
	),

	'tweet-content-field'	=> array(
			'id'			=> '2',
			'name'			=> __('Tweet Content Custom Field', CWP_TEXTDOMAIN),
			'type'			=> 'text',
			'slug'			=> 'tweet-content-field',
			'option'		=> 'top_opt_tweet_type_custom_field',
			'description'	=> __('Which custom field do you want to fetch info from?', CWP_TEXTDOMAIN),
			'options'		=> array()
	),

	'additional-text'	=> array(
			'id'			=> '3',
			'name'			=> __('Additional Text', CWP_TEXTDOMAIN),
			'type'			=> 'text',
			'slug'			=> 'additional-text',
			'option'		=> 'top_opt_add_text',
			'description'	=> __('Text added to your auto posts', CWP_TEXTDOMAIN),
			'options'		=> array()
	),

	'additional-text-at' 	=> array(
			'id' 			=> '4',
			'name'  		=> __('Additional Text At', CWP_TEXTDOMAIN), 
			'type'			=> 'select',
			'slug'			=> 'additional-text-at',
			'option'		=> 'top_opt_add_text_at',
			'description'	=> __('Where do you want the text to be added?', CWP_TEXTDOMAIN),
			'options'		=> array(
				'beginning'	=> __('Beginning of Tweet', CWP_TEXTDOMAIN),
				'end'		=> __('End of Tweet', CWP_TEXTDOMAIN)
				)
	),

	'include-link' 			=> array(
			'id' 			=> '5',
			'name'  		=> __('Include Link', CWP_TEXTDOMAIN), 
			'type'			=> 'select',
			'slug'			=> 'include-link',
			'option'		=> 'top_opt_include_link',
			'description'	=> __('Include a link to your post?', CWP_TEXTDOMAIN),
			'options'		=> array(
				'true'		=> __('Yes', CWP_TEXTDOMAIN),
				'false'		=> __('No', CWP_TEXTDOMAIN)
				)
	),

	'url-from-custom-field' => array(
			'id' 			=> '6',
			'name'  		=> __('Fetch URL From Custom Field', CWP_TEXTDOMAIN), 
			'type'			=> 'checkbox',
			'slug'			=> 'url-from-custom-field',
			'option'		=> 'top_opt_custom_url_option',
			'description'	=> __('URL will be fetched from a custom field.', CWP_TEXTDOMAIN),
			'options'		=> ''
	),

	'custom-field-url'		=> array(
			'id'			=> '7',
			'name'			=> __('URL Custom Field', CWP_TEXTDOMAIN),
			'type'			=> 'text',
			'slug'			=> 'custom-field-url',
			'option'		=> 'top_opt_custom_url_field',
			'description'	=> __('URL will be fetched from the specified custom field.', CWP_TEXTDOMAIN),
			'options'		=> array()
	),

	'use-url-shortner' => array(
			'id'			=> '8',
			'name'			=> __('Use URL Shortner', CWP_TEXTDOMAIN),
			'type'			=> 'checkbox',
			'slug'			=> 'use-url-shortner',
			'option'		=> 'top_opt_use_url_shortner',
			'description'	=> '',
			'options'		=> '',
	),

	'url-shortner' => array(
			'id' 			=> '9',
			'name'  		=> __('URL Shortner Service', CWP_TEXTDOMAIN), 
			'type'			=> 'select',
			'slug'			=> 'url-shortner',
			'option'		=> 'top_opt_url_shortner',
			'description'	=> __('Shorten the link to your post.', CWP_TEXTDOMAIN),
			'options'		=> array(
				'is.gd'		=> __('is.gd', CWP_TEXTDOMAIN),
				'su.pr'		=> __('su.pr', CWP_TEXTDOMAIN),
				'bit.ly'	=> __('bit.ly', CWP_TEXTDOMAIN),
				'tr.im'		=> __('tr.im', CWP_TEXTDOMAIN),
				'3.ly'		=> __('3.ly', CWP_TEXTDOMAIN),
				'u.nu'		=> __('u.nu', CWP_TEXTDOMAIN),
				'1click.at'	=> __('1click.at', CWP_TEXTDOMAIN),
				'tinyurl'	=> __('TinyUrl', CWP_TEXTDOMAIN)

				)
	),

	'custom-hashtag-option' => array(
			'id' 			=> '10',
			'name'  		=> __('Hashtags', CWP_TEXTDOMAIN), 
			'type'			=> 'select',
			'slug'			=> 'custom-hashtag-option',
			'option'		=> 'top_opt_custom_hashtag_option',
			'description'	=> __('Include #hashtags in your auto posts?', CWP_TEXTDOMAIN),
			'options'		=> array(
				'nohashtag'	=> __('Don\'t add any hashtags', CWP_TEXTDOMAIN),
				'common'	=> __('Common hashtags for all tweets', CWP_TEXTDOMAIN),
				'categories'=> __('Create hashtags from Categories', CWP_TEXTDOMAIN),
				'tags'		=> __('Create hashtags from Tags', CWP_TEXTDOMAIN),
				'custom'	=> __('Create hashtags from Custom Fields', CWP_TEXTDOMAIN)
				)
	),

	'common-hashtags'		=> array(
			'id'			=> '11',
			'name'			=> __('Common Hashtags', CWP_TEXTDOMAIN),
			'type'			=> 'text',
			'slug'			=> 'common-hashtags',
			'option'		=> 'top_opt_hashtags',
			'description'	=> __('Specify which hashtags you want to be used. eg. #example, #example2', CWP_TEXTDOMAIN),
			'options'		=> array()
	),

	'hashtags-length'		=> array(
			'id'			=> '12',
			'name'			=> __('Maximum Hashtag Length', CWP_TEXTDOMAIN),
			'type'			=> 'text',
			'slug'			=> 'hashtags-length',
			'option'		=> 'top_opt_hashtag_length',
			'description'	=> __('Set to 0 (characters) to include all.', CWP_TEXTDOMAIN),
			'options'		=> array()
	),

	'custom-hashtag-field'	=> array(
			'id'			=> '13',
			'name'			=> __('Hashtag Custom Field', CWP_TEXTDOMAIN),
			'type'			=> 'text',
			'slug'			=> 'custom-hashtag-field',
			'option'		=> 'top_opt_custom_hashtag_field',
			'description'	=> __('Fetch hashtags from specified custom field', CWP_TEXTDOMAIN),
			'options'		=> array()
	),

	'interval'				=> array(
			'id'			=> '14',
			'name'			=> __('Minimum interval between tweets', CWP_TEXTDOMAIN),
			'type'			=> 'text',
			'slug'			=> 'interval',
			'option'		=> 'top_opt_interval',
			'description'	=> __('Minimum time between tweets (Hour/Hours).', CWP_TEXTDOMAIN),
			'options'		=> array()
	),

	'age-limit'				=> array(
			'id'			=> '15',
			'name'			=> __('Minimum age of post to be eligible for tweet', CWP_TEXTDOMAIN),
			'type'			=> 'text',
			'slug'			=> 'age-limit',
			'option'		=> 'top_opt_age_limit',
			'description'	=> __('Day/Days - 0 for Disabled', CWP_TEXTDOMAIN),
			'options'		=> array()
	),

	'max-age-limit'				=> array(
			'id'			=> '16',
			'name'			=> __('Maximum age of post to be eligible for tweet', CWP_TEXTDOMAIN),
			'type'			=> 'text',
			'slug'			=> 'max-age-limit',
			'option'		=> 'top_opt_max_age_limit',
			'description'	=> __('Day/Days - 0 for Disabled', CWP_TEXTDOMAIN),
			'options'		=> array()
	),

	'no-of-tweet'			=> array(
			'id'			=> '17',
			'name'			=> __('Number of Posts to Tweet', CWP_TEXTDOMAIN),
			'type'			=> 'text',
			'slug'			=> 'no-of-tweet',
			'option'		=> 'top_opt_no_of_tweet',
			'description'	=> __('Number of posts to share each time', CWP_TEXTDOMAIN),
			'options'		=> array()
	),

	'post-type' => array(
			'id' 					=> '18',
			'name'  				=> __('Post Type', CWP_TEXTDOMAIN), 
			'type'					=> 'select',
			'slug'					=> 'post-type',
			'option'				=> 'top_opt_post_type',
			'description'			=> __('What type of items do you want to share?', CWP_TEXTDOMAIN),
			'options'				=> array(
				'post'				=> __('Post Only', CWP_TEXTDOMAIN),
				'page'				=> __('Page Only', CWP_TEXTDOMAIN),
				'custom-post-type'	=> __('Custom Post Type', CWP_TEXTDOMAIN),
				'both'				=> __('Post and Page', CWP_TEXTDOMAIN),
				)
	),

	'post-type-value' => array(
			'id' 					=> '19',
			'name'  				=> __('Custom Post Type', CWP_TEXTDOMAIN), 
			'type'					=> 'custom-post-type',
			'slug'					=> 'post-type-value',
			'option'				=> 'top_opt_post_type_value',
			'description'			=> __('Select which custom post type', CWP_TEXTDOMAIN),
			'options'				=> array()
	),

	/*'tweet-specific-category' => array(
			'id' 					=> '20',
			'name'  				=> __('Tweet From Specific Categories', CWP_TEXTDOMAIN), 
			'type'					=> 'categories-list',
			'slug'					=> 'tweet-specific-category',
			'option'				=> 'top_opt_tweet_specific_category',
			'description'			=> __('Select which categories do you want to tweet from? Blank - All', CWP_TEXTDOMAIN),
			'options'				=> array()
	),*/

	'exclude-specific-categories' => array(
			'id' 					=> '21',
			'name'  				=> __('Exclude Specific Categories', CWP_TEXTDOMAIN), 
			'type'					=> 'categories-list',
			'slug'					=> 'exclude-specific-category',
			'option'				=> 'top_opt_omit_cats',
			'description'			=> __('Select which categories do you want to exclude to tweet from? Blank - None', CWP_TEXTDOMAIN),
			'options'				=> array()
	),

);

// Default option values
$defaultOptions = array(
	'top_opt_tweet_type'				=> 'title',
	'top_opt_tweet_type_custom_field'	=> '',
	'top_opt_add_text'					=> '',
	'top_opt_add_text_at'				=> 'beginning',
	'top_opt_include_link'				=> 'false',
	'top_opt_custom_url_option'			=> 'off',
	'top_opt_use_url_shortner'			=> 'off',
	'top_opt_url_shortner'				=> 'is.gd',
	'top_opt_custom_hashtag_option'		=> 'nohashtag',
	'top_opt_hashtags'			=> '',
	'top_opt_hashtag_length'			=> '0',
	'top_opt_custom_hashtag_field'		=> '',
	'top_opt_interval'					=> '4',
	'top_opt_age_limit'					=> '30',
	'top_opt_max_age_limit'				=> '0',
	'top_opt_no_of_tweet'				=> '1',
	'top_opt_post_type'					=> 'post',
	'top_opt_post_type_value'			=> 'post',
	'top_opt_custom_url_field'			=> '',
	//'top_opt_tweet_specific_category'	=> '',
	'top_opt_omit_cats'					=> '',

	// Not field related
	'cwp_topnew_active_status'				=> 'false'
);

// Define "array_column" function for PHP versions older than 5.5
if(!function_exists("array_column")) {
	function array_column($array, $column)
		{
		    $ret = array();
		    foreach ($array as $row) $ret[] = $row[$column];
		    return $ret;
		}
}

function top_current_page(){
	$pageURL = 'http';
	if (@$_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		$pageURL .= "://";
	if (@$_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= @$_SERVER["SERVER_NAME"].":".@$_SERVER["SERVER_PORT"].@$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= @$_SERVER["SERVER_NAME"].@$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}

// Store all options in array.
$cwp_top_options_list = array_column($cwp_top_fields, 'option');