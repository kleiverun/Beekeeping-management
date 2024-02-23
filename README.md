
# Beekeeping-management

This project tries to create a solution for managing your apiary needs.  


## Authors

- [@kleiverun](https://www.github.com/kleiverun)

## Contributing

Contributions are always welcome!

See `contributing.md` for ways to get started.

Please adhere to this project's `code of conduct`.


## Demo and Screenshots

These are coming soon


## Deployment

To run this application you have to first have these installed:
- php, composer, npm, mysql, laravel

- And have cloned the repository 

Then install the dependencies
```bash
  composer install
```
```bash
  npm install
```
Then create a .env file and copy the content from the .env.example file
```bash
  cp .env.example .env
```
Then generate a key
```bash
  php artisan key:generate
```

First migrate tables
```bash
  php artisan migrate
```
Then to run the application
```bash
  php artisan serve
```
and to apply the tailwind styles
```bash
  npm run dev
```
You can now click the link that appeared when you ran the application
## Roadmap

- Finish the functionality for keeping track of the harvest
## Environment Variables

To run this project, you will need to add the following environment variables to your .env file

You can either create a database with "CREATE DATABASE Laravel" before you migrate the database. 
Or create a new database with your preffered name and change the value of "DB_DATABASE" in the .env file. 


## Features

- Create a new queen.
- Create a new apiary and place it on the map.
- Create a new hive which belongs to a apiary.
- Adjust some of the values for a hive.  
- Rest API which gets the data for a apiary and hive.
- See all apiaries and the hives for a specific apiary. 


## Tech Stack

**Client:** Tailwind, Blade, HTML, CSS, Javascript, Livewire

**Server:** PHP, MySQL

