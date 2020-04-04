# Laravel Http Stats

<p align="center">
  
  <a href="https://github.com/clarkeash/laravel-http-stats/actions?query=workflow%3ACI">
    <img alt="GitHub Workflow Status" src="https://img.shields.io/github/workflow/status/clarkeash/laravel-http-stats/CI?logo=github&style=for-the-badge">
  </a>
  <a href="https://github.com/clarkeash/laravel-http-stats/blob/master/LICENSE">
    <img src="https://img.shields.io/github/license/clarkeash/laravel-http-stats.svg?style=for-the-badge">
  </a>
  <a href="https://twitter.com/clarkeash">
    <img src="http://img.shields.io/badge/author-@clarkeash-blue.svg?style=for-the-badge">
  </a>
</p>

Laravel Http Stats gives you access to the transfer stats of HTTP stats performed through Laravels [HTTP Client](https://laravel.com/docs/http-client).

## Installation

You can pull in the package using [composer](https://getcomposer.org):

```bash
$ composer require clarkeash/laravel-http-stats
```

## Usage

Once you have made a request like so:

```php
use Illuminate\Support\Facades\Http;

$response = Http::get('http://test.com');
```

You will now have access to a `stats` method on the `$response` object.

```php
$response->stats()->lookup(); // dns time in ms
$response->stats()->connect(); // tcp connection time in ms
$response->stats()->ssl(); // ssl handshake time in ms
$response->stats()->pretransfer(); // Protocol negotiation time in ms
$response->stats()->redirect(); // redirect time in ms
$response->stats()->ttfb(); // time to first byte in ms
$response->stats()->total(); // total time in ms
```
