The first thing that you need to have to run this program is composer.
You can download composersetup.exe in composer.org.
The second is you need to download this project and open it in your command line (Window CMD)or(Linux Terminal)
After that you also need to go into the project folder path in your cmd.
And you should write "composer update" in your cmd.
Then you need to creat database with name which must equal in database name in .env file.
Next, you must type the following command 
1."php artisan config:clear"
2."php artisan cache:clear"
3."php artisan config:cache"
4."php artisan migrate --seed"
After all, the last command that you need to type is "php artisan serve"
Then you start running localhost:8000 in your browser.
-----------------------------------------------------------------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------
I made the given test account for each role.

For admin view
user email= "admin@gmail.com"
password ="aaaaaaaa" 

For marketing manager view
user email= "manager@gmail.com"
password ="aaaaaaaa" 

For marketing coordinator view
user email= "coordinator@gmail.com"
password ="aaaaaaaa" 

For student view
user email= "student@gmail.com"
password ="aaaaaaaa" 

For guest view
user email= "guest@gmail.com"
password ="aaaaaaaa" 