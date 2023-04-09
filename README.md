# bytecites

A blog made by using Symfony.

This is a repository for a blog project built with the Symfony PHP framework. The project is designed to provide a simple and extensible platform for creating a blog site.

## Requirements

To run this project, you will need the following installed on your local machine:

- PHP 7.4 or higher
- Composer
- MySQL 5.7 or higher
- Node.js and npm (optional, required for front-end development)

## Getting Started

1. To get started with this project, simply clone the repository to your local machine using the command:

```bash
git clone https://github.com/jimasr/bytecites.git
````


2. Once you have cloned the repository, please do the following command to have all the required dependencies.

```bash
composer install
```

3. After that, you must create the database and migrate it into a server. For that, make to modify the `.env` file according to the server that you'll use.
Here, we personally use a **postgreSQL** by using [Docker Desktop](https://docs.docker.com/desktop/).
````bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
````

4. For the front-end part, install he front-end dependencies by running the following command from the project root directory:

```bash
npm install
```

5. The final step is to start the development server by running one of the following command from the project root directory:

```bash
symfony server:start
#OR
symfony serve
```

When launched, go to your preferred web browser and navigate to http://localhost:8000 to view the project.

## Project Structure

According to Symfony, the project is structured as following the MVC pattern.

The blog will be divided in two main parts.

### Admin side :
An admin will be able to manage all the elements present in the blog which are :
- The posts
- The categories of each post
- The comments
- The users

For this, a dashboard will be given where all the elements will be listed and can be **added**, **modified** and **removed**.

### User side :
An user will be able to see all the posts made so far in the home page. Each post displayed will have a valid publication date.

The user will also have the possibility to comment a post, but need to be logged beforehand. 
With that, a list of comments will be showed.

## Complements

In addition to the User Side, a whole authentication procedure has been put in place to allow a visitor to create an account, modify it and be logged with it.

An admin will be able to manage the role of each user and its data.

## Contributing
Contributions to this project are welcome. To contribute, simply fork the repository, make your.

## Authors

This project was made by two IT students in order to complete the Symfony course from [I.U.T Lyon1](https://iut.univ-lyon1.fr/).

Further informations about the project can be found in this [gitlab repository](https://forge.univ-lyon1.fr/abdelhadi.belfadel/symfony-ressource) (You must be registered in the _I.U.T Lyon1 forge_).

Visit our Github just below !
- [Steve PENNEC](https://github.com/PennecStv)
- [Hazim ASRI](https://github.com/jimasr)

## License

This project is licensed under the [MIT License](https://choosealicense.com/licenses/mit/). See the LICENSE file for details.

