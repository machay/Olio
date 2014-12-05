Olio
Group 1:
Ylonka Machado
Ryan Gavin
Noah Tebben
Carolyn Lee
Kevan Dupont
Alyaz Mohamed
Presentation: https://prezi.com/hnovgihbjaih/olio/
(In case you'd rather not deal with the 50mb downloaded version of our presentation...that lacks
powerpoint support.)
====
So far, we've used HTML5 because of its form features. 
(Can make fields required by simply adding 'required' to end of input tag, 'email' as a type of input, etc.)

CSS3 for aesthetic purposes 
(border-radius allows for rounded borders)

Ryan:
I used a tool called Dropzone.js for my uploading, and then wrote out the file handling and moving to the correct directories in php. I also have it set to restrict it to 5 photos at a time with a max photo size of 2MB.
When each file was uploaded, it gets an image tag and gets added to a database with all the other images.
On the portfolio page, all of those image tags get outputed into the html, and formatted into the box. A photoviewer called Glisse.js then handles the lightbox functionality. 

Additional functionality I had planned to add but didn't have time:
- Working slideshow
- Ability to change photo order
- Ability to delete photos from the database and file system

Noah:
When designing the back-end for our application I structured our users table in our olio database to take in relevant professional information and personal info in a case-by-case basis, meaning not all of the fields were required for a valid profile. 
The more intense parts of the back-end work, all handled with PHP, come with the user creation; upon sign-up a folder on the user's installation is created under the given username and then dynamically filled with that user's starter files. This happens for every user, and upon each sign-up, a new table is created in our database to handle the user's uploaded files (understandably stored in an 'uploads' folder within the user's folder). While this does present some security flaws to our filestructure, and while I didn't have enough time to properly hash the passwords in our database, we do handle input parsing and guard against injection attacks. The back-end is a proof of concept, if a haphazard one. 
