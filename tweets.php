<!DOCTYPE html>
<html>
<head>

    <script>
        // Twitter API configuration
        var config = {
            consumerKey: 'gcF8NyUn2qWVSWK5tGPmSGl8Y',
            consumerSecret: 'Rv2YYcqLiq61MDFbL1k38Jp6eJ5zOvxgiULZTXeXsv6VoNKS2W',
            accessToken: '1602093551688552448-4EsunCsJ34PkmXzclKTyIAcxr9XxGa',
            accessTokenSecret: '8ziOYyD9lUsbKS9dOg3cixp9T9dypybPP26dC4KMBXzd1',
            screenNames: ['BookRiot', 'goodreads', 'nytimesbooks'], // Array of screen names for books-related accounts
            tweetCount: 10 // Number of tweets to display
        };

        // Load Twitter API and fetch tweets
        window.twttr = (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0],
                t = window.twttr || {};
            if (d.getElementById(id)) return t;
            js = d.createElement(s);
            js.id = id;
            js.src = "https://platform.twitter.com/widgets.js";
            fjs.parentNode.insertBefore(js, fjs);

            t._e = [];
            t.ready = function(f) {
                t._e.push(f);
            };

            return t;
        }(document, "script", "twitter-wjs"));

        twttr.ready(function() {
            // Fetch user timelines
            config.screenNames.forEach(function(screenName, index) {
                twttr.widgets.createTimeline(
                    {
                        sourceType: 'profile',
                        screenName: screenName
                    },
                    document.getElementById('twitter-container-' + (index + 1)),
                    {
                        chrome: 'noheader nofooter',
                        tweetLimit: config.tweetCount
                    }
                );
            });
        });
    </script>
    <style>
       body {
    width: 50%;
    margin: 0 auto;
    background-color: #0F1415;
    font-family: Arial, sans-serif;
    color: #f5f5f5;
}

.tweet-container {
    margin-bottom: 20px;
    text-align: center;
}

.tweet-container h2 {
    margin: 10px 0;
    font-size: 18px;
    font-weight: bold;
}

.tweet-container .twitter-timeline {
    max-width: 300px;
    margin: 0 auto;
}

.title {
    text-align: center;
    color: #f5f5f5;
    font-size: 24px;
    font-weight: bold;
    margin-top: 20px;
}

/* Optional: Add some spacing between the tweet containers */
.tweet-container:not(:last-child) {
    margin-bottom: 60px;
}

    </style>
</head>
<body>
    
    <div class="tweet-container">
        <h2>BookRiot</h2>
        <div id="twitter-container-1"></div>
    </div>

    <div class="tweet-container">
        <h2>Goodreads</h2>
        <div id="twitter-container-2"></div>
    </div>

    <div class="tweet-container">
        <h2>NYTimes Books</h2>
        <div id="twitter-container-3"></div>
    </div>
</body>
</html>
