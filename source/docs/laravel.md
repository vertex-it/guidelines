---
title: Laravel
description: Building a navigation menu for your site
extends: _layouts.documentation
section: content
---

#### [Code Style Guidelines](/docs/code-style-guidelines)

# Laravel {#laravel}

First and foremost, Laravel provides the most value when you write things the way Laravel intended you to write. If there's a documented way to achieve something, follow it. Whenever you do something differently, make sure you have a justification for why you didn't follow the defaults.

---

## Artisan commands {#artisan-commands}

A command should always give some feedback on what the result is. You should write as descriptive message as you can.

```php
public function handle()
{
    # code...

    $this->comment('Temporary images deleted');
}
```

---

## Configuration {#configuration}

If you want to add new value to configuration, don't put it in app.php or any other laravel's default config file. Instead, create a new file with proper name and put a value there.

Only when adding config values for a specific service, add them to the "services" config file. Do not create a new config file.

Avoid using `env()` helper outside of configuration files.

---

## Controllers {#controllers}

Try to keep controllers simple and stick to the default CRUD keywords - `index`, `create`, `store`, `show`, `edit`, `update`, `destroy`. Extract a new controller if you need other actions.

TODO forceDelete, restore.

### Keeping it simple

Keep the controllers as lean as possible. Always use `$request->validated()` when creating or updating models. Avoid using `$request->all()`.  

Use `prepareForValidation()` method of validation class to manipulate the request data outside of controllers.

```php
// Blog.php
public function setCoverPhotoAttribute($value)
{
    # store photo to disk
}

// BlogRequest.php
public function validate()
{
    return [
        'title' => 'required|string|min:3',
        'content' => 'required|string|min:10',
        'published' => 'required|bool',
        'cover_photo' => 'required|url',
    ];
}

public function prepareForValidation()
{
    $this->merge([
        'published' => $this->has('published'),
    ]);
}

// BlogController.php
public function store(BlogRequest $request)
{
    Blog::create($request->validated());
    
    $request->session()->flash('success', 'Blog created');
    
    return back();
}
```


---

## Eloquent {#eloquent}

TODO add description, arrow function for whereHas?

```php
// Bad
Post::active()
    ->whereHas('comments', function ($q) {
        $q->isNotDeleted();
    })->get();

// Good
Post::query()
    ->active()
    ->whereHas('comments', function ($q) {
        $q->isNotDeleted();
    })
    ->get();
```

---

## Helper file {#helper-file}

If you have a custom helper file, place it in the root of `app` directory.

## Routing {#routing}

All routes have an http verb, that's why we like to put the verb first when defining a route. It makes a group of routes very readable. Any other route options should come after it.

```php
// good: all http verbs come first
Route::get('/', 'HomeController@index')->name('home');
Route::get('open-source', 'OpenSourceController@index')->middleware('openSource');

// bad: http verbs not easily scannable
Route::name('home')->get('/', 'HomeController@index');
Route::middleware('openSource')->get('OpenSourceController@index');
```

A route url should not start with `/` unless the url would be an empty string.
```php
// Good
Route::get('/', 'HomeController@index');
Route::get('open-source', 'OpenSourceController@index');

// Bad
Route::get('', 'HomeController@index');
Route::get('/open-source', 'OpenSourceController@index');
```

### Route name {#route-name}
Always try to write a name for a route. This will make it easier to work with routes, and to change them if necessary.
```php
// Good
Route::get('posts', 'PostsController@index')->name('posts.index');

// Bad
Route::get('posts', 'PostsController@index')->name('showAllPosts');
```

### Resource routes {#resource-routes}

Use route resources instead of defining routes for a single resource multiple times.
```php
// Good
Route::resource('users', 'UserController')
    ->only(['index', 'create', 'store']);

// Bad
Route::get('users', 'UserController@index');
Route::get('users/create', 'UserController@create');
Route::post('users', 'UserController@store');
```

---

## Validation {#validation}

Every field coming in request should be validated.  
Create Request file for every action that needs validation, e.g. `PostStoreRequest`, `PostUpdateRequest`.

When using multiple rules for one field in a form request, avoid using `|`, always use array notation. Using an array notation will make it easier to apply custom rule classes to a field.

```php
// Good
public function rules()
{
    return [
        'email' => ['required', 'email'],
    ];
}

// Bad
public function rules()
{
    return [
        'email' => 'required|email',
    ];
}
```

---

## Views {#views}

Views should be organized in following directories:
```
├── components
│   └── modal.blade.php
├── layouts
│   ├── alerts.blade.php
│   ├── master.blade.php
│   ├── menu.blade.php
│   ├── sidebar.blade.php
│   └── topbar.blade.php
├── resource-name
│   ├── form.blade.php
│   ├── index.blade.php
│   ├── modals
│   │   └── createPostModal.blade.php
│   ├── partials
│   │   └── comments.blade.php
│   └── show.blade.php
```

---

## Response {#response}

Don't use `compact()` when returning data to the view. Always pass data in array.

```php
// Bad
$posts = Post::with('comments')->get();
$videos = Video::all();

return view('posts.index', compact('posts', 'videos'));

// Good
return view('posts.index', [
    'posts' => Post::with('comments')->get(),
    'videos' => Video::all(),
]);
```

---

## Naming convention {#naming-convention}

~~~~~~~~~~~~~~~~~~~~~~~~~~~ TODO izmijeniti tekst. ~~~~~~~~~~~~~~~~~~~~~~~~~~~

Each class generated by Laravel needs to have its corresponding suffix.  
For example: `PostController`, `DeleteTemporaryFilesCommand`, `ArticleService`, `UserRegisteredMail`, `PostFactory`, `OptimizeImageJob` etc.

Other examples of naming convention:

| What | How | Good | Bad |
|-----------|-------------------|-------------|---------------|
| Artisan command name | kebab-case | delete-old-records | deleteOldRecords |
| Configuration files | snake_case | api_credentials.php | apiCredentials.php |
| Configuration keys | snake_case | api_token | apiToken |
| Controllers | singular | PostController | PostsController |
| Pivot tables | singular, snake_case | blog_user | blog_users, user_blog |
| Policies | singular | PostPolicy | PostsPolicy |
| Public routes | kebab-case | vertex-it.com/example-url | https://vertex-it.com/exampleUrl |
| Route names | singular, camelCase | blog.forceDelete | blogs.force-delete |
| Route parameters | camelCase | `{newsItem}` | `{news_item}` |
| Service class | singular | PostService | PostsService |
| Tables | plural, snake_case | post_comments | postComment,  post_comment |
| Traits | adjective | Notifiable | Notification |
| Validation rules | snake_case | organisation_type | organisationType |
| View files | kebab-case | blog-action.blade.php | blogAction.blade.php, blog_action.blade.php |
