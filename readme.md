# r8myprof
r8myprof is a laravel web platform that allows students to rate their professors and courses in order to have a public record of professors' performence.

## Functions
Students are able to:
* Add new professors and assign them to a university.
* Rate professors for a course they took.
* Add new universities and courses.

> In its current state signing up requires an @.edu email account to help with moderating the website.

## Installation
* Clone the repo `git clone https://github.com/t-gitt/r8myprof.git`
* Next, change the needed variables in `.env` file as follows:
    * Your gmail: `MAIL_USERNAME=example@gmail.com`
    * Gmail passwordL `MAIL_PASSWORD=********` > Create app generated gmail password for better security
    * Mail sender identity: `MAIL_FROM_NAME=Example`
* Run `php artisan serve` to host it on `localhost:8000` or direct your virtual host to `r8myprof/public/`

## Screenshots
#### Home Page
![Alt text](/Screenshots/1.png?raw=true "Home Page")
---
#### Professor Page
![Alt text](/Screenshots/2.png?raw=true "Professor Page")
---
#### Rating on Professor Page
![Alt text](/Screenshots/3.png?raw=true "Rating Display")
---
#### Rate a Professor Page
![Alt text](/Screenshots/4.png?raw=true "Rating")
---
### Inspiration
3 years of university-induced depression lol