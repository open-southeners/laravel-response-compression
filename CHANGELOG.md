# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [3.0.0] - 2025-03-05

### Added

- lz4 compression algorithm
- Compression algorithm preference based on the ones sent from client (if supported by server)
- Laravel dependencies

### Changed

- **Package rename to `open-southeners/laravel-response-compression`, change all `OpenSoutheners\LaravelVaporResponseCompression` to `OpenSoutheners\LaravelResponseCompression`**
- **Config file with `*_LEVEL` environment variables for each algorithm compression level, force publishing using `php artisan vendor:publish --tag="response-compression" --force`**
- `CompressionEncoding` is now a backed enum instead with some functionality

### Removed

- Laravel 9 and 10 support
- PHP 7.4 and 8.0 support
- Composer dependency for zlib PHP extension (not really required)

## [2.2.0] - 2025-02-17

### Added

- zstd compression by @matthewnessworthy [#3]

## [2.1.0] - 2024-02-14

### Changed

- Ignore `response()->stream()`, `response()->streamDownload()` and `response()->streamDownload()` responses as files might be already compressed. [#2]
- Ignore compression when `Content-Encoding` header already present. [#2]

## [2.0.1] - 2023-02-02

### Fixed

- PHP 8.2 interpolation deprecations

## [2.0.0] - 2022-08-25

### Added

- Enable option following its environment variable `RESPONSE_COMPRESSION_ENABLE` (default: `true`)

### Changed

- Its dedicated config file (`config/response-compression.php`). Publishable by running the command: `php artisan vendor:publish --tag=response-compression`

## [1.0.0] - 2022-07-22

### Added

- Initial release!
