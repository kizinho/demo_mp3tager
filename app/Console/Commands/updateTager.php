<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class updateTager extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tager:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update tager to latest';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        $url = 'https://mp3tager.com/download-install/update-install';
        $path_dir = 'update/';
        $default_save_directory = static::enryStorageDir($path_dir);

        $path_u = parse_url($url, PHP_URL_PATH);
        $extension = 'zip';
        $filename = pathinfo($path_u, PATHINFO_FILENAME);
        $rand = strtoupper(Str::random(4));
        $slu = str_slug($filename, '-');
        $slug = $slu . $rand;
        $default_mp3_directory = $default_save_directory;
        $name = $default_mp3_directory . $slug . '.' . $extension;
        $name_u = $default_mp3_directory . $slug;
        $ch = curl_init($url);
        $fp = fopen($name, 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
        //file_put_contents("Tmpfile.zip", fopen($url, 'r'));
        // copy($url, $name);
        $path = $default_mp3_directory;
        $location = $name;
        $zip = new \ZipArchive();
        if ($zip->open($location)) {
            $zip->extractTo($path . $slug);
            $zip->close();
        }

//        if (file_exists($location)) {
//            unlink($location);
//        }
        // File::deleteDirectory($name_u);
    }

    public static function enryStorageDir($default_directory, $abs = true) {
        $dir = $default_directory;
        $absPath = $dir;
        if (!is_dir($absPath)) {
            mkdir($absPath, 0777, true);
        }
        return ($abs ? $absPath : $dir);
    }

}
