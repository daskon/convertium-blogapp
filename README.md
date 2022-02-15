<h1><center><b>Blog App using Laravel 9</b></center></h1>

<h3>Running Environment</h3>
<ul type="disc">
    <li>PHP 8.0</li>
    <li>Laravel 9</li>
    <li>MySQL 8.0</li>
    <li>Node 14.15.4</li>
</ul>

<h3>How to setup</h3>
<ul type="disc">
    <li><code>composer install</code></li>
    <li><code>npm install</code></li>
    <li><code>npm run dev</code></li>
    <li>Rename .env.exaple to .env</li>
    <li>Add these global variables to .env file</li>
        DB_DATABASE=blog<br>
        DB_USERNAME=root<br>
    <li><code>php artisan key:generate</code></li>
    <li><code>php artisan migrate</code></li>
    <li><code>php artisan db:seed</code></li>
    <li><code>php artisan serve</code></li>
</ul>

<h3>Admin User</h3>
<ul>
    <li>admin@convertium.com</li>
    <li>123456789</li>
</ul>

<h3>How to test?</h3>
 - Signup for new user account
 - Create a new blog post
 - Logout and Login as an administrator
 - approve the blog post