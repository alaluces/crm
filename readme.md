# CRM
Uses Laravel with Voyager Admin

# INSTALLATION
Install Laravel prerequisites via 
https://laravel.com/docs/5.7/installation

Clone the project
```sh
git clone https://github.com/alaluces/emrs2.git crm
cd crm
```

Import the database from the database directory

Edit database connection
```sh
cp .env.example .env
vim .env
```
  - DB_CONNECTION=mysql
  - DB_HOST=<DATABASE IP>
  - DB_PORT=3306
  - DB_DATABASE=crm
  - DB_USERNAME=crm
  - DB_PASSWORD=Crm@1234

Run init scripts
```sh
php artisan key:generate
chmod -R 0777 storage/
```
Generate symlink
```sh
php artisan storage:link
or
ln -s ../storage/app/public public/storage
```
Build the docker image
```sh
cd ..
mkdir crm-image
cd crm-image
git https://github.com/alaluces/Docker-Nginx-Php-Laravel.git .
docker build -t crm .
cd ..
```
Run the image you built
```sh
docker run -d --rm --name crm -v $PWD/emrs2/:/var/www/html -p80:80 crm
```

If built successfully, it can be viewed on:
```sh
http://<SERVER_IP_ADDRESS>/admin
username: admin@admin.com
passsword:password
```

