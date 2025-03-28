# Laravel Project

## Installation & Setup

Follow the steps below to set up and run the project locally.

### Prerequisites

Make sure you have the following installed:

-   PHP (>=8.0)
-   Composer
-   Node.js & npm
-   Laravel

### How to Run the Project

1. **Clone the repository**

    ```sh
    git clone https://github.com/your-repository.git
    cd your-repository
    ```

2. **Install dependencies**

    ```sh
    composer install
    npm install
    ```

3. **Run seeder**

    ```sh
    php artisan db:seed --class=CompanySeeder
    ```

    ```sh
    php artisan db:seed
    ```

4. **Run the frontend build**

    ```sh
    npm run dev
    ```

5. **Start the development server**

    ```sh
    php artisan serve
    ```

6. **Access the project**
   Open your browser and go to:
    ```
    http://127.0.0.1:8000
    ```

## License

This project is licensed under the [PT Global Indo Asets](LICENSE).
