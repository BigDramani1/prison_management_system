# System Description

<b>GPMS</b> is an institute management system for the Ghana prisons service. The main idea of this system is to create a central database system where all administrations of the various prisoners can know everything about their prison and other prisons. Furthermore, this serves as a source of information for the Ministry of Interior Office to learn the prisons' day-to-day activities. 

# How to use the system
- In the repository, you will find the sql folder which has a a database file by the name EKD02792022.sql. Copy or import this file into any DBMS of your choice.
- After executing the sql query 
- Clone the repository into your htdocs folder by doing git clone https://github.com/AshWeb2020/final-daniels600.git.
- You can now run apache and mysql on your local machine using software such as Xampp
- Then open to the directory of the folder in any browser of your choice and the program will be working at it will on any server or machine.

# Ghana Prison Management System (GPMS)

This Web application was built using
 - PHP
 - HTML5
 - CSS
 - JavaScript / JQuery
 - Bootstrap Admin Page
 - Parsley JS
 - Chart JS
 - Font-Awesome 
 - Ajax 
 - DataTables plugins

# Admin Login Details

The Administrator email is admin@gov.com <br/>
The Administrator password is <b>password123</b>


# URL to Web Application
- http://daniels.uksouth.cloudapp.azure.com/

# Demo Link
- https://youtu.be/nn4eENkpVwc

# How to run PHPUnit Test
- The controller folder has in it all the various classes with their respective functions/methods
- In that folder you will find the test classes which were used to test for the class's methods
- In running the tests you have to uncomment the data in the individual functions you want to test for and run you test
- Also you can create or edit the data in the original class with the function with your own data to test if the functions work or not.
- This is because some functions work by the passing of parameters into them. 


# Functionalities Created
- The CRUD for Prisoners, Employees and Visitors all can be found in the Controllers folder which has all the controllers
- There is a graph display of the data which is been taking from the database. This was done using chart JS
- There is also a frontend validation which was done using Parsley JS and Regex with JavaScript
- There is also the use of ajax to retrieve the data from the files executed in the sql folder.
- There is the use of sweetAlert2 for the notification or feedback on the actions of the admin 
- There are easy click buttons to export data from the data such as PDF, Excel, CSV and Copy of data. 
 
 
