# TODO (in order of importance)
* Display directory using faculty member content type instead of drawing from an external database
* Draw DB information from faculty profiles
* Create pagination (by letter)
* Create a filter for different colleges
* Create a college directory view 
* Allow user to choose either department or college directory view
* Hide research and bio headers for non-teaching staff
* Fix compatibility with Firefox

# Resources
* [Faculty Profiles Documentation](https://byuoit.atlassian.net/wiki/spaces/WSO2/pages/1168412/Faculty+Profile) (Ask Shawn for applicationKey)
* [Dev Site](http://www3-etdev.et.byu.edu/)
* [Faculty Directory Component](https://github.com/byuweb/byu-faculty-directory)

# Considerations
The big problem with the development of this module has been dynamically creating a faculty member's profile view when clicking on their link. When choosing a design for this module that has to be taken into consideration. With a layout or block module I couldn't come up with a way of doing this. You may want to look into creating a view module. The way the module originally worked was it just created a directory page using drupal routing and then a new profile page whenever a faculty member's link was clicked. The module would just draw from the database to get the information to be displayed. The module was static, and could not be placed on other pages. It just created its own page with its own URL. At this current moment I have been in the processes of changing the module to use content types instead of drawing on information from the database. There is some issue with the twig formatting. Like I said though, you may want to look into refactoring the whole project to use views instead of implementing things the way I was doing them.

For the database, I've just webscraped and formatted data from the current faculty directory page on the college website. To keep the information current we want the database to draw from faculty profiles. You will need to look at all the different available API calls in the documentation to decide which ones you will need to use. You may need to run multiple API calls for each faculty member to get all of the necessary information. Also be aware that the information from faculty profiles is not verified, nor is it formatted uniformly.

The college view mock-ups can be found [here](https://www.figma.com/file/2kCH6vyPr3iHlETT9D9TWD/WIT-College-Directory). To integrate this you may have to change things on the component level.

Good luck, and if you have any questions you can email me directly at bradymh23@gmail.com with the subject line "BYU Web Questions". 
