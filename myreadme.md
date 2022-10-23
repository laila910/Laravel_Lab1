# Lab 1:

> Requirements:
 1. Posts CRUD Operation using resource controller methods.
 2. All posts redirects back to `/posts`.
 3. When submitting form `create form` , make sure to redirects back to '/posts'.
 4. delete button show warning before submission .
 5. bonus: install extensions , `php Intelephense` & `PHP cs fixer for VSCode or any similar Editors` & put this file in your Project root directory then make the fixer automatically executed on ssave.
 6. read about `blade component` aand create `blade component` called `button` that accepts type parameter so that can be called like this : `<x-button type="primary" >view</x-button>` `<x-button type="secondary" >edit</x-button>` `<x-button type="danger" >delete</x-button>` with `php artisan make:component bonus`.

# Lab 2:

> Requirements:
 1. Create migrations & model for the necessary db posts table
 2. make sure CRUD operation on Posts are stored in the DB
 3. When i Click on Delete you must show a warning before deleting and i choose between yes to
   confirm Delete or no … and you must use Route::delete
 4. In Index & Show page ,make sure the Created At is formated , so read carbon documentation
  https://carbon.nesbot.com/docs/
 5. In Edit Or Create Post Creator Field must be drop down list of users
 6. Create PostSeeder & PostFactory class so that when i run php artisan db:seed it seeds posts table
  with 500 records
 7. Add pagination to Index page Read About Pagination then display pagination links
 8. Add CURD comments inside show post page using polymorphic relation
  https://laravel.com/docs/master/eloquent-relationships#polymorphic-relationships … don’t
  overengineer this one and use ajax requests … just simple form submissions.
 9. Add restore button on index page to restore deleted posts you will need to use soft delete
  https://laravel.com/docs/master/eloquent#soft-deleting
 10. create Accessor Method inside Post Model that returns human readable carbon to be used
  in posts/{id} , for example i want $post->human_readable_date will result in the formated
  carbon date that is rendered in show post page
  https://laravel.com/docs/master/eloquent-mutators#defining-an-accessor
 11. Add View Ajax Button to posts page , that opens Bootstrap Modal , showing post info (title ,
  description , username, useremail) using ajax request (check laravel responsable interface in
  docs to make your code cleaner)
 12. Use livewire to make your comments doesn’t refresh the page when making CRUD
   first check this video to understand what is livewire
   then check this livewire comments component video in case it may be helpful
# Note: Disclaimer: livewire is so powerful to give you the feel of SPA without the complexity of frontend frameworks .but it has some limitations we can discuss this more in next lecture