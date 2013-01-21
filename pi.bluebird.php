<?php

class Plugin_bluebird extends Plugin {
		
    var $meta = array(
        'name'       => 'Blue Bird',
        'version'    => '1.0',
        'author'     => 'Nick Snyder',
        'author_url' => 'http://fasterhorses.co'
    );
    
    public function index() {
        $count  = $this->fetch_param('count', 5, 'is_numeric');
        $screen_name = $this->fetch_param('screen_name', null);
        $include_rts  = $this->fetch_param('include_rts', true);
        $include_entities  = $this->fetch_param('$include_entities', true);
        
        $params = "screen_name=$screen_name&count=$count&include_rts=$include_rts&include_entities=$include_entities";

        if ($response = $this->twitter_curl($params)) {
	        
        	$tweets = theNest($response);
        	
					$output = array(
						"tweets" => array(),
						"user" => array()
					);
					
					foreach ($tweets as $tweet) {
					
						$tweetText = $tweet['text'];

							$entityUrl = $tweet['entities']['urls'];
							$entityHash = $tweet['entities']['hashtags'];
							$entityUser = $tweet['entities']['user_mentions'];
							
							if (!empty($entityUrl) || !empty($entityHash) || !empty($entityUser)) {
							
								foreach ($entityUrl as $url) {
									$find = $url['url'];
									$replace = '<a href="'.$find.'">'.$url['display_url'].'</a>';
									$tweetText = str_replace($find,$replace,$tweetText);
								}
							                  
								foreach ($entityHash as $hashtag) {
									$find = '#'.$hashtag['text'];
									$replace = '<a href="http://twitter.com/#!/search/%23'.$hashtag['text'].'">'.$find.'</a>';
									$tweetText = str_replace($find,$replace,$tweetText);
								}
							                  
								foreach ($entityUser as $user_mention) {
									$find = "@".$user_mention['screen_name'];
									$replace = '<a href="http://twitter.com/'.$user_mention['screen_name'].'">'.$find.'</a>';
									$tweetText = str_replace($find,$replace,$tweetText);
								}
							
							}
							
							if (!empty($tweet['entities']['media'])) {
								foreach ($tweet['entities']['media'] as $media) {
									$find = $media['url'];
									$replace = '<a href="'.$media['url'].'">'.$media['display_url'].'</a>';
									$tweetText = str_replace($find,$replace,$tweetText);
								}
							}
											
						$tweet['text'] = $tweetText;
						$tweet['tweet_url'] = "https://twitter.com/" . $tweet['user']['screen_name'] . "/status/" . $tweet['id'];
				
						array_push($output["tweets"], $tweet);
						array_push($output["user"], $tweet['user']);
						
					}				
										
					for ($i = 1; $i <= $count; $i++) {
						unset($output["user"][$i]);
					}
					
					//birdTurd($output);
	
        	return $output;
        
        }
        
        return false;
    }

		function twitter_curl($params) {        
			$request = curl_init('http://api.twitter.com/1/statuses/user_timeline.json?'.$params);
			curl_setopt($request, CURLOPT_RETURNTRANSFER, true);			
			$contents = curl_exec($request);		
			$contents = mb_convert_encoding($contents, "UTF-8");
			return json_decode($contents);
		}
}

function birdTurd($turd) {
	echo "<pre>";
	echo var_dump($turd);
	echo "</pre>";
}

function theNest($d) {
	if (is_object($d)) {
		$d = get_object_vars($d);
	}
	if (is_array($d)) {
		return array_map(__FUNCTION__, $d);
	} else {
		return $d;
	}
}