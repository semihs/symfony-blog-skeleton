symfony-blog-skeleton
=====================

A Symfony project created on September 9, 2016, 5:22 pm.

This project needed npm, bower and some gulp components for assets

Run the following lines

- cd /path/to/project-dir
- npm install
- bower install
- npm install gulp
- gulp



Theme Based Gulp compile
- gulp default-theme
- gulp backend-theme


Endpoints
---------

- /blog
- /blog/{slug}
- /admin/blog
- /admin/blog/add
- /admin/blog/{id}/edit
- /admin/blog/{id}/delete

Security
--------
Http basic authentication in memory users, look at the app/config/security.yml
