---
title: PHP
description: Building a navigation menu for your site
extends: _layouts.documentation
section: content
---

#### [Code Style Guidelines](/docs/code-style-guidelines)

# PHP {#php}

Code style must follow [PSR-1](https://www.php-fig.org/psr/psr-1/), [PSR-2](https://www.php-fig.org/psr/psr-2/) and [PSR-12](https://www.php-fig.org/psr/psr-12/).  
You can also read [PHP the right way](https://phptherightway.com/), a very detailed guide to writing clean and easy-to-read PHP code.

---

## Arrays {#arrays}

Do not declare arrays using `array()` function. Instead use `[]` brackets.
```php
// Good
$numbers = [1, 2, 3, 4];

// Bad
$numbers = array(1, 2, 3, 4);
```
### Space {#space}

Don't add more than one space after array keys.

```php
// Good
[
    'name' => 'nullable|string',
    'group_id' => 'required|integer',
    'valid_until' => 'required|after:yesterday',
];

// Bad
[
    'name'              => 'nullable|string',
    'group_id'          => 'required|integer',
    'valid_until'       => 'required|after:yesterday',
];
```

### Trailing comma separator {#trailling-comma-separator}

You should add a trailing comma for the last item in the array on multiple lines; this minimizes the impact of adding new items on successive lines, and helps to ensure no parse errors occur due to a missing comma. But on a single line array there is no need for this.
```php
// Good
[
    'group_id' => 'required|integer',
    'valid_until' => 'required|after:yesterday',
];

['apple', 'orange', 'pear', 'raspberry'];

// Bad
[
    'group_id' => 'required|integer',
    'valid_until' => 'required|after:yesterday'
];

['apple', 'orange', 'pear', 'raspberry',];
```

---

## Arrow functions {#arrow-functions}

Always use arrow functions for closures with one line of code.

```php
// Good
array_map(fn($user) => "{$user->first_name} {$user->last_name}", $users);

// Bad
array_map(function ($user) {
    return "{$user->first_name} {$user->last_name}";
}, $users);

```

---

## Comments {#comments}

Comments should be avoided as much as possible by writing expressive code. If you do need to use a comment, format it like this:

```php
// There should be a space before a single line comment.

/*
 * If you need to explain a lot you can use a comment block. Notice the
 * single * on the first line. Comment blocks don't need to be three
 * lines long or three characters shorter than the previous line.
 */
```

---

## Comparison {#comparison}

For comparison, you should use strict comparison (`===`, `!==`) whenever possible.

```php
if ($value === null) {
    # code...
}
```

### Brackets {#brackets}

Always use curly brackets
```php
// Good
if ($condition) {
    # code...
}

// Bad
if ($condition)
    # code...

```

### Happy path {#happy-path}
To make a function more readable try to write a function that has its happy path last, and its unhappy path first.
```php
// Good

if (! $goodCondition) {
  throw new Exception;
}

# code...
```
```php
// Bad

if ($goodCondition) {
    # code...
}

throw new Exception;
```

### Avoid else {#avoid-else}

In general, `else` should be avoided because it makes code less readable. In most cases it can be refactored using early returns. This will also cause the happy path to go last, which is desirable.

```php
// Good

if (! $conditionBA) {
   // conditionB A failed
   
   return;
}

if (! $conditionB) {
   // conditionB A passed, B failed
   
   return;
}

// condition A and B passed
```
```php
// Bad

if ($conditionA) {
   if ($conditionB) {
      // condition A and B passed
   }
   else {
     // conditionB A passed, B failed
   }
}
else {
   // conditionB A failed
}
```

---

## Docblocks {#docblocks}

You should read this great article - [cost and value of docblocks](https://localheinz.com/blog/2018/05/06/cost-and-value-of-docblocks). Don't overuse docblocks, and don't write them in places where they are redudant. Also see [type hinting](#type-hinting).

```php
// Good
final class Url
{
    public static function fromString(string $url): Url
    {
        // ...
    }
}

// Bad: The description is redundant, and the method is fully type-hinted.
final class Url
{
    /**
     * Create a url from a string.
     *
     * @param string $url
     *
     * @return \Spatie\Url\Url
     */
    public static function fromString(string $url): Url
    {
        // ...
    }
}
```

---

## "Match" expression {#match-expression}

Use `match` expression instead of `switch` if possible.

```php
// Bad
switch ($food) {
    case 'apple':
        $value = 'This food is an apple';
        break;
    case 'bar':
        $value = 'This food is an bar';
        break;
    case 'cake':
        $value = 'This food is an cake';
        break;
}

// Good
$value = match ($food) {
    'apple' => 'This food is an apple',
    'bar' => 'This food is a bar',
    'cake' => 'This food is a cake',
};
```

---

## Strings {#strings}

When a string is literal (contains no variable substitutions), the apostrophe or "single quote" should always be used to demarcate the string:
```php
$message = 'Hello World!';
```

Always try to use string interpolation instead of `.` concatination.

```php
// Good
$greeting = "Hi, I am {$name}.";
```
```php
// Bad
$greeting = 'Hi, I am ' . $name . '.';
```

## Ternary operators {#ternary-operators}

Avoid ternary operators for complex conditions. Avoid nesting. Every portion of a ternary expression should be on its own line unless it's a really short expression.

```php
$result = $object instanceof Model
    ? $object->name
    : 'A default value';

$name = $isFoo ? 'foo' : 'bar';
```

---

## Type hinting {#type-hinting}

In PHP type hinting isn't required, but it will help you to catch certain types of mistakes. So use type hinting as much as you can.  
There is no need for [docblocks](#docblocks) when method is fully type hinted.

```php
// Good
function mark(Student $student, int $grade): void
{
    # code...
}

// Bad
/**
 * Marks a students grade
 * 
 * @param  App\Models\Student $student
 * @param  int $grade
 * @return void
 */
function mark($student, $grade)
{
    # code...
}
```
```php
// Good
protected int $grade;

// Bad
/** @var int */
protected $grade;
```

---

## Whitespace {#whitespace}

Statements should have to breathe. In general always add blank lines between statements, unless they're a sequence of single-line equivalent operations. This isn't something enforceable, it's a matter of what looks best in its context.

```php
// Good
public function getPage($url)
{
    $page = $this->pages()->where('slug', $url)->first();

    if (! $page) {
        return null;
    }

    if ($page['private'] && ! Auth::check()) {
        return null;
    }

    return $page;
}

// Bad: Everything's cramped together.
public function getPage($url)
{
    $page = $this->pages()->where('slug', $url)->first();
    if (! $page) {
        return null;
    }
    if ($page['private'] && ! Auth::check()) {
        return null;
    }
    return $page;
}
```

A sequence of single-line equivalent operations.
```php
public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->string('email')->unique();
        $table->string('password');
        $table->rememberToken();
        $table->timestamps();
    });
}
```

Long arguments should be split across multiple lines. Often, a long if condition is the sign of code that needs refactoring, but sometimes you can't avoid it.
```php
if (
    Auth::user()->created_at < '2020-01-27'
    && $numberOfAttempts < 3
    || Auth::user()->hasRole('owner')
) {
    # code...
}
```
