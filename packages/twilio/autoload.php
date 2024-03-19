{
    "_readme": [
        "This file locks the dependencies of your project to a known state",
        "Read more about it at https://getcomposer.org/doc/01-basic-usage.md#installing-dependencies",
        "This file is @generated automatically"
    ],
    "content-hash": "f9a64fdb8251c95b6b31bf2b718f20eb",
    "packages": [
        {
            "name": "agungsugiarto/codeigniter4-cors",
            "version": "v2.0.0",
            "source": {
                "type": "git",
                "url": "https://github.com/agungsugiarto/codeigniter4-cors.git",
                "reference": "3eae9932e8d68330a5b45a41a6871cc61a97bee3"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/agungsugiarto/codeigniter4-cors/zipball/3eae9932e8d68330a5b45a41a6871cc61a97bee3",
                "reference": "3eae9932e8d68330a5b45a41a6871cc61a97bee3",
                "shasum": ""
            },
            "require": {
                "codeigniter4/framework": "^4.1",
                "php": "^7.3 || ^8.0"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.1"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "2.x-dev"
                }
            },
            "autoload": {
                "psr-4": {
                    "Fluent\\Cors\\": "src"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Agung Sugiarto",
                    "email": "me.agungsugiarto@tgmail.com",
                    "homepage": "https://agungsugiarto.github.io",
                    "role": "Developer"
                }
            ],
            "description": "Send CORS Headers in a CodeIgniter 4 application.",
            "keywords": [
                "ajax",
                "api",
                "codeigniter4",
                "codeigniter4-cors",
                "cors",
                "request"
            ],
            "support": {
                "issues": "https://github.com/agungsugiarto/codeigniter4-cors/issues",
                "source": "https://github.com/agungsugiarto/codeigniter4-cors/tree/v2.0.0"
            },
            "funding": [
                {
                    "url": "https://saweria.co/agungsugiarto",
                    "type": "custom"
                }
            ],
            "time": "2021-02-19T13:24:21+00:00"
        },
        {
            "name": "kint-php/kint",
            "version": "4.2.2",
            "source": {
                "type": "git",
                "url": "https://github.com/kint-php/kint.git",
                "reference": "9230c016c976ff446f0be5cf82272db278344f69"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/kint-php/kint/zipball/9230c016c976ff446f0be5cf82272db278344f69",
                "reference": "9230c016c976ff446f0be5cf82272db278344f69",
                "shasum": ""
            },
            "require": {
                "php": ">=5.6"
            },
            "require-dev": {
                "friendsofphp/php-cs-fixer": "^3.0",
                "phpspec/prophecy-phpunit": "^2",
                "phpunit/phpunit": "^9.0",
                "seld/phar-utils": "^1.0",
                "symfony/finder": "^3.0 || ^4.0 || ^5.0",
                "vimeo/psalm": "^4.0"
            },
            "suggest": {
                "kint-php/kint-helpers": "Provides extra helper functions",
                "kint-php/kint-twig": "Provides d() and s() functions in twig templates"
            },
            "type": "library",
            "autoload": {
                "files": [
                    "init.php"
                ],
                "psr-4": {
                    "Kint\\": "src/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Jonathan Vollebregt",
                    "homepage": "https://github.com/jnvsor"
                },
                {
                    "name": "Contributors",
                    "homepage": "https://github.com/kint-php/kint/graphs/contributors"
                }
            ],
            "description": "Kint - debugging tool for PHP developers",
            "homepage": "https://kint-php.github.io/kint/",
            "keywords": [
                "debug",
                "kint",
                "php"
            ],
            "support": {
                "issues": "https://github.com/kint-php/kint/issues",
                "source": "https://github.com/kint-php/kint/tree/4.2.2"
            },
            "time": "2022-09-24T10:11:09+00:00"
        },
        {
            "name": "laminas/laminas-escaper",
            "version": "2.10.0",
            "source": {
                "type": "git",
                "url": "https://github.com/laminas/laminas-escaper.git",
                "reference": "58af67282db37d24e584a837a94ee55b9c7552be"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/laminas/laminas-escaper/zipball/58af67282db37d24e584a837a94ee55b9c7552be",
                "reference": "58af67282db37d24e584a837a94ee55b9c7552be",
                "shasum": ""
            },
            "require": {
                "ext-ctype": "*",
                "ext-mbstring": "*",
                "php": "^7.4 || ~8.0.0 || ~8.1.0"
            },
            "conflict": {
                "zendframework/zend-escaper": "*"
            },
            "require-dev": {
                "infection/infection": "^0.26.6",
                "laminas/laminas-coding-standard": "~2.3.0",
                "maglnet/composer-require-checker": "^3.8.0",
                "phpunit/phpunit": "^9.5.18",
                "psalm/plugin-phpunit": "^0.16.1",
                "vimeo/psalm": "^4.22.0"
            },
            "type": "library",
            "autoload": {
                "psr-4": {
                    "Laminas\\Escaper\\": "src/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "description": "Securely and safely escape HTML, HTML attributes, JavaScript, CSS, and URLs",
            "homepage": "https://laminas.dev",
            "keywords": [
                "escaper",
                "laminas"
            ],
            "support": {
                "chat": "https://laminas.dev/chat",
                "docs": "https://docs.laminas.dev/laminas-escaper/",
                "forum": "https://discourse.laminas.dev",
                "issues": "https://github.com/laminas/laminas-escaper/issues",
                "rss": "https://github.com/laminas/laminas-escaper/releases.atom",
                "source": "https://github.com/laminas/laminas-escaper"
            },
            "funding": [
                {
                    "url": "https://funding.communitybridge.org/projects/laminas-project",
                    "type": "community_bridge"
                }
            ],
            "time": "2022-03-08T20:15:36+00:00"
        },
        {
            "name": "psr/log",
            "version": "1.1.4",
            "source": {
                "type": "git",
                "url": "https://github.com/php-fig/log.git",
                "reference": "d49695b909c3b7628b6289db5479a1c204601f11"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/php-fig/log/zipball/d49695b909c3b7628b6289db5479a1c204601f11",
                "reference": "d49695b909c3b7628b6289db5479a1c204601f11",
                "shasum": ""
            },
            "require": {
                "php": ">=5.3.0"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "1.1.x-dev"
                }
            },
            "autoload": {
                "psr-4": {
                    "Psr\\Log\\": "Psr/Log/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "PHP-FIG",
                    "homepage": "https://www.php-fig.org/"
                }
            ],
            "description": "Common interface for logging libraries",
            "homepage": "https://github.com/php-fig/log",
            "keywords": [
                "log",
                "psr",
                "psr-3"
            ],
            "support": {
                "source": "https://github.com/php-fig/log/tree/1.1.4"
            },
            "time": "2021-05-03T11:20:27+00:00"
        },
        {
            "name": "twilio/sdk",
            "version": "6.42.1",
            "source": {
                "type": "git",
                "url": "git@github.com:twilio/twilio-php.git",
                "reference": "8a1a5bc1616c4b50a23e09880c1e3d02f93a68ec"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/twilio/twilio-php/zipball/8a1a5bc1616c4b50a23e09880c1e3d02f93a68ec",
                "reference": "8a1a5bc1616c4b50a23e09880c1e3d02f93a68ec",
                "shasum": ""
            },
            "require": {
                "php": ">=7.1.0"
            },
            "require-dev": {
                "guzzlehttp/guzzle": "^6.3 || ^7.0",
                "phpunit/phpunit": ">=7.0"
            },
            "suggest": {
                "guzzlehttp/guzzle": "An HTTP client to execute the API requests"
            },
            "type": "library",
            "autoload": {
                "psr-4": {
                    "Twilio\\": "src/Twilio/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Twilio API Team",
                    "email": "api@twilio.com"
                }
            ],
            "description": "A PHP wrapper for Twilio's API",
            "homepage": "https://github.com/twilio/twilio-php",
            "keywords": [
                "api",
                "sms",
                "twilio"
            ],
            "time": "2022-09-21T19:12:52+00:00"
        }
    ],
    "packages-dev": [
        {
            "name": "codeigniter/coding-standard",
            "version": "v1.5.0",
            "source": {
                "type": "git",
                "url": "https://github.com/CodeIgniter/coding-standard.git",
                "reference": "7c2344a0312eb182ae6409fe670de6d9845081e2"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/CodeIgniter/coding-standard/zipball/7c2344a0312eb182ae6409fe670de6d9845081e2",
                "reference": "7c2344a0312eb182ae6409fe670de6d9845081e2",
                "shasum": ""
            },
            "require": {
                "ext-tokenizer": "*",
                "friendsofphp/php-cs-fixer": "^3.11",
                "nexusphp/cs-config": "^3.6",
                "php": "^7.4 || ^8.0"
            },
            "require-dev": {
                "nexusphp/tachycardia": "^1.3",
                "phpstan/phpstan": "^1.0",
                "phpunit/phpunit": "^9.5"
            },
            "type": "library",
            "autoload": {
                "psr-4": {
                    "CodeIgniter\\CodingStandard\\": "src/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "John Paul E. Balandan, CPA",
                    "email": "paulbalandan@gmail.com"
                }
            ],
            "description": "Official Coding Standards for CodeIgniter based on PHP CS Fixer",
            "keywords": [
                "phpcs",
                "static analysis"
            ],
            "support": {
                "forum": "http://forum.codeigniter.com/",
                "issues": "https://github.com/CodeIgniter/coding-standard/issues",
                "slack": "https://codeigniterchat.slack.com",
                "source": "https://github.com/CodeIgniter/coding-standard"
            },
            "time": "2022-09-13T05:27:06+00:00"
        },
        {
            "name": "composer/pcre",
            "version": "3.0.0",
            "source": {
                "type": "git",
                "url": "https://github.com/composer/pcre.git",
                "reference": "e300eb6c535192decd27a85bc72a9290f0d6b3bd"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/composer/pcre/zipball/e300eb6c535192decd27a85bc72a9290f0d6b3bd",
                "reference": "e300eb6c535192decd27a85bc72a9290f0d6b3bd",
                "shasum": ""
            },
            "require": {
                "php": "^7.4 || ^8.0"
            },
            "require-dev": {
                "phpstan/phpstan": "^1.3",
                "phpstan/phpstan-strict-rules": "^1.1",
                "symfony/phpunit-bridge": "^5"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-main": "3.x-dev"
                }
            },
            "autoload": {
                "psr-4": {
                    "Composer\\Pcre\\": "src"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Jordi Boggiano",
                    "email": "j.boggiano@seld.be",
                    "homepage": "http://seld.be"
                }
            ],
            "description": "PCRE wrapping library that offers type-safe preg_* replacements.",
            "keywords": [
                "PCRE",
                "preg",
                "regex",
                "regular expression"
            ],
            "support": {
                "issues": "https://github.com/composer/pcre/issues",
                "source": "https://github.com/composer/pcre/tree/3.0.0"
            },
            "funding": [
                {
                    "url": "https://packagist.com",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/composer",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/composer/composer",
                    "type": "tidelift"
                }
            ],
            "time": "2022-02-25T20:21:48+00:00"
        },
        {
            "name": "composer/semver",
            "version": "3.3.2",
            "source": {
                "type": "git",
                "url": "https://github.com/composer/semver.git",
                "reference": "3953f23262f2bff1919fc82183ad9acb13ff62c9"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/composer/semver/zipball/3953f23262f2bff1919fc82183ad9acb13ff62c9",
                "reference": "3953f23262f2bff1919fc82183ad9acb13ff62c9",
                "shasum": ""
            },
            "require": {
                "php": "^5.3.2 || ^7.0 || ^8.0"
            },
            "require-dev": {
                "phpstan/phpstan": "^1.4",
                "symfony/phpunit-bridge": "^4.2 || ^5"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-main": "3.x-dev"
                }
            },
            "autoload": {
                "psr-4": {
                    "Composer\\Semver\\": "src"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Nils Adermann",
                    "email": "naderman@naderman.de",
                    "homepage": "http://www.naderman.de"
                },
                {
                    "name": "Jordi Boggiano",
                    "email": "j.boggiano@seld.be",
                    "homepage": "http://seld.be"
                },
                {
                    "name": "Rob Bast",
                    "email": "rob.bast@gmail.com",
                    "homepage": "http://robbast.nl"
                }
            ],
            "description": "Semver library that offers utilities, version constraint parsing and validation.",
            "keywords": [
                "semantic",
                "semver",
                "validation",
                "versioning"
            ],
            "support": {
                "irc": "irc://irc.freenode.org/composer",
                "issues": "https://github.com/composer/semver/issues",
                "source": "https://github.com/composer/semver/tree/3.3.2"
            },
            "funding": [
                {
                    "url": "https://packagist.com",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/composer",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/composer/composer",
                    "type": "tidelift"
                }
            ],
            "time": "2022-04-01T19:23:25+00:00"
        },
        {
            "name": "composer/xdebug-handler",
            "version": "3.0.3",
            "source": {
                "type": "git",
                "url": "https://github.com/composer/xdebug-handler.git",
                "reference": "ced299686f41dce890debac69273b47ffe98a40c"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/composer/xdebug-handler/zipball/ced299686f41dce890debac69273b47ffe98a40c",
                "reference": "ced299686f41dce890debac69273b47ffe98a40c",
                "shasum": ""
            },
            "require": {
                "composer/pcre": "^1 || ^2 || ^3",
                "php": "^7.2.5 || ^8.0",
                "psr/log": "^1 || ^2 || ^3"
            },
            "require-dev": {
                "phpstan/phpstan": "^1.0",
                "phpstan/phpstan-strict-rules": "^1.1",
                "symfony/phpunit-bridge": "^6.0"
            },
            "type": "library",
            "autoload": {
                "psr-4": {
                    "Composer\\XdebugHandler\\": "src"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "John Stevenson",
                    "email": "john-stevenson@blueyonder.co.uk"
                }
            ],
            "description": "Restarts a process without Xdebug.",
            "keywords": [
                "Xdebug",
                "performance"
            ],
            "support": {
                "irc": "irc://irc.freenode.org/composer",
                "issues": "https://github.com/composer/xdebug-handler/issues",
                "source": "https://github.com/composer/xdebug-handler/tree/3.0.3"
            },
            "funding": [
                {
                    "url": "https://packagist.com",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/composer",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/composer/composer",
                    "type": "tidelift"
                }
            ],
            "time": "2022-02-25T21:32:43+00:00"
        },
        {
            "name": "doctrine/annotations",
            "version": "1.13.3",
            "source": {
                "type": "git",
                "url": "https://github.com/doctrine/annotations.git",
                "reference": "648b0343343565c4a056bfc8392201385e8d89f0"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/doctrine/annotations/zipball/648b0343343565c4a056bfc8392201385e8d89f0",
                "reference": "648b0343343565c4a056bfc8392201385e8d89f0",
                "shasum": ""
            },
            "require": {
                "doctrine/lexer": "1.*",
                "ext-tokenizer": "*",
                "php": "^7.1 || ^8.0",
                "psr/cache": "^1 || ^2 || ^3"
            },
            "require-dev": {
                "doctrine/cache": "^1.11 || ^2.0",
                "doctrine/coding-standard": "^6.0 || ^8.1",
                "phpstan/phpstan": "^1.4.10 || ^1.8.0",
                "phpunit/phpunit": "^7.5 || ^8.0 || ^9.1.5",
                "symfony/cache": "^4.4 || ^5.2",
                "vimeo/psalm": "^4.10"
            },
            "type": "library",
            "autoload": {
                "psr-4": {
                    "Doctrine\\Common\\Annotations\\": "lib/Doctrine/Common/Annotations"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Guilherme Blanco",
                    "email": "guilhermeblanco@gmail.com"
                },
                {
                    "name": "Roman Borschel",
                    "email": "roman@code-factory.org"
                },
                {
                    "name": "Benjamin Eberlei",
                    "email": "kontakt@beberlei.de"
                },
                {
                    "name": "Jonathan Wage",
                    "email": "jonwage@gmail.com"
                },
                {
                    "name": "Johannes Schmitt",
                    "email": "schmittjoh@gmail.com"
                }
            ],
            "description": "Docblock Annotations Parser",
            "homepage": "https://www.doctrine-project.org/projects/annotations.html",
            "keywords": [
                "annotations",
                "docblock",
                "parser"
            ],
            "support": {
                "issues": "https://github.com/doctrine/annotations/issues",
                "source": "https://github.com/doctrine/annotations/tree/1.13.3"
            },
            "time": "2022-07-02T10:48:51+00:00"
        },
        {
            "name": "doctrine/instantiator",
            "version": "1.4.1",
            "source": {
                "type": "git",
                "url": "https://github.com/doctrine/instantiator.git",
                "reference": "10dcfce151b967d20fde1b34ae6640712c3891bc"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/doctrine/instantiator/zipball/10dcfce151b967d20fde1b34ae6640712c3891bc",
                "reference": "10dcfce151b967d20fde1b34ae6640712c3891bc",
                "shasum": ""
            },
            "require": {
                "php": "^7.1 || ^8.0"
            },
            "require-dev": {
                "doctrine/coding-standard": "^9",
                "ext-pdo": "*",
                "ext-phar": "*",
                "phpbench/phpbench": "^0.16 || ^1",
                "phpstan/phpstan": "^1.4",
                "phpstan/phpstan-phpunit": "^1",
                "phpunit/phpunit": "^7.5 || ^8.5 || ^9.5",
                "vimeo/psalm": "^4.22"
            },
            "type": "library",
            "autoload": {
                "psr-4": {
                    "Doctrine\\Instantiator\\": "src/Doctrine/Instantiator/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Marco Pivetta",
                    "email": "ocramius@gmail.com",
                    "homepage": "https://ocramius.github.io/"
                }
            ],
            "description": "A small, lightweight utility to instantiate objects in PHP without invoking their constructors",
            "homepage": "https://www.doctrine-project.org/projects/instantiator.html",
            "keywords": [
                "constructor",
                "instantiate"
            ],
            "support": {
                "issues": "https://github.com/doctrine/instantiator/issues",
                "source": "https://github.com/doctrine/instantiator/tree/1.4.1"
            },
            "funding": [
                {
                    "url": "https://www.doctrine-project.org/sponsorship.html",
                    "type": "custom"
                },
                {
                    "url": "https://www.patreon.com/phpdoctrine",
                    "type": "patreon"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/doctrine%2Finstantiator",
                    "type": "tidelift"
                }
            ],
            "time": "2022-03-03T08:28:38+00:00"
        },
        {
            "name": "doctrine/lexer",
            "version": "1.2.3",
            "source": {
                "type": "git",
                "url": "https://github.com/doctrine/lexer.git",
                "reference": "c268e882d4dbdd85e36e4ad69e02dc284f89d229"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/doctrine/lexer/zipball/c268e882d4dbdd85e36e4ad69e02dc284f89d229",
                "reference": "c268e882d4dbdd85e36e4ad69e02dc284f89d229",
                "shasum": ""
            },
            "require": {
                "php": "^7.1 || ^8.0"
            },
            "require-dev": {
                "doctrine/coding-standard": "^9.0",
                "phpstan/phpstan": "^1.3",
                "phpunit/phpunit": "^7.5 || ^8.5 || ^9.5",
                "vimeo/psalm": "^4.11"
            },
            "type": "library",
            "autoload": {
                "psr-4": {
                    "Doctrine\\Common\\Lexer\\": "lib/Doctrine/Common/Lexer"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Guilherme Blanco",
                    "email": "guilhermeblanco@gmail.com"
                },
                {
                    "name": "Roman Borschel",
                    "email": "roman@code-factory.org"
                },
                {
                    "name": "Johannes Schmitt",
                    "email": "schmittjoh@gmail.com"
                }
            ],
            "description": "PHP Doctrine Lexer parser library that can be used in Top-Down, Recursive Descent Parsers.",
            "homepage": "https://www.doctrine-project.org/projects/lexer.html",
            "keywords": [
                "annotations",
                "docblock",
                "lexer",
                "parser",
                "php"
            ],
            "support": {
                "issues": "https://github.com/doctrine/lexer/issues",
                "source": "https://github.com/doctrine/lexer/tree/1.2.3"
            },
            "funding": [
                {
                    "url": "https://www.doctrine-project.org/sponsorship.html",
                    "type": "custom"
                },
                {
                    "url": "https://www.patreon.com/phpdoctrine",
                    "type": "patreon"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/doctrine%2Flexer",
                    "type": "tidelift"
                }
            ],
            "time": "2022-02-28T11:07:21+00:00"
        },
        {
            "name": "fakerphp/faker",
            "version": "v1.20.0",
            "source": {
                "type": "git",
                "url": "https://github.com/FakerPHP/Faker.git",
                "reference": "37f751c67a5372d4e26353bd9384bc03744ec77b"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/FakerPHP/Faker/zipball/37f751c67a5372d4e26353bd9384bc03744ec77b",
                "reference": "37f751c67a5372d4e26353bd9384bc03744ec77b",
                "shasum": ""
            },
            "require": {
                "php": "^7.1 || ^8.0",
                "psr/container": "^1.0 || ^2.0",
                "symfony/deprecation-contracts": "^2.2 || ^3.0"
            },
            "conflict": {
                "fzaninotto/faker": "*"
            },
            "require-dev": {
                "bamarni/composer-bin-plugin": "^1.4.1",
                "doctrine/persistence": "^1.3 || ^2.0",
                "ext-intl": "*",
                "symfony/phpunit-bridge": "^4.4 || ^5.2"
            },
            "suggest": {
                "doctrine/orm": "Required to use Faker\\ORM\\Doctrine",
                "ext-curl": "Required by Faker\\Provider\\Image to download images.",
                "ext-dom": "Required by Faker\\Provider\\HtmlLorem for generating random HTML.",
                "ext-iconv": "Required by Faker\\Provider\\ru_RU\\Text::realText() for generating real Russian text.",
                "ext-mbstring": "Required for multibyte Unicode string functionality."
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-main": "v1.20-dev"
                }
            },
            "autoload": {
                "psr-4": {
                    "Faker\\": "src/Faker/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "François Zaninotto"
                }
            ],
            "description": "Faker is a PHP library that generates fake data for you.",
            "keywords": [
                "data",
                "faker",
                "fixtures"
            ],
            "support": {
                "issues": "https://github.com/FakerPHP/Faker/issues",
                "source": "https://github.com/FakerPHP/Faker/tree/v1.20.0"
            },
            "time": "2022-07-20T13:12:54+00:00"
        },
        {
            "name": "friendsofphp/php-cs-fixer",
            "version": "v3.11.0",
            "source": {
                "type": "git",
                "url": "https://github.com/FriendsOfPHP/PHP-CS-Fixer.git",
                "reference": "7dcdea3f2f5f473464e835be9be55283ff8cfdc3"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/FriendsOfPHP/PHP-CS-Fixer/zipball/7dcdea3f2f5f473464e835be9be55283ff8cfdc3",
                "reference": "7dcdea3f2f5f473464e835be9be55283ff8cfdc3",
                "shasum": ""
            },
            "require": {
                "composer/semver": "^3.2",
                "composer/xdebug-handler": "^3.0.3",
                "doctrine/annotations": "^1.13",
                "ext-json": "*",
                "ext-tokenizer": "*",
                "php": "^7.4 || ^8.0",
                "sebastian/diff": "^4.0",
                "symfony/console": "^5.4 || ^6.0",
                "symfony/event-dispatcher": "^5.4 || ^6.0",
                "symfony/filesystem": "^5.4 || ^6.0",
                "symfony/finder": "^5.4 || ^6.0",
                "symfony/options-resolver": "^5.4 || ^6.0",
                "symfony/polyfill-mbstring": "^1.23",
                "symfony/polyfill-php80": "^1.25",
                "symfony/polyfill-php81": "^1.25",
                "symfony/process": "^5.4 || ^6.0",
                "symfony/stopwatch": "^5.4 || ^6.0"
            },
            "require-dev": {
                "justinrainbow/json-schema": "^5.2",
                "keradus/cli-executor": "^1.5",
                "mikey179/vfsstream": "^1.6.10",
                "php-coveralls/php-coveralls": "^2.5.2",
                "php-cs-fixer/accessible-object": "^1.1",
                "php-cs-fixer/phpunit-constraint-isidenticalstring": "^1.2",
                "php-cs-fixer/phpunit-constraint-xmlmatchesxsd": "^1.2.1",
                "phpspec/prophecy": "^1.15",
                "phpspec/prophecy-phpunit": "^2.0",
                "phpunit/phpunit": "^9.5",
                "phpunitgoodpractices/polyfill": "^1.5",
                "phpunitgoodpractices/traits": "^1.9.1",
                "symfony/phpunit-bridge": "^6.0",
                "symfony/yaml": "^5.4 || ^6.0"
            },
            "suggest": {
                "ext-dom": "For handling output formats in XML",
                "ext-mbstring": "For handling non-UTF8 characters."
            },
            "bin": [
                "php-cs-fixer"
            ],
            "type": "application",
            "autoload": {
                "psr-4": {
                    "PhpCsFixer\\": "src/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Fabien Potencier",
                    "email": "fabien@symfony.com"
                },
                {
                    "name": "Dariusz Rumiński",
                    "email": "dariusz.ruminski@gmail.com"
                }
            ],
            "description": "A tool to automatically fix PHP code style",
            "support": {
                "issues": "https://github.com/FriendsOfPHP/PHP-CS-Fixer/issues",
                "source": "https://github.com/FriendsOfPHP/PHP-CS-Fixer/tree/v3.11.0"
            },
            "funding": [
                {
                    "url": "https://github.com/keradus",
                    "type": "github"
                }
            ],
            "time": "2022-09-01T18:24:51+00:00"
        },
        {
            "name": "mikey179/vfsstream",
            "version": "v1.6.11",
            "source": {
                "type": "git",
                "url": "https://github.com/bovigo/vfsStream.git",
                "reference": "17d16a85e6c26ce1f3e2fa9ceeacdc2855db1e9f"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/bovigo/vfsStream/zipball/17d16a85e6c26ce1f3e2fa9ceeacdc2855db1e9f",
                "reference": "17d16a85e6c26ce1f3e2fa9ceeacdc2855db1e9f",
                "shasum": ""
            },
            "require": {
                "php": ">=5.3.0"
            },
            "require-dev": {
                "phpunit/phpunit": "^4.5|^5.0"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "1.6.x-dev"
                }
            },
            "autoload": {
                "psr-0": {
                    "org\\bovigo\\vfs\\": "src/main/php"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Frank Kleine",
                    "homepage": "http://frankkleine.de/",
                    "role": "Developer"
                }
            ],
            "description": "Virtual file system to mock the real file system in unit tests.",
            "homepage": "http://vfs.bovigo.org/",
            "support": {
                "issues": "https://github.com/bovigo/vfsStream/issues",
                "source": "https://github.com/bovigo/vfsStream/tree/master",
                "wiki": "https://github.com/bovigo/vfsStream/wiki"
            },
            "time": "2022-02-23T02:02:42+00:00"
        },
        {
            "name": "myclabs/deep-copy",
            "version": "1.11.0",
            "source": {
                "type": "git",
                "url": "https://github.com/myclabs/DeepCopy.git",
                "reference": "14daed4296fae74d9e3201d2c4925d1acb7aa614"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/myclabs/DeepCopy/zipball/14daed4296fae74d9e3201d2c4925d1acb7aa614",
                "reference": "14daed4296fae74d9e3201d2c4925d1acb7aa614",
                "shasum": ""
            },
            "require": {
                "php": "^7.1 || ^8.0"
            },
            "conflict": {
                "doctrine/collections": "<1.6.8",
                "doctrine/common": "<2.13.3 || >=3,<3.2.2"
            },
            "require-dev": {
                "doctrine/collections": "^1.6.8",
                "doctrine/common": "^2.13.3 || ^3.2.2",
                "phpunit/phpunit": "^7.5.20 || ^8.5.23 || ^9.5.13"
            },
            "type": "library",
            "autoload": {
                "files": [
                    "src/DeepCopy/deep_copy.php"
                ],
                "psr-4": {
                    "DeepCopy\\": "src/DeepCopy/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "description": "Create deep copies (clones) of your objects",
            "keywords": [
                "clone",
                "copy",
                "duplicate",
                "object",
                "object graph"
            ],
            "support": {
                "issues": "https://github.com/myclabs/DeepCopy/issues",
                "source": "https://github.com/myclabs/DeepCopy/tree/1.11.0"
            },
            "funding": [
                {
                    "url": "https://tidelift.com/funding/github/packagist/myclabs/deep-copy",
                    "type": "tidelift"
                }
            ],
            "time": "2022-03-03T13:19:32+00:00"
        },
        {
            "name": "nexusphp/cs-config",
            "version": "v3.6.0",
            "source": {
                "type": "git",
                "url": "https://github.com/NexusPHP/cs-config.git",
                "reference": "59546a38b02a00d8bdc415a1ae5336f034b05270"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/NexusPHP/cs-config/zipball/59546a38b02a00d8bdc415a1ae5336f034b05270",
                "reference": "59546a38b02a00d8bdc415a1ae5336f034b05270",
                "shasum": ""
            },
            "require": {
                "ext-tokenizer": "*",
                "friendsofphp/php-cs-fixer": "^3.11",
                "php": "^7.4 || ^8.0"
            },
            "conflict": {
                "liaison/cs-config": "*"
            },
            "require-dev": {
                "nexusphp/tachycardia": "^1.3",
                "phpstan/phpstan": "^1.8",
                "phpunit/phpunit": "^9.5"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-develop": "3.x-dev"
                }
            },
            "autoload": {
                "psr-4": {
                    "Nexus\\CsConfig\\": "src/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "John Paul E. Balandan, CPA",
                    "email": "paulbalandan@gmail.com"
                }
            ],
            "description": "A factory for custom rulesets for PHP CS Fixer.",
            "support": {
                "issues": "https://github.com/NexusPHP/cs-config/issues",
                "slack": "https://nexusphp.slack.com",
                "source": "https://github.com/NexusPHP/cs-config.git"
            },
            "funding": [
                {
                    "url": "https://www.paypal.me/paulbalandan",
                    "type": "custom"
                }
            ],
            "time": "2022-09-02T03:01:27+00:00"
        },
        {
            "name": "nikic/php-parser",
            "version": "v4.15.1",
            "source": {
                "type": "git",
                "url": "https://github.com/nikic/PHP-Parser.git",
                "reference": "0ef6c55a3f47f89d7a374e6f835197a0b5fcf900"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/nikic/PHP-Parser/zipball/0ef6c55a3f47f89d7a374e6f835197a0b5fcf900",
                "reference": "0ef6c55a3f47f89d7a374e6f835197a0b5fcf900",
                "shasum": ""
            },
            "require": {
                "ext-tokenizer": "*",
                "php": ">=7.0"
            },
            "require-dev": {
                "ircmaxell/php-yacc": "^0.0.7",
                "phpunit/phpunit": "^6.5 || ^7.0 || ^8.0 || ^9.0"
            },
            "bin": [
                "bin/php-parse"
            ],
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "4.9-dev"
                }
            },
            "autoload": {
                "psr-4": {
                    "PhpParser\\": "lib/PhpParser"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Nikita Popov"
                }
            ],
            "description": "A PHP parser written in PHP",
            "keywords": [
                "parser",
                "php"
            ],
            "support": {
                "issues": "https://github.com/nikic/PHP-Parser/issues",
                "source": "https://github.com/nikic/PHP-Parser/tree/v4.15.1"
            },
            "time": "2022-09-04T07:30:47+00:00"
        },
        {
            "name": "phar-io/manifest",
            "version": "2.0.3",
            "source": {
                "type": "git",
                "url": "https://github.com/phar-io/manifest.git",
                "reference": "97803eca37d319dfa7826cc2437fc020857acb53"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/phar-io/manifest/zipball/97803eca37d319dfa7826cc2437fc020857acb53",
                "reference": "97803eca37d319dfa7826cc2437fc020857acb53",
                "shasum": ""
            },
            "require": {
                "ext-dom": "*",
                "ext-phar": "*",
                "ext-xmlwriter": "*",
                "phar-io/version": "^3.0.1",
                "php": "^7.2 || ^8.0"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "2.0.x-dev"
                }
            },
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Arne Blankerts",
                    "email": "arne@blankerts.de",
                    "role": "Developer"
                },
                {
                    "name": "Sebastian Heuer",
                    "email": "sebastian@phpeople.de",
                    "role": "Developer"
                },
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de",
                    "role": "Developer"
                }
            ],
            "description": "Component for reading phar.io manifest information from a PHP Archive (PHAR)",
            "support": {
                "issues": "https://github.com/phar-io/manifest/issues",
                "source": "https://github.com/phar-io/manifest/tree/2.0.3"
            },
            "time": "2021-07-20T11:28:43+00:00"
        },
        {
            "name": "phar-io/version",
            "version": "3.2.1",
            "source": {
                "type": "git",
                "url": "https://github.com/phar-io/version.git",
                "reference": "4f7fd7836c6f332bb2933569e566a0d6c4cbed74"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/phar-io/version/zipball/4f7fd7836c6f332bb2933569e566a0d6c4cbed74",
                "reference": "4f7fd7836c6f332bb2933569e566a0d6c4cbed74",
                "shasum": ""
            },
            "require": {
                "php": "^7.2 || ^8.0"
            },
            "type": "library",
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Arne Blankerts",
                    "email": "arne@blankerts.de",
                    "role": "Developer"
                },
                {
                    "name": "Sebastian Heuer",
                    "email": "sebastian@phpeople.de",
                    "role": "Developer"
                },
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de",
                    "role": "Developer"
                }
            ],
            "description": "Library for handling version information and constraints",
            "support": {
                "issues": "https://github.com/phar-io/version/issues",
                "source": "https://github.com/phar-io/version/tree/3.2.1"
            },
            "time": "2022-02-21T01:04:05+00:00"
        },
        {
            "name": "phpunit/php-code-coverage",
            "version": "9.2.17",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/php-code-coverage.git",
                "reference": "aa94dc41e8661fe90c7316849907cba3007b10d8"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/php-code-coverage/zipball/aa94dc41e8661fe90c7316849907cba3007b10d8",
                "reference": "aa94dc41e8661fe90c7316849907cba3007b10d8",
                "shasum": ""
            },
            "require": {
                "ext-dom": "*",
                "ext-libxml": "*",
                "ext-xmlwriter": "*",
                "nikic/php-parser": "^4.14",
                "php": ">=7.3",
                "phpunit/php-file-iterator": "^3.0.3",
                "phpunit/php-text-template": "^2.0.2",
                "sebastian/code-unit-reverse-lookup": "^2.0.2",
                "sebastian/complexity": "^2.0",
                "sebastian/environment": "^5.1.2",
                "sebastian/lines-of-code": "^1.0.3",
                "sebastian/version": "^3.0.1",
                "theseer/tokenizer": "^1.2.0"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3"
            },
            "suggest": {
                "ext-pcov": "*",
                "ext-xdebug": "*"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "9.2-dev"
                }
            },
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de",
                    "role": "lead"
                }
            ],
            "description": "Library that provides collection, processing, and rendering functionality for PHP code coverage information.",
            "homepage": "https://github.com/sebastianbergmann/php-code-coverage",
            "keywords": [
                "coverage",
                "testing",
                "xunit"
            ],
            "support": {
                "issues": "https://github.com/sebastianbergmann/php-code-coverage/issues",
                "source": "https://github.com/sebastianbergmann/php-code-coverage/tree/9.2.17"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "time": "2022-08-30T12:24:04+00:00"
        },
        {
            "name": "phpunit/php-file-iterator",
            "version": "3.0.6",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/php-file-iterator.git",
                "reference": "cf1c2e7c203ac650e352f4cc675a7021e7d1b3cf"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/php-file-iterator/zipball/cf1c2e7c203ac650e352f4cc675a7021e7d1b3cf",
                "reference": "cf1c2e7c203ac650e352f4cc675a7021e7d1b3cf",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "3.0-dev"
                }
            },
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de",
                    "role": "lead"
                }
            ],
            "description": "FilterIterator implementation that filters files based on a list of suffixes.",
            "homepage": "https://github.com/sebastianbergmann/php-file-iterator/",
            "keywords": [
                "filesystem",
                "iterator"
            ],
            "support": {
                "issues": "https://github.com/sebastianbergmann/php-file-iterator/issues",
                "source": "https://github.com/sebastianbergmann/php-file-iterator/tree/3.0.6"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "time": "2021-12-02T12:48:52+00:00"
        },
        {
            "name": "phpunit/php-invoker",
            "version": "3.1.1",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/php-invoker.git",
                "reference": "5a10147d0aaf65b58940a0b72f71c9ac0423cc67"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/php-invoker/zipball/5a10147d0aaf65b58940a0b72f71c9ac0423cc67",
                "reference": "5a10147d0aaf65b58940a0b72f71c9ac0423cc67",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3"
            },
            "require-dev": {
                "ext-pcntl": "*",
                "phpunit/phpunit": "^9.3"
            },
            "suggest": {
                "ext-pcntl": "*"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "3.1-dev"
                }
            },
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de",
                    "role": "lead"
                }
            ],
            "description": "Invoke callables with a timeout",
            "homepage": "https://github.com/sebastianbergmann/php-invoker/",
            "keywords": [
                "process"
            ],
            "support": {
                "issues": "https://github.com/sebastianbergmann/php-invoker/issues",
                "source": "https://github.com/sebastianbergmann/php-invoker/tree/3.1.1"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "time": "2020-09-28T05:58:55+00:00"
        },
        {
            "name": "phpunit/php-text-template",
            "version": "2.0.4",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/php-text-template.git",
                "reference": "5da5f67fc95621df9ff4c4e5a84d6a8a2acf7c28"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/php-text-template/zipball/5da5f67fc95621df9ff4c4e5a84d6a8a2acf7c28",
                "reference": "5da5f67fc95621df9ff4c4e5a84d6a8a2acf7c28",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "2.0-dev"
                }
            },
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de",
                    "role": "lead"
                }
            ],
            "description": "Simple template engine.",
            "homepage": "https://github.com/sebastianbergmann/php-text-template/",
            "keywords": [
                "template"
            ],
            "support": {
                "issues": "https://github.com/sebastianbergmann/php-text-template/issues",
                "source": "https://github.com/sebastianbergmann/php-text-template/tree/2.0.4"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "time": "2020-10-26T05:33:50+00:00"
        },
        {
            "name": "phpunit/php-timer",
            "version": "5.0.3",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/php-timer.git",
                "reference": "5a63ce20ed1b5bf577850e2c4e87f4aa902afbd2"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/php-timer/zipball/5a63ce20ed1b5bf577850e2c4e87f4aa902afbd2",
                "reference": "5a63ce20ed1b5bf577850e2c4e87f4aa902afbd2",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "5.0-dev"
                }
            },
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de",
                    "role": "lead"
                }
            ],
            "description": "Utility class for timing",
            "homepage": "https://github.com/sebastianbergmann/php-timer/",
            "keywords": [
                "timer"
            ],
            "support": {
                "issues": "https://github.com/sebastianbergmann/php-timer/issues",
                "source": "https://github.com/sebastianbergmann/php-timer/tree/5.0.3"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "time": "2020-10-26T13:16:10+00:00"
        },
        {
            "name": "phpunit/phpunit",
            "version": "9.5.25",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/phpunit.git",
                "reference": "3e6f90ca7e3d02025b1d147bd8d4a89fd4ca8a1d"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/phpunit/zipball/3e6f90ca7e3d02025b1d147bd8d4a89fd4ca8a1d",
                "reference": "3e6f90ca7e3d02025b1d147bd8d4a89fd4ca8a1d",
                "shasum": ""
            },
            "require": {
                "doctrine/instantiator": "^1.3.1",
                "ext-dom": "*",
                "ext-json": "*",
                "ext-libxml": "*",
                "ext-mbstring": "*",
                "ext-xml": "*",
                "ext-xmlwriter": "*",
                "myclabs/deep-copy": "^1.10.1",
                "phar-io/manifest": "^2.0.3",
                "phar-io/version": "^3.0.2",
                "php": ">=7.3",
                "phpunit/php-code-coverage": "^9.2.13",
                "phpunit/php-file-iterator": "^3.0.5",
                "phpunit/php-invoker": "^3.1.1",
                "phpunit/php-text-template": "^2.0.3",
                "phpunit/php-timer": "^5.0.2",
                "sebastian/cli-parser": "^1.0.1",
                "sebastian/code-unit": "^1.0.6",
                "sebastian/comparator": "^4.0.8",
                "sebastian/diff": "^4.0.3",
                "sebastian/environment": "^5.1.3",
                "sebastian/exporter": "^4.0.5",
                "sebastian/global-state": "^5.0.1",
                "sebastian/object-enumerator": "^4.0.3",
                "sebastian/resource-operations": "^3.0.3",
                "sebastian/type": "^3.2",
                "sebastian/version": "^3.0.2"
            },
            "suggest": {
                "ext-soap": "*",
                "ext-xdebug": "*"
            },
            "bin": [
                "phpunit"
            ],
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "9.5-dev"
                }
            },
            "autoload": {
                "files": [
                    "src/Framework/Assert/Functions.php"
                ],
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de",
                    "role": "lead"
                }
            ],
            "description": "The PHP Unit Testing framework.",
            "homepage": "https://phpunit.de/",
            "keywords": [
                "phpunit",
                "testing",
                "xunit"
            ],
            "support": {
                "issues": "https://github.com/sebastianbergmann/phpunit/issues",
                "source": "https://github.com/sebastianbergmann/phpunit/tree/9.5.25"
            },
            "funding": [
                {
                    "url": "https://phpunit.de/sponsors.html",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/phpunit/phpunit",
                    "type": "tidelift"
                }
            ],
            "time": "2022-09-25T03:44:45+00:00"
        },
        {
            "name": "predis/predis",
            "version": "v2.0.2",
            "source": {
                "type": "git",
                "url": "https://github.com/predis/predis.git",
                "reference": "8b5fa928560b48a054fb1fd485fc65f2d8aa9e5c"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/predis/predis/zipball/8b5fa928560b48a054fb1fd485fc65f2d8aa9e5c",
                "reference": "8b5fa928560b48a054fb1fd485fc65f2d8aa9e5c",
                "shasum": ""
            },
            "require": {
                "php": "^7.2 || ^8.0"
            },
            "require-dev": {
                "phpunit/phpunit": "^8.0 || ~9.4.4"
            },
            "suggest": {
                "ext-curl": "Allows access to Webdis when paired with phpiredis",
                "ext-phpiredis": "Allows faster serialization and deserialization of the Redis protocol"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-main": "2.0-dev"
                }
            },
            "autoload": {
                "psr-4": {
                    "Predis\\": "src/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Daniele Alessandri",
                    "email": "suppakilla@gmail.com",
                    "homepage": "http://clorophilla.net",
                    "role": "Creator & Maintainer"
                },
                {
                    "name": "Till Krüss",
                    "homepage": "https://till.im",
                    "role": "Maintainer"
                }
            ],
            "description": "A flexible and feature-complete Redis client for PHP.",
            "homepage": "http://github.com/predis/predis",
            "keywords": [
                "nosql",
                "predis",
                "redis"
            ],
            "support": {
                "issues": "https://github.com/predis/predis/issues",
                "source": "https://github.com/predis/predis/tree/v2.0.2"
            },
            "funding": [
                {
                    "url": "https://github.com/sponsors/tillkruss",
                    "type": "github"
                }
            ],
            "time": "2022-09-06T14:34:14+00:00"
        },
        {
            "name": "psr/cache",
            "version": "3.0.0",
            "source": {
                "type": "git",
                "url": "https://github.com/php-fig/cache.git",
                "reference": "aa5030cfa5405eccfdcb1083ce040c2cb8d253bf"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/php-fig/cache/zipball/aa5030cfa5405eccfdcb1083ce040c2cb8d253bf",
                "reference": "aa5030cfa5405eccfdcb1083ce040c2cb8d253bf",
                "shasum": ""
            },
            "require": {
                "php": ">=8.0.0"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "1.0.x-dev"
                }
            },
            "autoload": {
                "psr-4": {
                    "Psr\\Cache\\": "src/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "PHP-FIG",
                    "homepage": "https://www.php-fig.org/"
                }
            ],
            "description": "Common interface for caching libraries",
            "keywords": [
                "cache",
                "psr",
                "psr-6"
            ],
            "support": {
                "source": "https://github.com/php-fig/cache/tree/3.0.0"
            },
            "time": "2021-02-03T23:26:27+00:00"
        },
        {
            "name": "psr/container",
            "version": "2.0.2",
            "source": {
                "type": "git",
                "url": "https://github.com/php-fig/container.git",
                "reference": "c71ecc56dfe541dbd90c5360474fbc405f8d5963"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/php-fig/container/zipball/c71ecc56dfe541dbd90c5360474fbc405f8d5963",
                "reference": "c71ecc56dfe541dbd90c5360474fbc405f8d5963",
                "shasum": ""
            },
            "require": {
                "php": ">=7.4.0"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "2.0.x-dev"
                }
            },
            "autoload": {
                "psr-4": {
                    "Psr\\Container\\": "src/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "PHP-FIG",
                    "homepage": "https://www.php-fig.org/"
                }
            ],
            "description": "Common Container Interface (PHP FIG PSR-11)",
            "homepage": "https://github.com/php-fig/container",
            "keywords": [
                "PSR-11",
                "container",
                "container-interface",
                "container-interop",
                "psr"
            ],
            "support": {
                "issues": "https://github.com/php-fig/container/issues",
                "source": "https://github.com/php-fig/container/tree/2.0.2"
            },
            "time": "2021-11-05T16:47:00+00:00"
        },
        {
            "name": "psr/event-dispatcher",
            "version": "1.0.0",
            "source": {
                "type": "git",
                "url": "https://github.com/php-fig/event-dispatcher.git",
                "reference": "dbefd12671e8a14ec7f180cab83036ed26714bb0"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/php-fig/event-dispatcher/zipball/dbefd12671e8a14ec7f180cab83036ed26714bb0",
                "reference": "dbefd12671e8a14ec7f180cab83036ed26714bb0",
                "shasum": ""
            },
            "require": {
                "php": ">=7.2.0"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "1.0.x-dev"
                }
            },
            "autoload": {
                "psr-4": {
                    "Psr\\EventDispatcher\\": "src/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "PHP-FIG",
                    "homepage": "http://www.php-fig.org/"
                }
            ],
            "description": "Standard interfaces for event handling.",
            "keywords": [
                "events",
                "psr",
                "psr-14"
            ],
            "support": {
                "issues": "https://github.com/php-fig/event-dispatcher/issues",
                "source": "https://github.com/php-fig/event-dispatcher/tree/1.0.0"
            },
            "time": "2019-01-08T18:20:26+00:00"
        },
        {
            "name": "sebastian/cli-parser",
            "version": "1.0.1",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/cli-parser.git",
                "reference": "442e7c7e687e42adc03470c7b668bc4b2402c0b2"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/cli-parser/zipball/442e7c7e687e42adc03470c7b668bc4b2402c0b2",
                "reference": "442e7c7e687e42adc03470c7b668bc4b2402c0b2",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "1.0-dev"
                }
            },
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de",
                    "role": "lead"
                }
            ],
            "description": "Library for parsing CLI options",
            "homepage": "https://github.com/sebastianbergmann/cli-parser",
            "support": {
                "issues": "https://github.com/sebastianbergmann/cli-parser/issues",
                "source": "https://github.com/sebastianbergmann/cli-parser/tree/1.0.1"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "time": "2020-09-28T06:08:49+00:00"
        },
        {
            "name": "sebastian/code-unit",
            "version": "1.0.8",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/code-unit.git",
                "reference": "1fc9f64c0927627ef78ba436c9b17d967e68e120"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/code-unit/zipball/1fc9f64c0927627ef78ba436c9b17d967e68e120",
                "reference": "1fc9f64c0927627ef78ba436c9b17d967e68e120",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "1.0-dev"
                }
            },
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de",
                    "role": "lead"
                }
            ],
            "description": "Collection of value objects that represent the PHP code units",
            "homepage": "https://github.com/sebastianbergmann/code-unit",
            "support": {
                "issues": "https://github.com/sebastianbergmann/code-unit/issues",
                "source": "https://github.com/sebastianbergmann/code-unit/tree/1.0.8"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "time": "2020-10-26T13:08:54+00:00"
        },
        {
            "name": "sebastian/code-unit-reverse-lookup",
            "version": "2.0.3",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/code-unit-reverse-lookup.git",
                "reference": "ac91f01ccec49fb77bdc6fd1e548bc70f7faa3e5"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/code-unit-reverse-lookup/zipball/ac91f01ccec49fb77bdc6fd1e548bc70f7faa3e5",
                "reference": "ac91f01ccec49fb77bdc6fd1e548bc70f7faa3e5",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "2.0-dev"
                }
            },
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de"
                }
            ],
            "description": "Looks up which function or method a line of code belongs to",
            "homepage": "https://github.com/sebastianbergmann/code-unit-reverse-lookup/",
            "support": {
                "issues": "https://github.com/sebastianbergmann/code-unit-reverse-lookup/issues",
                "source": "https://github.com/sebastianbergmann/code-unit-reverse-lookup/tree/2.0.3"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "time": "2020-09-28T05:30:19+00:00"
        },
        {
            "name": "sebastian/comparator",
            "version": "4.0.8",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/comparator.git",
                "reference": "fa0f136dd2334583309d32b62544682ee972b51a"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/comparator/zipball/fa0f136dd2334583309d32b62544682ee972b51a",
                "reference": "fa0f136dd2334583309d32b62544682ee972b51a",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3",
                "sebastian/diff": "^4.0",
                "sebastian/exporter": "^4.0"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "4.0-dev"
                }
            },
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de"
                },
                {
                    "name": "Jeff Welch",
                    "email": "whatthejeff@gmail.com"
                },
                {
                    "name": "Volker Dusch",
                    "email": "github@wallbash.com"
                },
                {
                    "name": "Bernhard Schussek",
                    "email": "bschussek@2bepublished.at"
                }
            ],
            "description": "Provides the functionality to compare PHP values for equality",
            "homepage": "https://github.com/sebastianbergmann/comparator",
            "keywords": [
                "comparator",
                "compare",
                "equality"
            ],
            "support": {
                "issues": "https://github.com/sebastianbergmann/comparator/issues",
                "source": "https://github.com/sebastianbergmann/comparator/tree/4.0.8"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "time": "2022-09-14T12:41:17+00:00"
        },
        {
            "name": "sebastian/complexity",
            "version": "2.0.2",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/complexity.git",
                "reference": "739b35e53379900cc9ac327b2147867b8b6efd88"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/complexity/zipball/739b35e53379900cc9ac327b2147867b8b6efd88",
                "reference": "739b35e53379900cc9ac327b2147867b8b6efd88",
                "shasum": ""
            },
            "require": {
                "nikic/php-parser": "^4.7",
                "php": ">=7.3"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "2.0-dev"
                }
            },
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de",
                    "role": "lead"
                }
            ],
            "description": "Library for calculating the complexity of PHP code units",
            "homepage": "https://github.com/sebastianbergmann/complexity",
            "support": {
                "issues": "https://github.com/sebastianbergmann/complexity/issues",
                "source": "https://github.com/sebastianbergmann/complexity/tree/2.0.2"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "time": "2020-10-26T15:52:27+00:00"
        },
        {
            "name": "sebastian/diff",
            "version": "4.0.4",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/diff.git",
                "reference": "3461e3fccc7cfdfc2720be910d3bd73c69be590d"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/diff/zipball/3461e3fccc7cfdfc2720be910d3bd73c69be590d",
                "reference": "3461e3fccc7cfdfc2720be910d3bd73c69be590d",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3",
                "symfony/process": "^4.2 || ^5"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "4.0-dev"
                }
            },
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de"
                },
                {
                    "name": "Kore Nordmann",
                    "email": "mail@kore-nordmann.de"
                }
            ],
            "description": "Diff implementation",
            "homepage": "https://github.com/sebastianbergmann/diff",
            "keywords": [
                "diff",
                "udiff",
                "unidiff",
                "unified diff"
            ],
            "support": {
                "issues": "https://github.com/sebastianbergmann/diff/issues",
                "source": "https://github.com/sebastianbergmann/diff/tree/4.0.4"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "time": "2020-10-26T13:10:38+00:00"
        },
        {
            "name": "sebastian/environment",
            "version": "5.1.4",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/environment.git",
                "reference": "1b5dff7bb151a4db11d49d90e5408e4e938270f7"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/environment/zipball/1b5dff7bb151a4db11d49d90e5408e4e938270f7",
                "reference": "1b5dff7bb151a4db11d49d90e5408e4e938270f7",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3"
            },
            "suggest": {
                "ext-posix": "*"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "5.1-dev"
                }
            },
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de"
                }
            ],
            "description": "Provides functionality to handle HHVM/PHP environments",
            "homepage": "http://www.github.com/sebastianbergmann/environment",
            "keywords": [
                "Xdebug",
                "environment",
                "hhvm"
            ],
            "support": {
                "issues": "https://github.com/sebastianbergmann/environment/issues",
                "source": "https://github.com/sebastianbergmann/environment/tree/5.1.4"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "time": "2022-04-03T09:37:03+00:00"
        },
        {
            "name": "sebastian/exporter",
            "version": "4.0.5",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/exporter.git",
                "reference": "ac230ed27f0f98f597c8a2b6eb7ac563af5e5b9d"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/exporter/zipball/ac230ed27f0f98f597c8a2b6eb7ac563af5e5b9d",
                "reference": "ac230ed27f0f98f597c8a2b6eb7ac563af5e5b9d",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3",
                "sebastian/recursion-context": "^4.0"
            },
            "require-dev": {
                "ext-mbstring": "*",
                "phpunit/phpunit": "^9.3"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "4.0-dev"
                }
            },
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de"
                },
                {
                    "name": "Jeff Welch",
                    "email": "whatthejeff@gmail.com"
                },
                {
                    "name": "Volker Dusch",
                    "email": "github@wallbash.com"
                },
                {
                    "name": "Adam Harvey",
                    "email": "aharvey@php.net"
                },
                {
                    "name": "Bernhard Schussek",
                    "email": "bschussek@gmail.com"
                }
            ],
            "description": "Provides the functionality to export PHP variables for visualization",
            "homepage": "https://www.github.com/sebastianbergmann/exporter",
            "keywords": [
                "export",
                "exporter"
            ],
            "support": {
                "issues": "https://github.com/sebastianbergmann/exporter/issues",
                "source": "https://github.com/sebastianbergmann/exporter/tree/4.0.5"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "time": "2022-09-14T06:03:37+00:00"
        },
        {
            "name": "sebastian/global-state",
            "version": "5.0.5",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/global-state.git",
                "reference": "0ca8db5a5fc9c8646244e629625ac486fa286bf2"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/global-state/zipball/0ca8db5a5fc9c8646244e629625ac486fa286bf2",
                "reference": "0ca8db5a5fc9c8646244e629625ac486fa286bf2",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3",
                "sebastian/object-reflector": "^2.0",
                "sebastian/recursion-context": "^4.0"
            },
            "require-dev": {
                "ext-dom": "*",
                "phpunit/phpunit": "^9.3"
            },
            "suggest": {
                "ext-uopz": "*"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "5.0-dev"
                }
            },
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de"
                }
            ],
            "description": "Snapshotting of global state",
            "homepage": "http://www.github.com/sebastianbergmann/global-state",
            "keywords": [
                "global state"
            ],
            "support": {
                "issues": "https://github.com/sebastianbergmann/global-state/issues",
                "source": "https://github.com/sebastianbergmann/global-state/tree/5.0.5"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "time": "2022-02-14T08:28:10+00:00"
        },
        {
            "name": "sebastian/lines-of-code",
            "version": "1.0.3",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/lines-of-code.git",
                "reference": "c1c2e997aa3146983ed888ad08b15470a2e22ecc"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/lines-of-code/zipball/c1c2e997aa3146983ed888ad08b15470a2e22ecc",
                "reference": "c1c2e997aa3146983ed888ad08b15470a2e22ecc",
                "shasum": ""
            },
            "require": {
                "nikic/php-parser": "^4.6",
                "php": ">=7.3"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "1.0-dev"
                }
            },
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de",
                    "role": "lead"
                }
            ],
            "description": "Library for counting the lines of code in PHP source code",
            "homepage": "https://github.com/sebastianbergmann/lines-of-code",
            "support": {
                "issues": "https://github.com/sebastianbergmann/lines-of-code/issues",
                "source": "https://github.com/sebastianbergmann/lines-of-code/tree/1.0.3"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "time": "2020-11-28T06:42:11+00:00"
        },
        {
            "name": "sebastian/object-enumerator",
            "version": "4.0.4",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/object-enumerator.git",
                "reference": "5c9eeac41b290a3712d88851518825ad78f45c71"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/object-enumerator/zipball/5c9eeac41b290a3712d88851518825ad78f45c71",
                "reference": "5c9eeac41b290a3712d88851518825ad78f45c71",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3",
                "sebastian/object-reflector": "^2.0",
                "sebastian/recursion-context": "^4.0"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "4.0-dev"
                }
            },
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de"
                }
            ],
            "description": "Traverses array structures and object graphs to enumerate all referenced objects",
            "homepage": "https://github.com/sebastianbergmann/object-enumerator/",
            "support": {
                "issues": "https://github.com/sebastianbergmann/object-enumerator/issues",
                "source": "https://github.com/sebastianbergmann/object-enumerator/tree/4.0.4"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "time": "2020-10-26T13:12:34+00:00"
        },
        {
            "name": "sebastian/object-reflector",
            "version": "2.0.4",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/object-reflector.git",
                "reference": "b4f479ebdbf63ac605d183ece17d8d7fe49c15c7"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/object-reflector/zipball/b4f479ebdbf63ac605d183ece17d8d7fe49c15c7",
                "reference": "b4f479ebdbf63ac605d183ece17d8d7fe49c15c7",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "2.0-dev"
                }
            },
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de"
                }
            ],
            "description": "Allows reflection of object attributes, including inherited and non-public ones",
            "homepage": "https://github.com/sebastianbergmann/object-reflector/",
            "support": {
                "issues": "https://github.com/sebastianbergmann/object-reflector/issues",
                "source": "https://github.com/sebastianbergmann/object-reflector/tree/2.0.4"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "time": "2020-10-26T13:14:26+00:00"
        },
        {
            "name": "sebastian/recursion-context",
            "version": "4.0.4",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/recursion-context.git",
                "reference": "cd9d8cf3c5804de4341c283ed787f099f5506172"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/recursion-context/zipball/cd9d8cf3c5804de4341c283ed787f099f5506172",
                "reference": "cd9d8cf3c5804de4341c283ed787f099f5506172",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "4.0-dev"
                }
            },
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de"
                },
                {
                    "name": "Jeff Welch",
                    "email": "whatthejeff@gmail.com"
                },
                {
                    "name": "Adam Harvey",
                    "email": "aharvey@php.net"
                }
            ],
            "description": "Provides functionality to recursively process PHP variables",
            "homepage": "http://www.github.com/sebastianbergmann/recursion-context",
            "support": {
                "issues": "https://github.com/sebastianbergmann/recursion-context/issues",
                "source": "https://github.com/sebastianbergmann/recursion-context/tree/4.0.4"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "time": "2020-10-26T13:17:30+00:00"
        },
        {
            "name": "sebastian/resource-operations",
            "version": "3.0.3",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/resource-operations.git",
                "reference": "0f4443cb3a1d92ce809899753bc0d5d5a8dd19a8"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/resource-operations/zipball/0f4443cb3a1d92ce809899753bc0d5d5a8dd19a8",
                "reference": "0f4443cb3a1d92ce809899753bc0d5d5a8dd19a8",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.0"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "3.0-dev"
                }
            },
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de"
                }
            ],
            "description": "Provides a list of PHP built-in functions that operate on resources",
            "homepage": "https://www.github.com/sebastianbergmann/resource-operations",
            "support": {
                "issues": "https://github.com/sebastianbergmann/resource-operations/issues",
                "source": "https://github.com/sebastianbergmann/resource-operations/tree/3.0.3"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "time": "2020-09-28T06:45:17+00:00"
        },
        {
            "name": "sebastian/type",
            "version": "3.2.0",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/type.git",
                "reference": "fb3fe09c5f0bae6bc27ef3ce933a1e0ed9464b6e"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/type/zipball/fb3fe09c5f0bae6bc27ef3ce933a1e0ed9464b6e",
                "reference": "fb3fe09c5f0bae6bc27ef3ce933a1e0ed9464b6e",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.5"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "3.2-dev"
                }
            },
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de",
                    "role": "lead"
                }
            ],
            "description": "Collection of value objects that represent the types of the PHP type system",
            "homepage": "https://github.com/sebastianbergmann/type",
            "support": {
                "issues": "https://github.com/sebastianbergmann/type/issues",
                "source": "https://github.com/sebastianbergmann/type/tree/3.2.0"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "time": "2022-09-12T14:47:03+00:00"
        },
        {
            "name": "sebastian/version",
            "version": "3.0.2",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/version.git",
                "reference": "c6c1022351a901512170118436c764e473f6de8c"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/version/zipball/c6c1022351a901512170118436c764e473f6de8c",
                "reference": "c6c1022351a901512170118436c764e473f6de8c",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "3.0-dev"
                }
            },
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de",
                    "role": "lead"
                }
            ],
            "description": "Library that helps with managing the version number of Git-hosted PHP projects",
            "homepage": "https://github.com/sebastianbergmann/version",
            "support": {
                "issues": "https://github.com/sebastianbergmann/version/issues",
                "source": "https://github.com/sebastianbergmann/version/tree/3.0.2"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "time": "2020-09-28T06:39:44+00:00"
        },
        {
            "name": "symfony/console",
            "version": "v6.0.12",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/console.git",
                "reference": "c5c2e313aa682530167c25077d6bdff36346251e"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/console/zipball/c5c2e313aa682530167c25077d6bdff36346251e",
                "reference": "c5c2e313aa682530167c25077d6bdff36346251e",
                "shasum": ""
            },
            "require": {
                "php": ">=8.0.2",
                "symfony/polyfill-mbstring": "~1.0",
                "symfony/service-contracts": "^1.1|^2|^3",
                "symfony/string": "^5.4|^6.0"
            },
            "conflict": {
                "symfony/dependency-injection": "<5.4",
                "symfony/dotenv": "<5.4",
                "symfony/event-dispatcher": "<5.4",
                "symfony/lock": "<5.4",
                "symfony/process": "<5.4"
            },
            "provide": {
                "psr/log-implementation": "1.0|2.0|3.0"
            },
            "require-dev": {
                "psr/log": "^1|^2|^3",
                "symfony/config": "^5.4|^6.0",
                "symfony/dependency-injection": "^5.4|^6.0",
                "symfony/event-dispatcher": "^5.4|^6.0",
                "symfony/lock": "^5.4|^6.0",
                "symfony/process": "^5.4|^6.0",
                "symfony/var-dumper": "^5.4|^6.0"
            },
            "suggest": {
                "psr/log": "For using the console logger",
                "symfony/event-dispatcher": "",
                "symfony/lock": "",
                "symfony/process": ""
            },
            "type": "library",
            "autoload": {
                "psr-4": {
                    "Symfony\\Component\\Console\\": ""
                },
                "exclude-from-classmap": [
                    "/Tests/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Fabien Potencier",
                    "email": "fabien@symfony.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Eases the creation of beautiful and testable command line interfaces",
            "homepage": "https://symfony.com",
            "keywords": [
                "cli",
                "command line",
                "console",
                "terminal"
            ],
            "support": {
                "source": "https://github.com/symfony/console/tree/v6.0.12"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "time": "2022-08-23T20:52:30+00:00"
        },
        {
            "name": "symfony/deprecation-contracts",
            "version": "v3.0.2",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/deprecation-contracts.git",
                "reference": "26954b3d62a6c5fd0ea8a2a00c0353a14978d05c"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/deprecation-contracts/zipball/26954b3d62a6c5fd0ea8a2a00c0353a14978d05c",
                "reference": "26954b3d62a6c5fd0ea8a2a00c0353a14978d05c",
                "shasum": ""
            },
            "require": {
                "php": ">=8.0.2"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-main": "3.0-dev"
                },
                "thanks": {
                    "name": "symfony/contracts",
                    "url": "https://github.com/symfony/contracts"
                }
            },
            "autoload": {
                "files": [
                    "function.php"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Nicolas Grekas",
                    "email": "p@tchwork.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "A generic function and convention to trigger deprecation notices",
            "homepage": "https://symfony.com",
            "support": {
                "source": "https://github.com/symfony/deprecation-contracts/tree/v3.0.2"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "time": "2022-01-02T09:55:41+00:00"
        },
        {
            "name": "symfony/event-dispatcher",
            "version": "v6.0.9",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/event-dispatcher.git",
                "reference": "5c85b58422865d42c6eb46f7693339056db098a8"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/event-dispatcher/zipball/5c85b58422865d42c6eb46f7693339056db098a8",
                "reference": "5c85b58422865d42c6eb46f7693339056db098a8",
                "shasum": ""
            },
            "require": {
                "php": ">=8.0.2",
                "symfony/event-dispatcher-contracts": "^2|^3"
            },
            "conflict": {
                "symfony/dependency-injection": "<5.4"
            },
            "provide": {
                "psr/event-dispatcher-implementation": "1.0",
                "symfony/event-dispatcher-implementation": "2.0|3.0"
            },
            "require-dev": {
                "psr/log": "^1|^2|^3",
                "symfony/config": "^5.4|^6.0",
                "symfony/dependency-injection": "^5.4|^6.0",
                "symfony/error-handler": "^5.4|^6.0",
                "symfony/expression-language": "^5.4|^6.0",
                "symfony/http-foundation": "^5.4|^6.0",
                "symfony/service-contracts": "^1.1|^2|^3",
                "symfony/stopwatch": "^5.4|^6.0"
            },
            "suggest": {
                "symfony/dependency-injection": "",
                "symfony/http-kernel": ""
            },
            "type": "library",
            "autoload": {
                "psr-4": {
                    "Symfony\\Component\\EventDispatcher\\": ""
                },
                "exclude-from-classmap": [
                    "/Tests/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Fabien Potencier",
                    "email": "fabien@symfony.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Provides tools that allow your application components to communicate with each other by dispatching events and listening to them",
            "homepage": "https://symfony.com",
            "support": {
                "source": "https://github.com/symfony/event-dispatcher/tree/v6.0.9"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "time": "2022-05-05T16:45:52+00:00"
        },
        {
            "name": "symfony/event-dispatcher-contracts",
            "version": "v3.0.2",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/event-dispatcher-contracts.git",
                "reference": "7bc61cc2db649b4637d331240c5346dcc7708051"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/event-dispatcher-contracts/zipball/7bc61cc2db649b4637d331240c5346dcc7708051",
                "reference": "7bc61cc2db649b4637d331240c5346dcc7708051",
                "shasum": ""
            },
            "require": {
                "php": ">=8.0.2",
                "psr/event-dispatcher": "^1"
            },
            "suggest": {
                "symfony/event-dispatcher-implementation": ""
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-main": "3.0-dev"
                },
                "thanks": {
                    "name": "symfony/contracts",
                    "url": "https://github.com/symfony/contracts"
                }
            },
            "autoload": {
                "psr-4": {
                    "Symfony\\Contracts\\EventDispatcher\\": ""
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Nicolas Grekas",
                    "email": "p@tchwork.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Generic abstractions related to dispatching event",
            "homepage": "https://symfony.com",
            "keywords": [
                "abstractions",
                "contracts",
                "decoupling",
                "interfaces",
                "interoperability",
                "standards"
            ],
            "support": {
                "source": "https://github.com/symfony/event-dispatcher-contracts/tree/v3.0.2"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "time": "2022-01-02T09:55:41+00:00"
        },
        {
            "name": "symfony/filesystem",
            "version": "v6.0.12",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/filesystem.git",
                "reference": "a36b782dc19dce3ab7e47d4b92b13cefb3511da3"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/filesystem/zipball/a36b782dc19dce3ab7e47d4b92b13cefb3511da3",
                "reference": "a36b782dc19dce3ab7e47d4b92b13cefb3511da3",
                "shasum": ""
            },
            "require": {
                "php": ">=8.0.2",
                "symfony/polyfill-ctype": "~1.8",
                "symfony/polyfill-mbstring": "~1.8"
            },
            "type": "library",
            "autoload": {
                "psr-4": {
                    "Symfony\\Component\\Filesystem\\": ""
                },
                "exclude-from-classmap": [
                    "/Tests/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Fabien Potencier",
                    "email": "fabien@symfony.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Provides basic utilities for the filesystem",
            "homepage": "https://symfony.com",
            "support": {
                "source": "https://github.com/symfony/filesystem/tree/v6.0.12"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "time": "2022-08-02T16:01:06+00:00"
        },
        {
            "name": "symfony/finder",
            "version": "v6.0.11",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/finder.git",
                "reference": "09cb683ba5720385ea6966e5e06be2a34f2568b1"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/finder/zipball/09cb683ba5720385ea6966e5e06be2a34f2568b1",
                "reference": "09cb683ba5720385ea6966e5e06be2a34f2568b1",
                "shasum": ""
            },
            "require": {
                "php": ">=8.0.2"
            },
            "type": "library",
            "autoload": {
                "psr-4": {
                    "Symfony\\Component\\Finder\\": ""
                },
                "exclude-from-classmap": [
                    "/Tests/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Fabien Potencier",
                    "email": "fabien@symfony.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Finds files and directories via an intuitive fluent interface",
            "homepage": "https://symfony.com",
            "support": {
                "source": "https://github.com/symfony/finder/tree/v6.0.11"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "time": "2022-07-29T07:39:48+00:00"
        },
        {
            "name": "symfony/options-resolver",
            "version": "v6.0.3",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/options-resolver.git",
                "reference": "51f7006670febe4cbcbae177cbffe93ff833250d"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/options-resolver/zipball/51f7006670febe4cbcbae177cbffe93ff833250d",
                "reference": "51f7006670febe4cbcbae177cbffe93ff833250d",
                "shasum": ""
            },
            "require": {
                "php": ">=8.0.2",
                "symfony/deprecation-contracts": "^2.1|^3"
            },
            "type": "library",
            "autoload": {
                "psr-4": {
                    "Symfony\\Component\\OptionsResolver\\": ""
                },
                "exclude-from-classmap": [
                    "/Tests/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Fabien Potencier",
                    "email": "fabien@symfony.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Provides an improved replacement for the array_replace PHP function",
            "homepage": "https://symfony.com",
            "keywords": [
                "config",
                "configuration",
                "options"
            ],
            "support": {
                "source": "https://github.com/symfony/options-resolver/tree/v6.0.3"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "time": "2022-01-02T09:55:41+00:00"
        },
        {
            "name": "symfony/polyfill-ctype",
            "version": "v1.26.0",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/polyfill-ctype.git",
                "reference": "6fd1b9a79f6e3cf65f9e679b23af304cd9e010d4"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/polyfill-ctype/zipball/6fd1b9a79f6e3cf65f9e679b23af304cd9e010d4",
                "reference": "6fd1b9a79f6e3cf65f9e679b23af304cd9e010d4",
                "shasum": ""
            },
            "require": {
                "php": ">=7.1"
            },
            "provide": {
                "ext-ctype": "*"
            },
            "suggest": {
                "ext-ctype": "For best performance"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-main": "1.26-dev"
                },
                "thanks": {
                    "name": "symfony/polyfill",
                    "url": "https://github.com/symfony/polyfill"
                }
            },
            "autoload": {
                "files": [
                    "bootstrap.php"
                ],
                "psr-4": {
                    "Symfony\\Polyfill\\Ctype\\": ""
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Gert de Pagter",
                    "email": "BackEndTea@gmail.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Symfony polyfill for ctype functions",
            "homepage": "https://symfony.com",
            "keywords": [
                "compatibility",
                "ctype",
                "polyfill",
                "portable"
            ],
            "support": {
                "source": "https://github.com/symfony/polyfill-ctype/tree/v1.26.0"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "time": "2022-05-24T11:49:31+00:00"
        },
        {
            "name": "symfony/polyfill-intl-grapheme",
            "version": "v1.26.0",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/polyfill-intl-grapheme.git",
                "reference": "433d05519ce6990bf3530fba6957499d327395c2"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/polyfill-intl-grapheme/zipball/433d05519ce6990bf3530fba6957499d327395c2",
                "reference": "433d05519ce6990bf3530fba6957499d327395c2",
                "shasum": ""
            },
            "require": {
                "php": ">=7.1"
            },
            "suggest": {
                "ext-intl": "For best performance"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-main": "1.26-dev"
                },
                "thanks": {
                    "name": "symfony/polyfill",
                    "url": "https://github.com/symfony/polyfill"
                }
            },
            "autoload": {
                "files": [
                    "bootstrap.php"
                ],
                "psr-4": {
                    "Symfony\\Polyfill\\Intl\\Grapheme\\": ""
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Nicolas Grekas",
                    "email": "p@tchwork.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Symfony polyfill for intl's grapheme_* functions",
            "homepage": "https://symfony.com",
            "keywords": [
                "compatibility",
                "grapheme",
                "intl",
                "polyfill",
                "portable",
                "shim"
            ],
            "support": {
                "source": "https://github.com/symfony/polyfill-intl-grapheme/tree/v1.26.0"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "time": "2022-05-24T11:49:31+00:00"
        },
        {
            "name": "symfony/polyfill-intl-normalizer",
            "version": "v1.26.0",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/polyfill-intl-normalizer.git",
                "reference": "219aa369ceff116e673852dce47c3a41794c14bd"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/polyfill-intl-normalizer/zipball/219aa369ceff116e673852dce47c3a41794c14bd",
                "reference": "219aa369ceff116e673852dce47c3a41794c14bd",
                "shasum": ""
            },
            "require": {
                "php": ">=7.1"
            },
            "suggest": {
                "ext-intl": "For best performance"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-main": "1.26-dev"
                },
                "thanks": {
                    "name": "symfony/polyfill",
                    "url": "https://github.com/symfony/polyfill"
                }
            },
            "autoload": {
                "files": [
                    "bootstrap.php"
                ],
                "psr-4": {
                    "Symfony\\Polyfill\\Intl\\Normalizer\\": ""
                },
                "classmap": [
                    "Resources/stubs"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Nicolas Grekas",
                    "email": "p@tchwork.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Symfony polyfill for intl's Normalizer class and related functions",
            "homepage": "https://symfony.com",
            "keywords": [
                "compatibility",
                "intl",
                "normalizer",
                "polyfill",
                "portable",
                "shim"
            ],
            "support": {
                "source": "https://github.com/symfony/polyfill-intl-normalizer/tree/v1.26.0"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "time": "2022-05-24T11:49:31+00:00"
        },
        {
            "name": "symfony/polyfill-mbstring",
            "version": "v1.26.0",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/polyfill-mbstring.git",
                "reference": "9344f9cb97f3b19424af1a21a3b0e75b0a7d8d7e"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/polyfill-mbstring/zipball/9344f9cb97f3b19424af1a21a3b0e75b0a7d8d7e",
                "reference": "9344f9cb97f3b19424af1a21a3b0e75b0a7d8d7e",
                "shasum": ""
            },
            "require": {
                "php": ">=7.1"
            },
            "provide": {
                "ext-mbstring": "*"
            },
            "suggest": {
                "ext-mbstring": "For best performance"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-main": "1.26-dev"
                },
                "thanks": {
                    "name": "symfony/polyfill",
                    "url": "https://github.com/symfony/polyfill"
                }
            },
            "autoload": {
                "files": [
                    "bootstrap.php"
                ],
                "psr-4": {
                    "Symfony\\Polyfill\\Mbstring\\": ""
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Nicolas Grekas",
                    "email": "p@tchwork.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Symfony polyfill for the Mbstring extension",
            "homepage": "https://symfony.com",
            "keywords": [
                "compatibility",
                "mbstring",
                "polyfill",
                "portable",
                "shim"
            ],
            "support": {
                "source": "https://github.com/symfony/polyfill-mbstring/tree/v1.26.0"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "time": "2022-05-24T11:49:31+00:00"
        },
        {
            "name": "symfony/polyfill-php80",
            "version": "v1.26.0",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/polyfill-php80.git",
                "reference": "cfa0ae98841b9e461207c13ab093d76b0fa7bace"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/polyfill-php80/zipball/cfa0ae98841b9e461207c13ab093d76b0fa7bace",
                "reference": "cfa0ae98841b9e461207c13ab093d76b0fa7bace",
                "shasum": ""
            },
            "require": {
                "php": ">=7.1"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-main": "1.26-dev"
                },
                "thanks": {
                    "name": "symfony/polyfill",
                    "url": "https://github.com/symfony/polyfill"
                }
            },
            "autoload": {
                "files": [
                    "bootstrap.php"
                ],
                "psr-4": {
                    "Symfony\\Polyfill\\Php80\\": ""
                },
                "classmap": [
                    "Resources/stubs"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Ion Bazan",
                    "email": "ion.bazan@gmail.com"
                },
                {
                    "name": "Nicolas Grekas",
                    "email": "p@tchwork.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Symfony polyfill backporting some PHP 8.0+ features to lower PHP versions",
            "homepage": "https://symfony.com",
            "keywords": [
                "compatibility",
                "polyfill",
                "portable",
                "shim"
            ],
            "support": {
                "source": "https://github.com/symfony/polyfill-php80/tree/v1.26.0"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "time": "2022-05-10T07:21:04+00:00"
        },
        {
            "name": "symfony/polyfill-php81",
            "version": "v1.26.0",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/polyfill-php81.git",
                "reference": "13f6d1271c663dc5ae9fb843a8f16521db7687a1"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/polyfill-php81/zipball/13f6d1271c663dc5ae9fb843a8f16521db7687a1",
                "reference": "13f6d1271c663dc5ae9fb843a8f16521db7687a1",
                "shasum": ""
            },
            "require": {
                "php": ">=7.1"
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-main": "1.26-dev"
                },
                "thanks": {
                    "name": "symfony/polyfill",
                    "url": "https://github.com/symfony/polyfill"
                }
            },
            "autoload": {
                "files": [
                    "bootstrap.php"
                ],
                "psr-4": {
                    "Symfony\\Polyfill\\Php81\\": ""
                },
                "classmap": [
                    "Resources/stubs"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Nicolas Grekas",
                    "email": "p@tchwork.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Symfony polyfill backporting some PHP 8.1+ features to lower PHP versions",
            "homepage": "https://symfony.com",
            "keywords": [
                "compatibility",
                "polyfill",
                "portable",
                "shim"
            ],
            "support": {
                "source": "https://github.com/symfony/polyfill-php81/tree/v1.26.0"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "time": "2022-05-24T11:49:31+00:00"
        },
        {
            "name": "symfony/process",
            "version": "v6.0.11",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/process.git",
                "reference": "44270a08ccb664143dede554ff1c00aaa2247a43"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/process/zipball/44270a08ccb664143dede554ff1c00aaa2247a43",
                "reference": "44270a08ccb664143dede554ff1c00aaa2247a43",
                "shasum": ""
            },
            "require": {
                "php": ">=8.0.2"
            },
            "type": "library",
            "autoload": {
                "psr-4": {
                    "Symfony\\Component\\Process\\": ""
                },
                "exclude-from-classmap": [
                    "/Tests/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Fabien Potencier",
                    "email": "fabien@symfony.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Executes commands in sub-processes",
            "homepage": "https://symfony.com",
            "support": {
                "source": "https://github.com/symfony/process/tree/v6.0.11"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "time": "2022-06-27T17:10:44+00:00"
        },
        {
            "name": "symfony/service-contracts",
            "version": "v3.0.2",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/service-contracts.git",
                "reference": "d78d39c1599bd1188b8e26bb341da52c3c6d8a66"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/service-contracts/zipball/d78d39c1599bd1188b8e26bb341da52c3c6d8a66",
                "reference": "d78d39c1599bd1188b8e26bb341da52c3c6d8a66",
                "shasum": ""
            },
            "require": {
                "php": ">=8.0.2",
                "psr/container": "^2.0"
            },
            "conflict": {
                "ext-psr": "<1.1|>=2"
            },
            "suggest": {
                "symfony/service-implementation": ""
            },
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-main": "3.0-dev"
                },
                "thanks": {
                    "name": "symfony/contracts",
                    "url": "https://github.com/symfony/contracts"
                }
            },
            "autoload": {
                "psr-4": {
                    "Symfony\\Contracts\\Service\\": ""
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Nicolas Grekas",
                    "email": "p@tchwork.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Generic abstractions related to writing services",
            "homepage": "https://symfony.com",
            "keywords": [
                "abstractions",
                "contracts",
                "decoupling",
                "interfaces",
                "interoperability",
                "standards"
            ],
            "support": {
                "source": "https://github.com/symfony/service-contracts/tree/v3.0.2"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "time": "2022-05-30T19:17:58+00:00"
        },
        {
            "name": "symfony/stopwatch",
            "version": "v6.0.5",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/stopwatch.git",
                "reference": "f2c1780607ec6502f2121d9729fd8150a655d337"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/stopwatch/zipball/f2c1780607ec6502f2121d9729fd8150a655d337",
                "reference": "f2c1780607ec6502f2121d9729fd8150a655d337",
                "shasum": ""
            },
            "require": {
                "php": ">=8.0.2",
                "symfony/service-contracts": "^1|^2|^3"
            },
            "type": "library",
            "autoload": {
                "psr-4": {
                    "Symfony\\Component\\Stopwatch\\": ""
                },
                "exclude-from-classmap": [
                    "/Tests/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Fabien Potencier",
                    "email": "fabien@symfony.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Provides a way to profile code",
            "homepage": "https://symfony.com",
            "support": {
                "source": "https://github.com/symfony/stopwatch/tree/v6.0.5"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "time": "2022-02-21T17:15:17+00:00"
        },
        {
            "name": "symfony/string",
            "version": "v6.0.12",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/string.git",
                "reference": "3a975ba1a1508ad97df45f4590f55b7cc4c1a0a0"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/string/zipball/3a975ba1a1508ad97df45f4590f55b7cc4c1a0a0",
                "reference": "3a975ba1a1508ad97df45f4590f55b7cc4c1a0a0",
                "shasum": ""
            },
            "require": {
                "php": ">=8.0.2",
                "symfony/polyfill-ctype": "~1.8",
                "symfony/polyfill-intl-grapheme": "~1.0",
                "symfony/polyfill-intl-normalizer": "~1.0",
                "symfony/polyfill-mbstring": "~1.0"
            },
            "conflict": {
                "symfony/translation-contracts": "<2.0"
            },
            "require-dev": {
                "symfony/error-handler": "^5.4|^6.0",
                "symfony/http-client": "^5.4|^6.0",
                "symfony/translation-contracts": "^2.0|^3.0",
                "symfony/var-exporter": "^5.4|^6.0"
            },
            "type": "library",
            "autoload": {
                "files": [
                    "Resources/functions.php"
                ],
                "psr-4": {
                    "Symfony\\Component\\String\\": ""
                },
                "exclude-from-classmap": [
                    "/Tests/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Nicolas Grekas",
                    "email": "p@tchwork.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Provides an object-oriented API to strings and deals with bytes, UTF-8 code points and grapheme clusters in a unified way",
            "homepage": "https://symfony.com",
            "keywords": [
                "grapheme",
                "i18n",
                "string",
                "unicode",
                "utf-8",
                "utf8"
            ],
            "support": {
                "source": "https://github.com/symfony/string/tree/v6.0.12"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "time": "2022-08-12T18:05:20+00:00"
        },
        {
            "name": "theseer/tokenizer",
            "version": "1.2.1",
            "source": {
                "type": "git",
                "url": "https://github.com/theseer/tokenizer.git",
                "reference": "34a41e998c2183e22995f158c581e7b5e755ab9e"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/theseer/tokenizer/zipball/34a41e998c2183e22995f158c581e7b5e755ab9e",
                "reference": "34a41e998c2183e22995f158c581e7b5e755ab9e",
                "shasum": ""
            },
            "require": {
                "ext-dom": "*",
                "ext-tokenizer": "*",
                "ext-xmlwriter": "*",
                "php": "^7.2 || ^8.0"
            },
            "type": "library",
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Arne Blankerts",
                    "email": "arne@blankerts.de",
                    "role": "Developer"
                }
            ],
            "description": "A small library for converting tokenized PHP source code into XML and potentially other formats",
            "support": {
                "issues": "https://github.com/theseer/tokenizer/issues",
                "source": "https://github.com/theseer/tokenizer/tree/1.2.1"
            },
            "funding": [
                {
                    "url": "https://github.com/theseer",
                    "type": "github"
                }
            ],
            "time": "2021-07-28T10:34:58+00:00"
        }
    ],
    "aliases": [],
    "minimum-stability": "stable",
    "stability-flags": [],
    "prefer-stable": false,
    "prefer-lowest": false,
    "platform": {
        "php": "^7.4 || ^8.0",
        "ext-curl": "*",
        "ext-intl": "*",
        "ext-json": "*",
        "ext-mbstring": "*"
    },
    "platform-dev": [],
    "plugin-api-version": "2.2.0"
}
