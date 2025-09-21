<?php
//Community Mapper.php
// This script fetches the information for some polygons from an API I built

echo "Hello World";

// 1. I am defining the location of the api
$apiUrl = 'https://www.bbe.com.jm/api/get-communities.php';


//2. Create the stream contents, this is like giving instructions to file_get_contents on how to do the http request.

$contextOptions = [
	'http' => [
		'method' => 'GET', //asking for data  from the API
		'header' => 'User-Agent: CommunityMapperCLI/1.0\r\n', //some servers block empty User-Agents
		'timeout' => 15 // give up if nothing is received after 15 seconds
	],
	'ssl' => [
		'verify_peer' => false, //WARNING: this bypasses SSL certificate checks.
		'verify_peer_name' => false, 
	]
];

$context = stream_context_create($contextOptions);
// 3. Fetch the data using file_get_contents
// The '@' symbol suppresses any warnings, so we can handle errors ourselves cleanly.
echo "Fetching data from API...\n";
$jsonData = @file_get_contents($apiUrl, false, $context);



?>