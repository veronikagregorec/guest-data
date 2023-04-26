# Guest Data

The employees at the restaurant keep the data about the guests' bookings.

## Browser Compatibility

All of the latest versions of <b>Chrome</b>, <b>Firefox</b>, <b>Edge</b> and <b>Opera</b> browsers are supported.

## Installation

#### Steps to install

<ol>
  <li><a href="https://www.apachefriends.org/download.html" target="_blank">download XAMPP</a></li>
  <li>download the folder</li>
  <li>folder add into C:\xampp\htdocs</li>
  <li>go to http://localhost/phpmyadmin</li>  
  <li>create new database and call it database</li>
  <li>Import file database.sql</li>
  <li>access localhost/guest-data-main on your browser</li>
</ol>

## Screenshots

The website is made for booking in a restaurant, so I made input fields for enter the guest data which will be managed by employees with their code. 
The data are sent in the database and you can click the button in the right side to see a list of saved data.

![](screenshots/front.png)

First table appears data by months, sum of orders and it will be shown only for last 3 months.
In the table will be saved the data of guests and you can also delete them. I sorted the table by descending a date and a time.

![](screenshots/list.png)

In case of need to search the data enter a letter, a word or a number and press enter. The item or items will be shown, otherwise the message No record found 
will be appeared. If you want to return back delete the search field and press enter. You can also delete the search item and and then will be shown the rest 
entered data.

![](screenshots/search.png)

[Back to the top](#guest-data)
