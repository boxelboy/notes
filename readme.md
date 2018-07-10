
## Notes App
This app allows the user to add notes and format them using markdown


## Installation
The Notes App is based on Laravel and can be cloned from here - https://github.com/boxelboy/notes.git
There are some migrations and database seeders which will add dummy notes and setup a user.

To install all dependencies, compile and minify you will need to run 
- *composer install*
- *npm install* 
= *npm run production*


## Usage
For the purposes of this document it is assumed that the url is http://localhost

To access the main screen goto http://localhost.

If there are any notes that are set to public they will be listed. Whilst not logged in, you will only be able to view them. To login, clck the blue button at the top right and enter the following credentials
- Username *admin*
- password *qwerty*

All notes will then be displayed and you can then edit, delete or add new notes.

There is a wysiwyg editor to allow you to modify the text or you can add it manually. All text needs to be entered into the left pane of the Note input box.

## End points
To try and futureproof the app, end points are used which can be accessed outside it. Thees are:

**Get**
- *http://localhost/notes* - displays all notes
- *http://localhost/notes/2* - displays the note with the id of 2

**Post**
- http://localhost:8000/edit - this can be used to ammend or add a new post. The JSON format that needs to be posted is:

{
    "id": ID,
    "title": "The note Title",
    "note": "The content of the note including MD"
    "private": N
}

If ID is set to null then a new note is added. If it has a valid numerical ID then the record is ammended. The value of N must be either 0 or 1 with 0 bieng publicly viewable and 1 making the note private.

**Delete**
- *http://localhost/delete/2** - deletes the note with the id of 2
