# Symfony Acme Bundle

Template to create new symfony bundle.

Usage:
* Replace "Cesurapp\AcmeBundle" -> "GithubRepo\XYZBundle"
* Configure micro kernel -> tests/Kernel.php

Commands:
```shell
# PHPUnit Test
composer test
composer test:stop

# PHPCsFixer & PHPStan
composer qa:fix
composer qa:lint
composer qa:phpstan

# Test and Fix All
composer fix
```