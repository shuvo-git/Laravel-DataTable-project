## What I have Learnt

By doing this project I have learnt a few things:

- How to integrate JQuery DataTable plugin with Laravel, Paging server side processing Using Yajra V9.0 for Lazy Loading pages of DataTable.
- Using Admin Lte theme for frontend.

## What I have done:

In this simple project I have done the following things:
- Create Laravel application Using Composer
- Added database information in .env file of Laravel 
- Added 3 model:
    - Customer: (id,name)
    - Department: (id,department)
    - CustomerDepartment: (id, customer_id, department_id)
- make migrations for the eloquent models.
- Seeded these 3 Tables with Laravel DB seeder
- Make DashboardController 
- installed Admin LTE theme in public folder
- Made views:
    views-----------
            |----layouts2.blade.php
                |------------header.blade.php
                |------------sidebar.blade.php
                |------------footer.blade.php
                |------------master.blade.php
            |----dashboard.blade.php

- installed JQuery Messagebox plugin
- Created HomeRestController
- Define Route (GET)"/department" for loading department name list in rest api and it's functionality in  HomeRestController to populate in select box
- define Route (POST)"/customer" for creating a new customer in rest api and it's functionality in  HomeRestController
- Define Route (POST)"/list" for loading customer list in rest api and it's functionality in  HomeRestController
- Define Route (DELETE)"/list/{id}" for deleting from customer list in rest api and it's functionality in  HomeRestController
- Define Route (PUT)"/list/{id}" for updating a customer info in rest api and it's functionality in  HomeRestController

- All the request has been made through AJAX call from client end 
- integrating datatables server end paging was a challenge for me and Yajra Laravel Datatable package has come to the rescue.
- Another challenge was to having 2 linkes ** (edit)**, ** (delete) ** in each row of DataTable and their functionality because Datatable has no support for customizing 
  and then I had to customize it using some JQuery functions.
- I have used messagebox for popup and edit/update/create functionalities 
    
    



