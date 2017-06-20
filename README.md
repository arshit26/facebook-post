# facebook-post
## index.php
It is the view part.
It conatins the UI parts to which the user interacts.
It accepts a quote from the user and creates an Ajax Request to the post_image.php file.
User can also give the background color and the color of the text on the image.
It the interprets the JSON value from the Ajax call response.
## post_image.php
It is the controller part.
It accepts the user quote and creates an image out of it by calling the StringToImage.php file.
It then calls the Facebook API to upload the image on facebook.
For testing purposes, the a temporary page named Testing has been created 
For any other page the access token may be changed in the config.php file.
## config.php
It contains all the credentials and global variables
## StringToImage.php
It contains a class which has fucntions to create, save and display the image created from the quote provided by the user.
## fonts
This folder contains the fonts into which the text in the image is formatted.
More fonts as per requirements can be added into it.
## fb-sdk
This folder contains the Facebook SDK to use the Facebook classes.
## images 
This folder temporarily stores the image that is created from the user quote.

## NOTE::
For testing purposes I have deployed the code on my own server www.mydakiya.in To deploy it on a different server just the root url has to be changed in the config.php file.
