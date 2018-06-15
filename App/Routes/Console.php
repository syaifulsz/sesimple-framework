<?php

namespace App\Routes;

// components
use App\Components\Cache;

class Console
{
    public function __construct()
    {
        if (php_sapi_name() !== 'cli') {
            throw new \Error('This is not suppose to be accessible other than console!');
            die();
        }

        echo PHP_EOL;
        echo '--===[SESIMPLE] CONSOLE===--' . PHP_EOL;
        echo PHP_EOL;

        if (!empty($_SERVER['argv'][1])) {

            switch ($_SERVER['argv'][1]) {

                case 'hello':

                    echo '--===[SESIMPLE] HELLO===--' . PHP_EOL;
                    echo PHP_EOL;
                    echo 'WORLD! (this is an example of console route command)' . PHP_EOL;
                    echo PHP_EOL;
                    die();
                    break;

                case 'cache/clear':

                    echo '--===[SESIMPLE] CLEAR ALL CACHE===--' . PHP_EOL;
                    echo PHP_EOL;
                    $cache = new Cache;
                    print_r($cache->removeAll());
                    echo PHP_EOL;
                    die();
                    break;

                default:
                    echo '[[[ ERROR: No command found. ]]]' . PHP_EOL;
                    echo PHP_EOL;

                    $this->consoleCommands(true);
                    break;
            }
        }

        $this->consoleCommands(true);
    }

    public function consoleCommands($end = false)
    {
        echo 'LIST OF CONSOLE COMMANDS:' . PHP_EOL;
        echo PHP_EOL;

        echo ' - HELLO:                                      php sesimple hello' . PHP_EOL;
        echo ' - CACHE / CLEAR:                              php sesimple cache/clear' . PHP_EOL;

        echo PHP_EOL;

        if ($end) {
            die();
        }
    }
}
