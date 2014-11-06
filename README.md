news-on-time - A virtual notice board
=====================================


This project is a web application which plays the role of a notice board. It started as an idea to solve the defeciencies of the email system of communicating events to the Ashesi University College community. The app provides a central hub where members can post and view information regarding social events and activities happening on campus.

Problem and Solution Generation
-------------------------------

### Scenario Name
News on time

### Problems Identified
Students who do not have email privileges to the whole school normally advertise through the few notice boards around the school. However, this has come to be a rather inefficient means because:
* Students rarely pay attention to the notice boards
* Sometimes when they do pay attention, the event has already happened
* Strong winds sometimes blow the fliers off the notice boards
* The information cannot be accessed from off campus.

### Payoff
With the news on time app:
* Students without email privileges can advertise or convey messages to the Ashesi community
* News is categorized into different genres
* You can conveniently check news and notices from your laptop instead of walking to a notice board
* All notices seen are not in the past.

Team Memmbers
-------------
| Name                                | Primary Role	          | Secondary Role(s)            |
| :---------------------------------- | :------------------------ | :--------------------------- |
| **Carl Yao Agbenyega**              | Interaction design	  | Team Leader                  |
| **Edem Anaglo**	              | Project Management	  | Interaction Design/Architect |
| **Gloria Boatemaa Karikari-Yeboah** | Architect	          | Software Design Engineer     |
| **Alfred Kofi Gaglo**	              | Software Design Engineer  | Program Management           |
| **Nanette Mawuena Taylor**	      | Team Leader	          | Interaction Design           |

Project Status
--------------
Curently, the project allows a typical user to view a web page which displays a number of tiles representing the news categories. The user can also add posts to each category. The categories are:
* Movie Night
* Parties
* Foodie Events
* Sports Events
* Club Events
* Other Eevnts
* Lost
* Found

Getting Started
---------------
### Dependencies
* XAMPP Apache Web Server
* MySql Server

### Setting Up (on git shell)
1. Create a new directory (eg. news-on-time) in your C:/XAMPP/htdocs directory and initialise git in this new directory you created by typing `git init`
2. Clone the project by typing `git clone https://github.com/ashesi-SE/news-on-time` in the git initialised directory or repository
3. Type `git checkout -f fifth-iteration` to get what we have so far
4. Run the `databse.sql` file found in the `mysql_database_files` folder. Make sure you don't have a database called `news_on_time` otherwise it will be deleted.
5. Navigate to `http://localhost/news-on-time/` in your browser

You can find our **architecture worksheet** [here](https://github.com/ashesi-SE/news-on-time/wiki/Architecture)

### Deployment
For using the application in Deployment, check out [`this wiki page`](https://github.com/ashesi-SE/news-on-time/wiki/Deployment-Architecture)

### Wiki
Check out our [wiki](https://github.com/ashesi-SE/news-on-time/wiki) to find out more about our project

