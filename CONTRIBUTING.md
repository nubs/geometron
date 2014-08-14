# Contribution Guidelines
This project is wide open to contributions.  You can use GitHub to [report
issues][issues] or [submit pull requests][pull-requests].  When opening pull
requests, it is recommended to follow these guidelines in order to grease the
wheels, so to speak.

Please include as many details as you can in any issues and pull requests.
Understanding how you are using the library and exactly what problems you are
having can also help make things move quickly.

## Building
There is an included [build script][build-script] that you can execute locally
to run the code through the [PSR-1 coding standard][psr-1] and the
[PHPUnit][phpunit] test suite.  Code coverage is kept at 100% according to
PHPUnit's code coverage report.

Alternatively, you can use [Docker][docker] and/or [Fig][fig] to execute the
build:
```bash
fig run build
```

## Automated builds
Pull requests will automatically have a build kicked off on [Travis
CI][travis-ci] and [Scrutinizer CI][scrutinizer-ci].  The results of these
builds are monitored closely for all pull requests.

[issues]: https://github.com/nubs/geometron/issues
[pull-requests]: https://github.com/nubs/geometron/pulls
[build-script]: https://github.com/nubs/geometron/blob/master/build.php
[psr-1]: http://www.php-fig.org/psr/psr-1/ "PSR-1 - Basic Coding Standard"
[phpunit]: http://phpunit.de/ "PHPUnit - The PHP Testing Framework"
[travis-ci]: https://travis-ci.org/nubs/geometron
[scrutinizer-ci]: https://scrutinizer-ci.com/g/nubs/geometron/
[docker]: https://docker.com/ "Docker - Build, Ship, and Run Any App, Anywhere"
[fig]: http://www.fig.sh/ "Fig | Fast, isolated development environments using Docker"