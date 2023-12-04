## Task Manager Application
- Requirements (Laravel 10 Application)
  - PHP 8.1

## Install Allication
1. clone git repo from master run comand
git clone -b master https://github.com/dinushjaykody/laravel_task_manager_app.git

2. From the project file run command cp .env.example .env
   
3. Open the laravel project folder structure on the .env file update DB connection details with your local DB settings ex:
DB_CONNECTION=mysql\
DB_HOST=127.0.0.1\
DB_PORT=3306\
DB_DATABASE=task_manager_app\
DB_USERNAME=\
DB_PASSWORD=

4. From the project folder run command composer install

5. From the project folder  run commands 
	- php artisan migrate 
	- php artisan db:seed
	
 to update DB Schema

6. Run command php artisan key:generate
to generate the secret key if not already generated.

7. From the project folder run command npm install / npm run dev

8. Run command php artisan serve
to bring up the server
   

## Application Features
1. Once the server is started then go to the server url on the browser to go to the application. Should point to the login page.
   
![image](https://github.com/dinushjaykody/laravel_task_manager_app/assets/7110607/91918470-e4fd-4048-86da-7e6d931a4ef6)

2. Click on Register to register a new user as you need to login as a authenticated user to access the Task list.

![image](https://github.com/dinushjaykody/laravel_task_manager_app/assets/7110607/80992b87-88d5-449b-b08a-2c2dc9fd0b06)

3. Click on the Task Manager Application to view the list.

![image](https://github.com/dinushjaykody/laravel_task_manager_app/assets/7110607/bdf69a98-7092-49aa-8276-be799fcceb16)

4. Feature list of tasks with Pagination.
![image](https://github.com/dinushjaykody/laravel_task_manager_app/assets/7110607/1ed63163-2fb8-43e0-b7e5-23125ddfa647)

![image](https://github.com/dinushjaykody/laravel_task_manager_app/assets/7110607/8e1b00d7-89f6-4165-b4ec-cf4b31051699)

5. Create Task Feature and Validation.

![image](https://github.com/dinushjaykody/laravel_task_manager_app/assets/7110607/360f8d26-a14b-4916-b0b6-a397e6fdfe1f)
![image](https://github.com/dinushjaykody/laravel_task_manager_app/assets/7110607/b44b3122-9235-48f8-9962-1f3bc21ebe8e)
![image](https://github.com/dinushjaykody/laravel_task_manager_app/assets/7110607/d29f7ed4-735a-428c-945b-74e3775e7716)

6. Show Action
   
![image](https://github.com/dinushjaykody/laravel_task_manager_app/assets/7110607/f7a2877f-3936-4466-b7cc-78c68496ab3f)

7. Edit Action mark task as Complted and ReOpen
![image](https://github.com/dinushjaykody/laravel_task_manager_app/assets/7110607/5596b530-5a5c-4ce9-8f20-be2329d50a0f)

![image](https://github.com/dinushjaykody/laravel_task_manager_app/assets/7110607/7cd53e9b-0e80-4435-bd32-6bff6cc8f3f2)

8. Delete Action
   
![image](https://github.com/dinushjaykody/laravel_task_manager_app/assets/7110607/fe5c3add-04af-4940-ae81-6e53f8c1cb26)

![image](https://github.com/dinushjaykody/laravel_task_manager_app/assets/7110607/21556e7e-069e-4089-b08c-428ad9f39a5c)

9. Assign a user to a Task.
    
![image](https://github.com/dinushjaykody/laravel_task_manager_app/assets/7110607/7e5f64a7-8139-47b4-9371-1a991b1c5dcc)

![image](https://github.com/dinushjaykody/laravel_task_manager_app/assets/7110607/4e80d521-2bd2-41ce-a1eb-cffebcd40522)

![image](https://github.com/dinushjaykody/laravel_task_manager_app/assets/7110607/938544b7-9963-4f29-ae0d-c17f0b6121ef)

10. Implement user authentication to manage tasks.
    
Feature Login and Register are implemented. If not logged in can't access the Task List.

11. RestfulApi Tasks.

- API end point api/tasks

![image](https://github.com/dinushjaykody/laravel_task_manager_app/assets/7110607/96bd668e-4c79-4a22-a8ba-27e40a525f8c)


 - RestfulApi for list one task by ID.

API end point api/tasks/{ID}

![image](https://github.com/dinushjaykody/laravel_task_manager_app/assets/7110607/18e88bfa-023d-4fc8-b942-0049a56ba3b2)

12 . For Unit Tests run command php artisan test

<img width="558" alt="image" src="https://github.com/dinushjaykody/laravel_task_manager_app/assets/7110607/0c199070-1276-4107-81fa-a37dc0b022f1">
