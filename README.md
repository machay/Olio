Olio
Group 1:
Ylonka Machado
Ryan Gavin
Noah Tebben
Carolyn Lee
Kevan Dupont
Alyaz Mohamed
Presentation: https://prezi.com/hnovgihbjaih/olio/
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