# Magento 2 module for GraphQl Blackfire Profiler

## Description
A helper module to profile GraphQl requests in magento2. Not intended for production usage.
Production use blackfire player.

## Blackfire Header
To profile we need to add additional header to our request.
The header should start with X- eg. X-Blackfire.


## Installation and Setup
- Signup for blackfire if you haven't done already.
- Install blackfire in the environment by following the [official guide](https://blackfire.io/docs/up-and-running/installation)
- Install this extension using `composer require dani97/blackfire-graph-ql`
- Add Blackfire client configuration and blackfire header in Admin -> Configuration -> Blackfire GraphQl
- From graphql client add blackfire header to profile request.

Supported versions:
* Magento 2.3
* Magento 2.4

See `composer.json` for other requirements.

## See also
- [Installation](INSTALL.md)
- [CHANGELOG](CHANGELOG.md)
- [License](LICENSE.txt)
