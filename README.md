Installation
============

Make sure Composer is installed globally, as explained in the
[installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Then run

```console
$ composer require j4nr6n/docker-client
```

The Client
==========

```php
use j4nr6n/DockerClient/Client;

$docker = new Client(
    engineUrl: 'http://localhost',    // default value
    interface: '/var/run/docker.sock' // default value
);
```
