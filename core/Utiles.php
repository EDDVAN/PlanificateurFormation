<?php

class Utiles
{
    public static function handleFileUpload($file, $id, $destination)
    {
        if ($file && $file["error"] === UPLOAD_ERR_OK) {
            $fileTmpPath = $file['tmp_name'];
            $fileName = $file['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            $newFileName = $id . '-' . substr(md5(time() . $fileName), 0, 15) . '.' . $fileExtension;

            $uploadFileDir = './img/uploads/' . $destination . '/';
            $pathInTheDatabase = '/img/uploads/' . $destination . '/';

            $dest_path = $uploadFileDir . $newFileName;
            $fileInTheDatabase = $pathInTheDatabase . $newFileName;
            if (!is_dir($uploadFileDir)) {
                mkdir($uploadFileDir, 0755, true);
            }

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                return $fileInTheDatabase;
            } else {
                throw new Exception('There was an error moving the uploaded file.');
            }
        } else {
            return null;
        }
    }
}
