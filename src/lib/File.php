<?php

class File {

    public static function build_path($path_array): string {
        $DS = DIRECTORY_SEPARATOR;
        $ROOT_FOLDER = __DIR__ . $DS . "..";
        return $ROOT_FOLDER . "/" . implode("/", $path_array);
    }
}