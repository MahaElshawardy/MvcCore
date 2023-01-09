<?php

namespace MahaElshawardy\Mvccore\Support\Facades\Localization;

use MahaElshawardy\Mvccore\Support\Facades\Localization\Lang;
use MahaElshawardy\Mvccore\Support\Facades\Filesystem\DirectoryComposer;
use MahaElshawardy\Mvccore\Support\Debug\Debugger;

class Translate
{

    public static function translate($fileName, $key): string
    {
        $lang = Lang::get();
        $directoryComposer = new DirectoryComposer();
        $fileName = file_get_contents("{$directoryComposer->plugin_root()}/Src/Langs/{$lang}/{$fileName}.json");
        $fileName = json_decode($fileName, true);
        if (array_key_exists($key, $fileName)) {
            return $fileName[$key];
        }
        return 'NULL';
    }

    public function setValue($lang, $fileNameReuest, $key, $newValue)
    {
        $directoryComposer = new DirectoryComposer();
        $fileName = file_get_contents("{$directoryComposer->plugin_root()}/Src/Langs/{$lang}/{$fileNameReuest}.json");
        $fileName = json_decode($fileName, true);
        if (array_key_exists($key, $fileName)) {
            $fileName[$key] = $newValue;
            $decoded = json_encode($fileName);
            file_put_contents("{$directoryComposer->plugin_root()}/Src/Langs/{$lang}/{$fileNameReuest}.json", $decoded);
        }
        return $fileName;
    }

    public static function getTranslations($fileName): array
    {
        $lang = Lang::get();  
        $directoryComposer = new DirectoryComposer();
        $fileName = file_get_contents("{$directoryComposer->plugin_root()}/Src/Langs/{$lang}/{$fileName}.json");
        $fileName = json_decode($fileName, true);
        // Debugger::die_and_dump($lang);
        return $fileName;
    }
}
