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

    private $images;

    public function __construct($images)
    {
        $this->images = $images;
    }

    public function render()
    {

        if ($_SESSION['isLoggedIn']) {

            return '
            <hr>
			<form action="?upload" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="' . self::$fileToUpload . '" id="' . self::$fileToUpload . '">
                <input type="submit" value="Upload Image" name="' . self::$submitImageUpload . '">
            </form>
            <hr>
            <br>
            <div class="innerContainer">
                <ul class="imageContainer">' . $this->renderListOfImages() . '</ul>
            </div>
		    ';

        } else {

            return '
            <div class="innerContainer">
                <ul class="imageContainer">' . $this->renderListOfImages() . '</ul>
            </div>
        ';
        }

    }

    public function renderListOfImages()
    {
        if (!$_SESSION['registerPage']) {

            $imagesString = '';
            foreach ($this->images as $image) {
                $imagesString .= $this->renderImage($image);
            }
            return $imagesString;

        } else {
            return '';
        }
    }

    public function renderImage($image)
    {
            return '<li><img src="../uploads/' . $image . '" alt="' . $image . '"></li><br>';
    }

}