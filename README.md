# Aizha Travel | [Read more](https://fadilshardy.vercel.app/blog/my-progression-in-making-travel-website-using-laravel)

tour travel website agency where users can register an account and order a destination package with the desired date. The user has to provide proof of payment to make the order valid.

these are basic functionalities I had in my mind for the project:
#### Admin
- Manage destinations (CRUD)
- View orders and users page
- Update order status with ID parameter

#### User
- Register for an account
- View destination with ID parameter
- Filter destinations with tag or location parameter
- Update profile with username parameter
- Order and pay for destination with ID parameter and date parameter
- View and upload proof of payment
- View order history
- View dashboard
- Rate destination if they have ordered the package
- View and upload proof of payment page

## Database Design
![AizhaTravel ERD](https://cdn-images-1.medium.com/max/800/1*WrRohniB2vFRB-L4CkWUKQ.png)
## Project Showcase
![AizhaTravel ERD](https://cdn-images-1.medium.com/max/800/1*bHgrNz2IL0cnVzsi5-u_8g.png)
<details>
  <summary>Homepage</summary>
  <img src="https://cdn-images-1.medium.com/max/800/1*N97Up5Ec5QZ7VtI8Qtry9Q.png" alt="Aizhatravel Homepage">
</details>
<details>
  <summary>Destination Page</summary>
  <p>example page of the destination package where a user can:</p>
  <ul>
      <li>order the destination package</li>
      <li>check the package details</li>
      <li>check other user reviews</li>
      <li>rate the package if the user has a history order of the package</li>
  </ul>
  <img src="https://cdn-images-1.medium.com/max/800/1*8sFnjyh38f5NDiW3O3b7zQ.png" alt="Destination Page">
</details>
<details>
  <summary>Demonstration when a user order a package</summary>
  <img src="https://cdn-images-1.medium.com/max/800/1*0nXsu70KxuFzni6bxnfzHg.gif" alt="user order demo">
</details>
<details>
  <summary>Payment demonstration</summary>
  1.user has to upload proof of payment for the admin to confirm the order.
  <img src="https://cdn-images-1.medium.com/max/800/1*xp7CGgAVz95rzwidEiNgzQ.gif" alt="user upload payment receipt">
  2.Admin update status of the order if the receipt is valid.
  <img src="https://cdn-images-1.medium.com/max/800/1*c-worAB_DJxfcUGXQ-DqwQ.gif" alt="admin update status of an order">
</details>
<details>
  <summary>Admin CMS</summary>
  <img src="https://cdn-images-1.medium.com/max/800/1*47inIOb33KsTtAOW3MbvFQ.gif" alt="admin update status of an order">
</details>

## What to be improved from this project (roadmap)

- Improving the UI/UX of the website by using more JavaScript can make the website feel smoother and more intuitive for users.
- Better WYSIWYG editor
- More customizable package details (ex: multiple offers with different prices)
- Image/file management
- Report system
- make the website more SEO friendly.
- Authentication (register/login) with social media like Facebook, Google, or Twitter.

## Prerequisites
What things you need to install the software and how to install them:
- PHP 7.2^
- Composer
- MySQL
- NPM

A step by step series of examples that tell you how to get a development env running:

1. Clone the repository: git clone `https://github.com/fadilshardy/aizha-travel`
2. Navigate to the project directory: cd `aizha-travel`
3. Install dependencies: `composer install` && `npm install`
4. Create a copy of the .env.example file and name it .env: cp .env.example .env
5. Generate an app key: `php artisan key:generate`
6. Set your database credentials in the .env file
7. Migrate the database: `php artisan migrate`
8. Seed the database (if applicable): `php artisan db:seed`
9. Start the development server: `php artisan serve`

Built With
- Laravel - The PHP framework 
- Composer - Dependency management
- NPM - Asset compilation
- Bootstrap - The CSS framework 
- Sweetalert - Popup notification library

