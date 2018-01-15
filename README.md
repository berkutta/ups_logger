# UPS Logger

![graph example](https://raw.githubusercontent.com/berkutta/ups_logger/master/screenshot.png)

This is a dumb and very bad written Software to get the Voltage from your APC UPS (via apcaccess) and store it together with the date into json files.

Those JSON files are then used to generate a nice graphic. Perfect to see if your Mains Voltage is dipping for any reason. The current implementations does a meassurement every 5s. I honestly have no clue if the APC UPS even updates this value that often

## log.php

This is the file which does the apcaccess readout and save the results into JSON files. It has a while 1 loop so just run it in a *nix screen or so. Please don't kill me. This whole project is just a "I need some graphs" project.

## index.php

This is the file which converts the JSON files into a graph. It uses the [jpgraph](http://jpgraph.net/) library for that.


