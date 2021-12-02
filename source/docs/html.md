---
title: HTML
description: Building a navigation menu for your site
extends: _layouts.documentation
section: content
---

#### [Code Style Guidelines](/docs/code-style-guidelines)

# HTML {#html}

These HTML guidelines are oriented more towards writing HTML in a PHP project, rather than single front-end application.

## General rules {#general-rules}

- All tags and attributes should be lowercase - except for `DOCTYPE`.
- Nested elements should be indented.
- Always use double quotes on attributes.
- Don't include trailing slash in self-closing elements.
- Don't write 2 elements in a single line
- Use 4 spaces for indentation

```html
<!DOCTYPE html>
<html>
    <head>
        <title>Page title</title>
    </head>
    <body>
        <img src="images/company-logo.png" alt="Company">
        <h1 class="hello-world">Hello, World!</h1>
        <div>
            <ul>
                <li>Item 1</li>
                <li>Item 2</li>
            </ul>
        </div>
    </body>
</html>
```

## CSS and JavaScript includes {#css-js-includes}

Never write inline CSS and JS, instead write them in new files.

Per HTML5 spec, typically there is no need to specify a type when including CSS and JavaScript files as `text/css` and `text/javascript` are their respective defaults.
```html
<!-- Good -->
<link rel="stylesheet" href="code-guide.css">
<script src="code-guide.js"></script>

<!-- Bad -->
<link rel="stylesheet" href="code-guide.css" type="text/css">
<script src="code-guide.js" type="text/javascript"></script>
```

## Whitespace {#whitespace}

It is encouraged to separate different blocks with line separator.

```html
<section>
    <div class="content">
        <p>Example content</p>
    </div>
    <div class="content">
        <p>Example new content</p>
    </div>
</section>

<section>
    <p>New section</p>
</section>
```

## Moving attributes to new line {#moving-attributes-to-new-line}

For better readability elements prone to change with many attributes should be moved to new line. Do not do this for every HTML element.

```html
<!-- Bad -->
<form method="POST" action="title" enctype="multipart/form-data">
    <input type="text" class="form-control" name="title" id="title" data-id="1" required autofocus>
</form>
```
```html
<!-- Good -->
<form
    method="POST" 
    action="title" 
    enctype="multipart/form-data"
>
    <input 
        type="text" 
        class="form-control" 
        name="title" 
        id="title" 
        data-id="1" 
        required 
        autofocus
    >
</form>
```

## Form input names {#form-input-names}

Input names should be exactly the same as the name of the coulmn in database. They must be in snake_case.

```html
<!-- Good -->
<input type="number" name="user_id">

<!-- Bad -->
<input type="number" name="userId">
<input type="number" name="user">
```
