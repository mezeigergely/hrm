###### Run:
1. Clone
2. Open CMD:
	- cd project folder \ composer install
	- copy .env.example .env
3. Create a DB (phpmyadmin)
4. Open .env file and rename Database name (DB_DATABASE) than SAVE
5. Run XAMPP and start Apache, MySQL
6. cmd \ cd project folder \ php artisan key:generate
7. Run php artisan migrate
8. cmd \ cd project folder \ php artisan serve


###### How to run Laravel project after downloading from github/gitlab:
https://www.youtube.com/watch?v=D5MZaCmpxvM


###### Description:
This is a HRM site.
The super admin can create, update and delete employees and managers.
The employees can create a holiday request and the managers can approve it. If the request is finished send an email to a test eclick email address via Mailtrap. The managers can make a 2-type (sick, normal) holiday without approval.

I used PHP with Laravel 8 framework and Bootstrap 5.


###### Testing Mail:
https://mailtrap.io/
mezei.gergely89+eclicktest@gmail.com
pwd: eclick
