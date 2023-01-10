<?php

namespace Mahaelshawardy\MvcCore\Support\Facades\Faker;

use Mahaelshawardy\MvcCore\Support\Facades\Filesystem\DirectoryComposer;
use Mahaelshawardy\MvcCore\Support\Facades\Filesystem\DirectoryMaker;

class FakerImage
{
    private DirectoryComposer $directoryComposer;
    private DirectoryMaker $directoryMaker;

    public function __construct()
    {
        $this->directoryComposer = new DirectoryComposer();
        $this->directoryMaker = new DirectoryMaker();
    }

    public function image($folder, $image)
    {
        $uploadPath = $this->directoryComposer->get_mediaFiles();

        $dirname = $uploadPath . $folder . '/';
        
        $this->directoryMaker->make_directory($dirname);

        $imagePath = $dirname . $image;

        $fp = fopen($imagePath, 'w+');
        $ch = curl_init('https://picsum.photos/720/1080');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_exec($ch);

        curl_close($ch);
        fclose($fp);
    }
}
