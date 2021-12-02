---
title: Naming convention
description: Building a navigation menu for your site
extends: _layouts.documentation
section: content
---

# Naming Convention {#naming-convention}

Naming things is often seen as one of the harder things in programming. That's why we've established some high level guidelines for naming things.

## Authorization {#authorization}

Policies must use camelCase.

```php
Gate::define('editPost', function ($user, $post) {
    return $user->id == $post->user_id;
});
```

## Commands {#commands}

Commands must have `Command` suffix, e.g. `DeleteTemporaryFilesCommand`.

The names given to artisan commands should all be kebab-cased.

```php
# Good
php artisan delete-old-records

# Bad
php artisan deleteOldRecords
```

## Configuration {#configuration}

Configuration files must use snake_case.
```
config/
    api_credentials.php
```

Configuration keys must use snake_case.

```php
// config/api-credentials.php
return [
    'api_username' => env('API_USERNAME'),
];
```

## Controllers {#controllers}

Controllers must have `Controller` suffix. Controllers should be named in the singular form, like their resource, e.g. `PostController`, `UserController`.

Non-resourceful controllers need to be named by the action they perform, e.g. `ValidationController`,

For CRUD operations controllers should have these method names:

| Verb      | URI               | Method name | Route name    |
|-----------|-------------------|-------------|---------------|
| GET       | posts             | `index()`   | posts.index   |
| GET       | posts/create      | `create()`  | posts.create  |
| POST      | posts             | `store()`   | posts.store   |
| GET       | posts/{post}      | `show()`    | posts.show    |
| GET       | posts/{post}/edit | `edit()`    | posts.edit    |
| PUT/PATCH | posts/{post}      | `update()`  | posts.update  |
| DELETE    | posts/{post}      | `destroy()` | posts.destroy |

## Database {#database}

DB tables must be in plural form, in snake_case, e.g. `users`, `uploaded_photos`.

Pivot tables must be in singular form, in snake_case, each model in alphabetical order, e.g. `post_user`, `task_user`.

Table columns must be in snake_case.

## Events {#events}

Events will often be fired before or after the actual event. This should be very clear by the tense used in their name.  
E.g. `ApprovingLoan` before the action is completed and `LoanApproved` after the action is completed.

## Factories {#factories}

Factories must have `Factory` suffix. Factories should be named in the singular form of their resource, e.g. `PostFactory`, `UserFactory`.

## Functions {#functions}

Verbosity is generally encouraged. Function names should be as verbose as is practical to fully describe their purpose and behavior.

Functions must use camelCase. Brackets should go to new line.

```php
public function getElementById()
{
    # code...
}
```

## Jobs {#jobs}

A job's name should describe its action, e.g. `OptimizeImage`, `PerformDatabaseCleanup`.

## Listeners {#listeners}

Listeners will perform an action based on an incoming event. Their name should reflect that action with a `Listener` suffix. This might seem strange at first but will avoid naming collisions with jobs.  
E.g. `SendInvitationMailListener`

## Localization {#localization}

Translations must be rendered with the `__` function. We prefer using this over `@lang` in Blade views because `__` can be used in both Blade views and regular PHP code. Here's an example:
```php
<h2>{{ __('newsletter.form.title') }}</h2>

{!! __('newsletter.form.description') !!}
```

## Mailables {#mailables}

Mailables must have `Mail` suffix, e.g. `UserRegisteredMail`, `NewPostMail`.

## Routing {#routing}

Public-facing urls must use kebab-case.

```php
https://vertex-it.com/example-url
```

Route names must use camelCase.

```php
Route::get('web-development', 'WebDevelopmentController@index')->name('webDevelopment');
```

Route parameters should use camelCase.

```php
Route::get('news/{newsItem}', 'NewsItemsController@index');
```

## Traits {#traits}

Traits should be adjective words, e.g. `Notifiable`, `Updateable`.

## Validation {#validation}

All custom validation rules must use snake_case.
```php
Validator::extend('organisation_type', function ($attribute, $value) {
    return OrganisationType::isValid($value);
});
```

## Variables {#variables}

Variable names should be as descriptive as possible. Avoid using shortened names.  
Variables must use camelCase.

```php
// Good
$temporaryUser = 'some/path';

// Bad
$tmpUser = 'some/path';
```

There are some universal short names that are widely accepted and should be used instead of their longer version.  
E.g. use `$dir` instead of `$directory`.

## Views {#views}

View files must use kebab-case.
```
resources/
  views/
    web-development.blade.php
```
