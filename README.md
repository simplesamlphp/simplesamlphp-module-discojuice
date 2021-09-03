![Build Status](https://github.com/simplesamlphp/simplesamlphp-module-discojuice/workflows/CI/badge.svg?branch=master)
[![Coverage Status](https://codecov.io/gh/simplesamlphp/simplesamlphp-module-discojuice/branch/master/graph/badge.svg)](https://codecov.io/gh/simplesamlphp/simplesamlphp-module-discojuice)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/simplesamlphp/simplesamlphp-module-discojuice/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/simplesamlphp/simplesamlphp-module-discojuice/?branch=master)

DiscoJuice module
=================

DiscoJuice is a very flexible User Interface library for implementing an IdP Discovery Service.

As a service provider, connected to a large number of Identity Providers, you would need to ask the user in advance of
the authentication process to select an Identity Provider.

DiscoJuice is super-simple to deploy at a Service Provider. Is is as easy as copying and pasting a small javascript
reference into the HTML source of your application.

Installation
------------

Once you have installed SimpleSAMLphp, installing this module is very simple. Just execute the following
command in the root of your SimpleSAMLphp installation:

```
composer.phar require simplesamlphp/simplesamlphp-module-discojuice:dev-master
```

where `dev-master` instructs Composer to install the `master` branch from the Git repository. See the
[releases](https://github.com/simplesamlphp/simplesamlphp-module-discojuice/releases) available if you
want to use a stable version of the module.

The module is enabled by default. If you want to disable the module once installed, you just need to create a file named
`disable` in the `modules/discojuice/` directory inside your SimpleSAMLphp installation.

To enable the discovery service in SimpleSAMLphp, set the `discoURL` parameter in your `authsources.php`:

```php
    'default-sp' => [
        'saml:SP',
        'discoURL' => 'https://sp1.example.org/simplesaml/module.php/discojuice/central.php',
```
