# Location API

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

Info
----
The main purpose of this api are provides information about localization to use in 
futures geocoding capabilities of any software. Some operations from this API can be 
attached directly to DataAnalytics tools like Microsoft PowerBI and Tableau or Google DataStudio.   

Instructions 
----
First you have to put your docker container to work properly. Run the follow instructions like described: 

**Start and Build an image of the container:**
```
# cd docker 
# docker-compose up --build
```

With you container working properly, run the follow commands inside the **locationphp** container. 

```
# php artisan migrate:install 
# php artisan migrate
# php artisan db:seed
```

### Operations
> * postcode
> * countries
> * citiesPerCountry
> * coordinatesPostcodeList

### Documentation

To access the documentation page, when your container is working, just follow the link http://localhost:8080/api/documentation

![alt text](https://github.com/jorgelustosa/location/blob/main/public/img/doc.png?raw=true)


> ### ⚠️ Tips
> * When you start your container for the first time, you have to 
> wait a composer finish the package installation, before use and run commands 
> in your container. When the initialization is complete you will see the follow 
> message: <br><br>
>NOTICE: fpm is running, pid 1  <br> NOTICE: ready to handle connections
> <br><br>
> After that, you can easily run the commands to seed the database or use the application 

### Usefull Commands 

**Stop Docker**
```
# docker-compose stop
```
**Shell access for you docker container:**
```
# docker-compose exec app sh
```
