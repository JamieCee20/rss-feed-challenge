## RSS FEED TECHNICAL
<p>
    My choice of the RSS Feed was a cool comic site for Math, Science and Programming.
</p>
<p>The user migrations and model came natural with the laravel installation, no part of it was used.</p>

## Model
<p style="font-weight: bold;font-style: italic;">/app/Http/Models/RSSFeed</p>
<p>I made a Model to handle each item from what is stored in the database allowing the object oriented style to handle the data on the front-end</p>

## Controller
<p style="font-weight: bold;font-style: italic;">/app/Http/Controllers/RSSFeedController</p>
<p>The controller has 2 functions. A public index function and a private store function</p>
<p>The index function will run the private store function and if successfully returning data, it will get all feed items from the database in a random order
so that each refresh will change the order on the page.
This also has the functionality for sorting based on users input via the GET request, to sort newest to oldest, oldest to newest or sort by random order.
</p>
<p>The private store function that gets ran in index, takes all data from the url and encodes it json and then stored in the database accordingly via the RSSFeed Model</p>

## Migration
<p style="font-weight: bold;font-style: italic;">/database/migrations/create_r_s_s_feeds_table</p>
<p>This migration creates the table for the feed data and defines the column types as well as the size of bytes for the data. The description was set to 500 due to the content being stored.</p>

## Route
<p style="font-weight: bold;font-style: italic;">/routes/web.php</p>
<p>Just one route set out to call the RSSFeedController at function index to be displayed at the default route of /.</p>

## View
<p style="font-weight: bold;font-style: italic;">/resources/views</p>
<p>Inside layouts is an app.blade.php which holds all the basic template used as a base layout</p>
<p>Inside feeds is the show view to display the items accordingly, it also holds to javascript to display the button when card or childNodes of card is clicked (only when alt is held) and hide button if clicking anywhere else.</p>
<p>The item description is broken out of the safe tags of Laravel due to the values being stored as html tags, this would mean sanitizing the data before being stored for best protection</p>
<p>Purposefully kept an irregular design for the comics as it resembles the fact that comic pages/images are different sizes and lengths.</p>
<p>As an added feature, I added a sort by. With options to search by oldest to newest, newest to oldest or back to a random order.</p>

## Starting Server
<p>Run composer install, copy the .env.example into your root and setup a localhost db connection. Run php artisan key:generate, php artisan migrate to migrate the database for the table then php artisan serve to start the server.</p>
