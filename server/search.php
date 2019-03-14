<?php

// Set some variables.
$eodOpenSearch = 'https://search.books2ebooks.eu/Search/Results';

// Include required jQuery library.
require_once ('lib/jQuery.php');

// Get and sanitize input.
if (!empty($_REQUEST['lookfor'])) {

	$lookfor = htmlentities(stripslashes($_REQUEST['lookfor']));

} else {

	$lookfor = '';

}

if (!empty($_REQUEST['type'])) {

	$type = htmlentities(stripslashes($_REQUEST['type']));

} else {

	$type = '';

}

// Get search results from EOD OpenSearch interface.
$url = $eodOpenSearch.'?lookfor='.$lookfor.'&type='.$type.'&view=rss';

$context = stream_context_create(
	array (
		'http' => array (
			'method' => 'GET',
			'user_agent' => ('EOD Search Widget')
		)
	)
);

$response = @simplexml_load_string(file_get_contents($url, FALSE, $context));

if ($response instanceof SimpleXMLElement) {

	$output = '<h3>'.htmlspecialchars($response->channel->title).'</h3>';

	$output .= '<p>'.htmlspecialchars($response->channel->description).'</p>';

	$output .= '<ul>';

	foreach ($response->channel->item as $item) {

		$year = substr($item->pubDate, 7, 4);

		$output .= '<li><a href="'.htmlspecialchars($item->link).'" target="_blank">'.htmlspecialchars($item->title).'</a> ('.$year.')</li>';

	}

	$output .= '</ul>';

	$output .= '<p><a href="'.htmlspecialchars($response->channel->link).'" target="_blank">Get all results on the EOD website!</a></p>';

} else {

	$output = '<p>An error occured!</p>';

}

jQuery('#eodSearchResults')->html($output);

jQuery('#eodSearchSubmit')->removeAttr('disabled');

jQuery::getResponse();

?>