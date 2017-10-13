<?php
/**
 * Created by PhpStorm.
 * User: jimmybengtsson
 * Date: 2017-10-13
 * Time: 10:28
 */

namespace View;


class ImageView
{

    private static $fileToUpload = 'ImageView::FileToUpload';
    private static $submitImageUpload = 'ImageView::SubmitImageUpload';

    public function render()
    {

        if ($_SESSION['isLoggedIn']) {

            return '
			<form action="?upload" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="' . self::$fileToUpload . '" id="' . self::$fileToUpload . '">
                <input type="submit" value="Upload Image" name="' . self::$submitImageUpload . '">
            </form>
		    ';

        } else {

            return '
        <p>List of images</p>
        ';
        }

    }

    public function renderListOfImages()
    {
        return '
        <p>List of images</p>
        ';
    }

}