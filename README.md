![image](https://github.com/user-attachments/assets/8f552c6e-61b9-4f7f-b04b-f299f0793f08)
![image](https://github.com/user-attachments/assets/e9fd6bdf-c62f-4be4-8679-2681b883f0e0)
![image](https://github.com/user-attachments/assets/2ba828dc-270d-4234-acdb-ecf984ae83ac)


# Laravel Inertia Jetstream Movie App

A movie-centric web application built with Laravel, Inertia.js, and Jetstream. This application allows users to search for movies, view details, leave ratings and comments, and manage personal movie lists.

## Features

- **Movie Search**: Search for movies using data from the TMDB API.
- **Movie Details**: View detailed information about movies, including cast and ratings.
- **User Authentication**: Secure user authentication using Laravel Jetstream.
- **Comments and Ratings**: Leave comments and ratings on movies.
- **Movie Lists**: Create and manage personal movie lists.
- **User Profiles**: View user profiles, including their comments, ratings, and movie lists.
- **Feed**: Explore a feed of user-generated content like **comments rating and lists**.

## Usage

1. Register or log in to access the application.
2. Use the search feature to find movies.
3. View detailed movie information, including the cast and user ratings.
4. Leave your comments and ratings on movies.
5. Create and manage your movie lists via your profile.
6. Browse the feed to see what other users are commenting on or rating.

## Contributing

Contributions are welcome! Please submit a pull request or open an issue for any feature requests or bugs.

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/fevziatanoglu/laravel_inertia_jetstream_movie.git
    ```

2. Navigate to the project directory:
    ```bash
    cd laravel_inertia_jetstream_movie
    ```

3. Install dependencies:
    ```bash
    composer install
    npm install
    ```

4. Copy the `.env.example` file to `.env`:
    ```bash
    cp .env.example .env
    ```

5. Generate an application key:
    ```bash
    php artisan key:generate
    ```

6. Set up your database in the `.env` file and run migrations:
    ```bash
    php artisan migrate
    ```

7. Compile assets:
    ```bash
    npm run dev
    ```

8. Start the development server:
    ```bash
    php artisan serve
    ```
