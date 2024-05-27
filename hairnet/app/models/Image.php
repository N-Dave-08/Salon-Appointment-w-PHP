<?php

class Image extends Model

{
    public function uploadImage($inputName, $uploadDirectory)
    {
        if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] === UPLOAD_ERR_OK) {
            $targetFile = $uploadDirectory . basename($_FILES[$inputName]["name"]);
            $check = getimagesize($_FILES[$inputName]["tmp_name"]);
            if ($check !== false) {
                move_uploaded_file($_FILES[$inputName]["tmp_name"], $targetFile);
                return $targetFile;
            }
        }
        return null;
    }
}
