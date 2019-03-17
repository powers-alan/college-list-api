college-list-api
==============

Greetings Flytedesk team!  I present to you, for a bit of levity in your day, a nearly completely non-functional college list REST API.  I could certainly get everything working with more twiddling, but in attempting to keep with the spirit of the "spend 2-4 hours on this project" challenge I'm drawing the line here for the moment.  Full disclosure: I've spend quite a bit more than four hours on this already wallowing in my myriad mistakes.  Mea culpa.  

Let me outline where things went awry.  

 - I've written a good number of REST API's using the [Silex](https://silex.symfony.com/) library.  I'm very familiar with that setup and probably could have whipped something together in close to the alotted timeframe.  But this is an interview and a learing opportunity, so using an offially EOL'd project wasn't an approach I wanted to take.  How different could the recommended upgrade to [Symphony 4](https://symfony.com/doc/current/setup/flex.html) possibly be?  Sounded fun.  
 
 - I now entered a brave new world of Symphony Flex!  I was presented with piles of .yaml config files of nebulous intent,  annotation meta-programming, autowiring, automatic schema generation and automatic REST endpoint route generation.  All this "magic" sounded great and terrifying.  According the the Symfony people: 
 > Flex is so convenient and improves your productivity so much that it's strongly recommended to upgrade your existing applications to it
 
- Unfortunately, I'm sure I have subtle errors in my config yaml files that I've spent entirely too much time tracking down instead of producing the actual functionality of the API.  "Magic" can be so good when it works, but it's often a deep-dive when it doesn't quite work.  

 - If I was going to go about picking up a whole new framework, Laravel would have been a much better choice.  At least that would have been more relvent to this particular challenge.

 I'd be happy to discuss with you how this all could be improved, but when the basic funcionality isn't quite there, talking about db optimization, input validation, error hadling and authentication seems like we're getting a bit ahead of ourselves.  Thanks for your time.  Outlined below is my general approach, how things were intended to be fired up, and what actually (kinda) works.  Again, of course I could get this all working and I probably will for my own education, but in keeping with the spirit of the challenge this is what I have right now.

# Approach
I forked the following project to create the docker-compose infrastructure and save some time bootstrapping the project.  This project sets up PHP-FPM, xdebug, MySQL, nginx and the bonus of ELK Stack for Elasticsearch, Logstagsh and Kibana.

https://github.com/eko/docker-symfony

I installed SwaggerUI and wrote up most of a swagger yaml for the API.

I set up a bunch of boilerplate code for the models/controllers and endpoints.

I set up the Doctrine ORM annotations with the hope that it would successfully generate a DDL schema.

# Intended Installation and Run procedure

First, clone this repository:

```bash
$ git clone https://github.com/powers-alan/college-list-api.git
```

Then, run:
```bash
$ cd symphony; composer install
```

```bash
$ docker-compose up
```

You can now add symfony.localhost to your hosts file and visit the API on the following URL: `http://symfony.localhost/api` (and access Kibana on `http://symfony.localhost:81`)  The swagger docs are accessible at: `http://symfony.localhost/apidocs`

> _Except_ there's something now quite right with the nginx configruation, so that's not currently working out of the box.  What is somewhat working for me is starting up the php dev webserver like so: 
```bash
$ php bin/console server:start 0.0.0.0:8000
```
You can now add symfony.localhost to your hosts file and visit the API on the following URL: `http://symfony.localhost:8000/api`  The swagger docs are accessible at: `http://symfony.localhost:8000/apidocs`

# Code license

You are free to use the code in this repository under the terms of the 0-clause BSD license. LICENSE contains a copy of this license.
