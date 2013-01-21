# Bluebird 
## A Twitter Plugin for Statamic CMS by Nick Snyder ([http://fasterhorses.co](http://fasterhorses.co))

## Usage

	{{ bluebird screen_name="_FasterHorses" count="1" }}
		{{ tweets }}
			<div>
				<p>{{ text }}</p>
				<p>
					<small>
						<a href="https://twitter.com/{{ user:screen_name }}/status/{{ id }}">{{ created_at format="F jS, Y" }}</a>
					</small>
				</p>
			</div>
		{{ /tweets }}
		{{ user }}
			<div>
				<a href="https://twitter.com/{{ screen_name }}">
					<img src="{{ user:profile_image_url }}" alt="{{ screen_name }} on Twitter">
					Follow Me on Twitter!
				</a>
				<ul>
					<li>{{ followers_count }} Followers</li>
					<li>Listed {{ listed_count }} times</li>
				</ul>
			</div>
		{{ /user }}
	{{ /bluebird }}

## Variables

BlueBird contains two tag pairs: {{ tweets }} and {{ user }}.

The {{ tweets }} tag pair allows you access to everything in the Twitter API. Using the Statamic shorthand of {{ level1:level2 }}, you can access nested arrays.

* {{ created_at }} - Echos the creation date of the tweet; You may use PHP's date functions to format (e.g. {{ created_at format="F jS, Y" }} )
* {{ id }} - ID of the tweet in number format
* {{ id_str }} - ID of the tweet in string format
* {{ text }} - Actual tweet
* {{ source }} - Client used for the tweet
* {{ retweet_count }} - Amount of times the tweet has been retweeted
* {{ favorited }} - Amount of times the tweet has been favorited
* {{ retweeted }} - Returns true if tweet was a retweet, rather than original
* {{ user:id }} - ID if the user in number format
* {{ user:id_str }} - ID if the user in string format
* {{ user:name }} - Full name of the user
* {{ user:screen_name }} - User's Twitter handle
* {{ user:location }} - User's location (per the profile, rather than tweet)
* {{ user:url }} - User's URL
* {{ user:description }} - User's description
* {{ user:protected }} - Returns true if the user has a protected account
* {{ user:followers_count }} - Number of followers
* {{ user:friends_count }} - Number of friends
* {{ user:listed_count }} - Amount of times the user has been lsited
* {{ user:created_at }} - User's join date
* {{ user:favourites_count }} - Amount of favorites the user has
* {{ user:time_zone }} - User's Time Zone
* {{ user:verified }} - Returns true if the user has a verified account
* {{ user:status_count }} - Number of tweets
* {{ user:profile_image_url }} - URL of the user's profile image

The {{ user }} tag pair allows you to return just user data without displaying tweets.

* {{ id }} - ID if the user in number format
* {{ id_str }} - ID if the user in string format
* {{ name }} - Full name of the user
* {{ screen_name }} - User's Twitter handle
* {{ location }} - User's location (per the profile, rather than tweet)
* {{ url }} - User's URL
* {{ description }} - User's description
* {{ protected }} - Returns true if the user has a protected account
* {{ followers_count }} - Number of followers
* {{ friends_count }} - Number of friends
* {{ listed_count }} - Amount of times the user has been lsited
* {{ created_at }} - User's join date
* {{ favourites_count }} - Amount of favorites the user has
* {{ time_zone }} - User's Time Zone
* {{ verified }} - Returns true if the user has a verified account
* {{ status_count }} - Number of tweets
* {{ profile_image_url }} - URL of the user's profile image




