<h1><center><b>Blog App using Laravel 9</b></center></h1>

<h3>Tested Environment</h3>
<ul type="disc">
    <li>PHP 8.0</li>
    <li>MySQL 8.0</li>
    <li>Node 14.15.4</li>
    <li>Composer 2.2.6</li>
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
    <li>App will run on this URL<code>http://127.0.0.1:8000</code></li>
</ul>

<h3>Admin User</h3>
<ul>
    <li>admin@convertium.com</li>
    <li>123456789</li>
</ul>

<h3>How to test?</h3>
<ul>
    <li>Signup for new user account</li>
    <li>Create a new blog post</li>
    <li>Logout and Login as an administrator</li>
    <li>approve the blog post</li>
</ul>

<h3>Blog Screens</h3>

![image description](https://github.com/daskon/convertium-blogapp/blob/master/public/images/blog%20post%20screen.JPG)

![image description](https://github.com/daskon/convertium-blogapp/blob/master/public/images/login.JPG)

![image description](https://github.com/daskon/convertium-blogapp/blob/master/public/images/register.JPG)

![image description](https://github.com/daskon/convertium-blogapp/blob/master/public/images/editor%20dashboard.JPG)

![image description](https://github.com/daskon/convertium-blogapp/blob/master/public/images/admin%20dashboard.JPG)