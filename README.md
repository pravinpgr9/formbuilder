A Laravel Sample tool that helps to manage/control Dynamic Forms.

## About Project 

This is a Laravel application that serves as a sample tool to manage and control Dynamic Forms. Its having role based access control with Super Admin On top and Admin & Form Submitter(user) under it. 
It provides various features to help users to fill the forms and admin can see the statistics of the forms.

## Tech Stack Used: 
Laravel Framework 9.52.16, 
MySQL database 
PHP PHP 8.0.28 
Bootstrap bootstrap@5.2.3 for front-end styling
Spatie Laravel Permission Package

## Project Approach:

I approached the project by first defining the requirements and breaking them down into smaller tasks. I followed the MVC (Model-View-Controller) architecture pattern provided by Laravel to organize the codebase. I Used Spatie Laravel Permission Package, which makes work very easy to organize the roles and permissions through its automated database tables.
I liked the built-in features of Laravel, such as Auth Module, Eloquent ORM for database interactions and Blade templating engine for views, which streamlined development. However, I faced some challenges while for testing application across multiple peoples. Overall, I enjoyed working on the project.


## Estimated Time to Complete:

The estimated time to complete the test was approximately 6 hours. However, the actual time may vary depending on the complexity of the requirements and any unforeseen issues encountered during development with testing and edge cases.


## Pending Tasks:

More comprehensive test cases to cover edge cases and ensure code reliability. 
Additional features with enhancements like on UI Side with CSS. Conducting further testing and quality assurance to ensure the application meets performance and usability standards before deployment.

## Features

1. User Authentication and Roles:

- System supports two types of users: Admin and Normal User.
- Also Added Super Admin to control the Admin user.
- Users can register, login, and logout.
- Admin users have additional privileges compared to Normal Users.
- Super Admin creates the admin account 
- Admin Account Manages the users 
- Admin Account Assigns roles to user
- Users can register, login, and logout.
- Admin users have additional privileges compared to Normal Users.

2. Admin Form Management:

Admin can create form definitions.
Admin can specify fields for each form definition.
Admin can define validation rules for each field (e.g., min, max, required, email).
Admin can edit and delete form definitions.

3. User Form Submission:

Normal users can fill out forms created by the admin.
Users can submit forms only once (duplicate submissions are not allowed).
Form submissions are validated based on the rules defined by the admin.

4. Form Submission Tracking:

Admin can view statistics for each form, including the number of times it was submitted and opened.
Admin can see which users submitted each form and their corresponding answers.

5. Validation Rules Enforcement: (Not Tested Troughout)

System enforces validation rules defined by the admin during form creation.
Users receive appropriate error messages if they violate any validation rules while filling out forms.

6. User Interface:

User-friendly interface for form creation, submission, and statistics viewing.
Clear error messages and validation feedback for users during form submission.

7. Data Persistence:

All form definitions, submissions, and user information are stored securely in the database.
Data integrity is maintained, ensuring that form submissions are associated with the correct users and forms.

8. Security:

Secure authentication mechanisms to protect user accounts and sensitive data.
Role-based access control to ensure that only authorized users can perform certain actions (e.g., admin functions).

9. Scalability and Performance:

System architecture designed to handle a large number of users and form submissions efficiently.
Optimization techniques implemented to ensure fast response times and minimal downtime.


10. Testing and Quality Assurance:
Conducted the comprehensive testing to ensure that all features work as expected. 


## Installation

1. Clone the repository: git clone
2. Navigate to the project directory: cd project_management
3. Install composer dependencies: composer install
4. Copy the .env.example file to .env and configure your environment variables, including the database connection details.
5. Generate an application key: php artisan key:generate
6. Run database migrations: php artisan migrate
7. Serve the application: php artisan serve

## Project ScreenShots

## Super Admin 
Creds - anupsuper@gmail.com / anup1234

1. Super Admin Dashboard
   ![image](https://github.com/pravinpgr9/formbuilder/assets/15365979/8075b3a5-0cd4-4319-b666-80e461c7bee7)

2. Super Admin User Management
   ![image](https://github.com/pravinpgr9/formbuilder/assets/15365979/fd91b734-98a1-41f2-ac49-c517c0b02832)

3. Super Admin Role Management
   ![image](https://github.com/pravinpgr9/formbuilder/assets/15365979/91ceebc1-1469-4de7-865c-8af7818d3b12)

4. Super Admin Edit Role for user account
    ![image](https://github.com/pravinpgr9/formbuilder/assets/15365979/91403f3e-7674-43b6-89f6-5602c42ab670)

## Admin User 

Creds - pravinpgr9@gmail.com / pravin1234

1. Admin User Dashobard
   ![image](https://github.com/pravinpgr9/formbuilder/assets/15365979/f85505ec-7a67-41a4-a951-843d86ae85c4)

2. Admin user Creates the Normal user for filling the forms
   ![image](https://github.com/pravinpgr9/formbuilder/assets/15365979/746aa90a-ad80-484c-8b28-f9f885fa085b)

3. Admin user create the form

   ![image](https://github.com/pravinpgr9/formbuilder/assets/15365979/2629861b-2b69-45ca-a7ca-61d8a7c07b40)

   ![image](https://github.com/pravinpgr9/formbuilder/assets/15365979/0e3cdb67-d20c-4f33-a484-71ef28585db3)

5. Super Admin creates the form with Dynamic Fields

   ![image](https://github.com/pravinpgr9/formbuilder/assets/15365979/e71fde7d-5a29-4c50-b133-ca8fcd0e39af)
   
7. Super Admin Can view the statistics of the submitted form details    

   ![image](https://github.com/pravinpgr9/formbuilder/assets/15365979/717ccaf0-030f-44a9-ae49-197139235d25)

8. Super Admin can delete the forms

   ![image](https://github.com/pravinpgr9/formbuilder/assets/15365979/6ab220e7-f2ff-4a72-b4ae-996c2ca1e924)

## Normal User (Form Submitter)

1. User Login creds - ankush@gmail.com / ankush1234

   ![image](https://github.com/pravinpgr9/formbuilder/assets/15365979/a3506198-2e05-4aff-b0f3-4aa619086900)

2. User Dashboard
   ![image](https://github.com/pravinpgr9/formbuilder/assets/15365979/3c8c8f66-5fb4-44fa-bfb5-0d88bf4ac963)

3. User Submit the form only once
   ![image](https://github.com/pravinpgr9/formbuilder/assets/15365979/efece430-1cb8-4be7-b14e-2d09e3c0979e)

4. Dynamic Form Created by the admin and submitter will submit this form

   ![image](https://github.com/pravinpgr9/formbuilder/assets/15365979/66ace4ed-1776-49bf-9d72-2c9b7c019471)

   ![image](https://github.com/pravinpgr9/formbuilder/assets/15365979/5fd8b259-dbe7-456d-8e2b-08e7b698ad76)

   ![image](https://github.com/pravinpgr9/formbuilder/assets/15365979/d9e90428-a4ec-4b1e-999f-b16d9b32ce72)


So Here we have covered the almost all points given in the task and also added super admin to cover over the admin and user so that we can create the multiple admin users and multiple admin users can create the multiple normal users and they can submit the forms 

We can also add enhancements to existing app using advance features and more fields options.  
