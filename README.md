<p align="center"><a href="https://hypervel.org" target="_blank"><img src="https://hypervel.org/logo.png" width="400" alt="Hypervel Logo"></a></p>

<p align="center">
<a href="https://github.com/hypervel/hypervel/actions"><img src="https://github.com/hypervel/hypervel/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/hypervel/hypervel"><img src="https://img.shields.io/packagist/dt/hypervel/hypervel" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/hypervel/hypervel"><img src="https://img.shields.io/packagist/v/hypervel/hypervel" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/hypervel/hypervel"><img src="https://img.shields.io/packagist/l/hypervel/hypervel" alt="License"></a>
</p>

> [!WARNING]
> This branch contains the ongoing, unreleased work for the Hypervel 0.4 rewrite.
>
> Hypervel 0.4 is not ready for use yet. APIs, behavior, configuration, and package internals may change unexpectedly while the rewrite is still in progress.
>
> If you are experimenting with this branch, use the [in-progress 0.4 documentation](https://github.com/hypervel/components/tree/0.4/src/docs). If you are coming from Laravel, begin with the [porting guide](https://github.com/hypervel/components/blob/0.4/src/docs/porting-from-laravel.md).
>
> Please do not use this branch for projects until a beta release is tagged. If you are experimenting or testing the rewrite, bug reports and feedback are very welcome.

## About Hypervel

Hypervel is a modern, asynchronous PHP framework built for high performance and scalability.

Hypervel runs applications in long-lived Swoole workers, using coroutines to handle requests, background jobs, and network operations concurrently. While one coroutine waits for a database query, HTTP response, or other I/O, the worker can continue other work. This concurrency model runs throughout the framework, letting you write familiar sequential PHP while taking advantage of concurrent execution.

Hypervel is built for traditional web applications, APIs, microservices, real-time services, background workers, and applications that spend much of their time waiting on external systems.

## About This Repository

This repository is a read-only split of the Hypervel application skeleton. It provides the default application structure and configuration used when creating a new Hypervel project. The skeleton is maintained in [hypervel/components](https://github.com/hypervel/components/tree/0.4/skeletons/hypervel), alongside the framework source and first-party packages.

Report skeleton and framework bugs through the components repository's [Issues](https://github.com/hypervel/components/issues), and use its [Discussions](https://github.com/hypervel/components/discussions) for support questions, feature requests, and ideas.

## Getting Started

Create a new Hypervel application using Composer's `create-project` command:

```bash
composer create-project hypervel/hypervel example-app

cd example-app
php artisan serve
```

Once the development server has started, the application will be available at [http://localhost:8000](http://localhost:8000).

If you prefer to build your frontend with Inertia and React, you may start with the official React application starter kit:

```bash
composer create-project hypervel/react-starter-kit example-app
```

See the [installation documentation](https://github.com/hypervel/components/blob/0.4/src/docs/installation.md) and [starter kit documentation](https://github.com/hypervel/components/blob/0.4/src/docs/starter-kits.md) for the complete setup instructions.

## Framework Features

Hypervel includes the features expected from a modern full-stack framework:

- Fast, expressive [routing](https://github.com/hypervel/components/blob/0.4/src/docs/routing.md) and middleware.
- A powerful [dependency injection container](https://github.com/hypervel/components/blob/0.4/src/docs/container.md) and service provider system.
- Multiple [session](https://github.com/hypervel/components/blob/0.4/src/docs/session.md) and [cache](https://github.com/hypervel/components/blob/0.4/src/docs/cache.md) stores.
- [Eloquent ORM](https://github.com/hypervel/components/blob/0.4/src/docs/eloquent.md), schema building, and [database migrations](https://github.com/hypervel/components/blob/0.4/src/docs/migrations.md).
- [Background jobs](https://github.com/hypervel/components/blob/0.4/src/docs/queues.md), job batching, and [task scheduling](https://github.com/hypervel/components/blob/0.4/src/docs/scheduling.md).
- Real-time [event broadcasting](https://github.com/hypervel/components/blob/0.4/src/docs/broadcasting.md) and [WebSocket support](https://github.com/hypervel/components/blob/0.4/src/docs/websockets.md).
- [Authentication](https://github.com/hypervel/components/blob/0.4/src/docs/authentication.md), [authorization](https://github.com/hypervel/components/blob/0.4/src/docs/authorization.md), [validation](https://github.com/hypervel/components/blob/0.4/src/docs/validation.md), [notifications](https://github.com/hypervel/components/blob/0.4/src/docs/notifications.md), [mail](https://github.com/hypervel/components/blob/0.4/src/docs/mail.md), and [filesystem storage](https://github.com/hypervel/components/blob/0.4/src/docs/filesystem.md).
- [Blade templates](https://github.com/hypervel/components/blob/0.4/src/docs/blade.md) and [Vite](https://github.com/hypervel/components/blob/0.4/src/docs/vite.md) integration.
- Built-in support for [coroutines](https://github.com/hypervel/components/blob/0.4/src/docs/coroutines.md) and [concurrent HTTP requests](https://github.com/hypervel/components/blob/0.4/src/docs/http-client.md#concurrent-requests).
- Persistent [database](https://github.com/hypervel/components/blob/0.4/src/docs/database.md#connection-pooling) and [Redis](https://github.com/hypervel/components/blob/0.4/src/docs/redis.md#connection-pooling) connection pools.
- Coroutine-aware [testing](https://github.com/hypervel/components/blob/0.4/src/docs/testing.md) with a familiar assertion API.

## Laravel Compatibility

Hypervel aims for Laravel API compatibility wherever it fits. However, Hypervel is not a Laravel clone or drop-in replacement. Many Hypervel components are ports of Laravel packages, adapted for Hypervel's asynchronous runtime, performance requirements, and coroutine safety, but the framework itself has its own architecture, features, supported integrations, and direction.

Moving an existing Laravel application or package to Hypervel is a deliberate port, not a namespace replacement. The [porting guide](https://github.com/hypervel/components/blob/0.4/src/docs/porting-from-laravel.md) explains what needs to change and why.

## Learning Hypervel

The in-progress Hypervel 0.4 documentation is available [here](https://github.com/hypervel/components/tree/0.4/src/docs).

Hypervel's documentation follows the structure and style of Laravel's documentation, and portions are adapted from it. Our thanks to the Laravel community.

## AI-Assisted Development

[Hypervel Boost](https://github.com/hypervel/boost) gives AI coding agents Hypervel-specific documentation, tools, and guidelines for the packages installed in your application. Install Boost as a development dependency, then run its installer:

```bash
composer require hypervel/boost --dev

php artisan boost:install
```

Boost can search version-specific documentation, inspect your application, query its database, read browser logs, generate tests, and execute code through Tinker. Its guidelines help coding agents follow Hypervel conventions.

## Contributing

Thank you for considering contributing to Hypervel. The [contribution guide](https://github.com/hypervel/components/blob/0.4/src/docs/contributions.md) explains which changes are accepted, how to run the required checks, and how to prepare a pull request.

Submit skeleton and framework changes to the [components repository](https://github.com/hypervel/components).

## Code of Conduct

Please review and follow Hypervel's [Code of Conduct](https://github.com/hypervel/components/blob/0.4/src/docs/contributions.md#code-of-conduct) when participating in the community.

## Security Vulnerabilities

If you discover a security vulnerability in Hypervel, please report it privately by emailing Albert Chen at [albert@hypervel.org](mailto:albert@hypervel.org). Security vulnerabilities will be addressed promptly.

Please do not report security vulnerabilities through public GitHub issues or discussions.

## License

The Hypervel framework is open-sourced software licensed under the [MIT license](https://github.com/hypervel/hypervel/blob/0.4/LICENSE).

## Created by

<table align="center">
    <tr>
        <td align="center">
            <a href="https://github.com/albertcht">
                <img src="https://github.com/albertcht.png?size=96" width="96" alt="Albert Chen">
                <br>
                <sub><b>Albert Chen</b></sub>
            </a>
        </td>
        <td align="center">
            <a href="https://github.com/binaryfire">
                <img src="https://github.com/binaryfire.png?size=96" width="96" alt="Raj Siva-Rajah">
                <br>
                <sub><b>Raj Siva-Rajah</b></sub>
            </a>
        </td>
    </tr>
</table>
