<?php
/**
 * Created by PhpStorm.
 * User: jimmybengtsson
 * Date: 2017-10-13
 * Time: 10:27
 */

namespace Controller;


class ImageController
{
    private $targetDir = 'uploads/';
    private $validate;

    public function run()
    {
        $this->validate = new \Model\Validate();

        if(isset($_POST['ImageView::SubmitImageUpload'])) {

            $targetFile = $this->targetDir.basename($_FILES['ImageView::FileToUpload']['name']);
            $imageFileType = pathinfo($targetFile,PATHINFO_EXTENSION);

            if(strlen($this->validate->imageForm($targetFile, $imageFileType)) > 0) {

                return $_SESSION['Message'] = $this->validate->imageForm($targetFile, $imageFileType);

            } else {

                if (move_uploaded_file($_FILES['ImageView::FileToUpload']["tmp_name"], $targetFile)) {

                    $_SESSION['Message'] = "The file ". basename( $_FILES['ImageView::FileToUpload']["name"]). " has been uploaded.";
                    return header('Location: /');

                } else {
                    $_SESSION['Message'] = "Sorry, there was an error uploading your file.";
                    return header('Location: /');
                }
            }
        }
    }

}