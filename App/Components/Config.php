<?php

namespace App\Components;

class Config
{
    public function get($configName) {

        if (!file_exists(CONFIG_DIR . "/{$configName}.php")) {
            return false;
        }
        $config = require(CONFIG_DIR . "/{$configName}.php");

        $local_config = [];
        if (file_exists(CONFIG_DIR . "/local.php")) {
            $local_config = require(CONFIG_DIR . "/local.php");
            if (!empty($local_config[$configName])) {
                $config = array_merge($config, $local_config[$configName]);
            }
        }

        return $config;
    }

    public function getAll() {

        $local_config = [];
        if (file_exists(CONFIG_DIR . "/local.php")) {
            $local_config = require(CONFIG_DIR . "/local.php");
        }

        $configs = glob(CONFIG_DIR . '/*.php');

        $merged_configs = [];
        foreach ($configs as $config) {
            $filename = basename($config, ".php");
            $conf = require($config);
            if (isset($local_config[$filename])) {
                $conf = array_merge($conf, $local_config[$filename]);
            }
            $merged_configs = array_merge($merged_configs, [$filename => $conf]);
        }

        return $merged_configs;
    }

    public function getJson($config) {
        if (!file_exists(CONFIG_DIR . "/{$config}.json")) {
            return false;
        }
        $conf = file_get_contents(CONFIG_DIR . "/{$config}.json");
        return json_decode($conf, true);
    }
}
