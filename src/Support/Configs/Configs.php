<?php

namespace Mahaelshawardy\Mvccore\Support\Configs;

use Mahaelshawardy\Mvccore\Support\Debug\Debugger;
use Mahaelshawardy\Mvccore\Support\Facades\Filesystem\DirectoryComposer;

class Configs
{
    private array $configs = [];

    public function __construct()
    {
        $directoryComposer = new DirectoryComposer();
        // Debugger::die_and_dump( $directoryComposer->plugin_root());
        $lines  = file("{$directoryComposer->plugin_root()}/.env");
        $keys   = [];
        $values = [];
        foreach ($lines as $line) {
            $line = trim($line);
            if (!$line) {
                continue;
            }
            if ($line === PHP_EOL || stripos($line, '#') === 0) {
                continue;
            }
            if (stripos($line, PHP_EOL)) {
                [$line,] = explode(PHP_EOL, $line);
            }
            [$keys[], $values[]] = explode('=', $line);
        }
        $this->configs = array_combine($keys, $values);
    }

    public function keyValue($key)
    {
        if (array_key_exists($key, $this->configs)) {
            return trim($this->configs[$key]);
        }
        return NULL;
    }

    public function setValue($key, $newValue)
    {
        $directoryComposer = new DirectoryComposer();
        if (array_key_exists($key, $this->configs)) {
            $this->configs[$key] = $newValue;
            $configCopy = $this->configs;
            
            array_walk($configCopy, function (&$value, $key) {
                $value = "{$key}={$value}";
            });
            file_put_contents("{$directoryComposer->plugin_root()}/.env", implode("\n", $configCopy));
        }
    }

    public function get_configs(): array
    {
        return $this->configs;
    }
}
