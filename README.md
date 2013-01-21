# Bluebird (***Twitter Plugin for Statamic***)

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
		{{ tweets }}
			<div>
				<a href="https://twitter.com/{{ user:screen_name }}">
					<img src="{{ user:profile_image_url }}" alt="{{ user:screen_name }} on Twitter">
					Follow Me on Twitter!
				</a>
				<ul>
					<li>{{ user:followers_count }} Followers</li>
					<li>Listed {{ user:listed_count }} times</li>
				</ul>
			</div>
		{{ /tweets }}
	{{ /bluebird }}

## Documentation

### Variables

* {{ created_at }} - echos the 
* {{ id }} - ID of the tweet
* {{ id_str }} - ID of the tweet in a string
* {{ text }} - actual tweet
* {{ source }} - client used for the tweet
* {{ retweet_count }} - amount of times the tweet has been retweeted
* {{ favorited }} - amount of times the tweet has been favorited
* {{ retweeted }} - returns true if tweet was a retweet, rather than original
* {{ user:id }}
* {{ user:id_str }}
* {{ user:name }}
* {{ user:screen_name }}
* {{ user:location }}
* {{ user:url }}
* {{ user:description }}
* {{ user:protected }}
* {{ user:followers_count }}
* {{ user:friends_count }}
* {{ user:listed_count }}
* {{ user:created_at }}
* {{ user:favourites_count }}
* {{ user:time_zone }}
* {{ user:verified }}
* {{ user:status_count }}
* {{ user:profile_image_url }}




