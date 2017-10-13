## Test case 5.1, Upload a image
User sign in and upload a valid image-file.

### Input:
 * Test case 1.1
 * Test case 1.7
 * Select a valid image-file to upload
 * Press button "Upload Image".
 
### Output:
 * Feedback: "The file `(name of image)` has been uploaded." is shown
 * A updated list with the new uploaded image is shown.
 * If something went wrong, Feedback: "Sorry, there was an error uploading your file." is shown.
 
#### Success
// Todo add a image

***

## Test case 5.2, Upload a image with a name that already exists in the folder `/uploads/`. 
User sign in and upload a image-file with a name that already exists.

### Input:
 * Test case 1.1
 * Test case 1.7
 * Test case 5.1
 * Upload the same image again
 
### Output:
 * Feedback: "Sorry, file already exists." is shown
 * A form for upload a image is shown
 
// Todo add a image

***

## Test case 5.3, Upload a file that is not valid as an image-file
User sign in and upload a unvalid image-file.

### Input:
 * Test case 1.1
 * Test case 1.7
 * Select a file to upload that is not jpg, png, jpeg or gif.
 * Press button "Upload Image".
 
### Output:
 * Feedback: "Sorry, only JPG, JPEG, PNG & GIF files are allowed." is shown
 * A form for upload a image is shown
 
// Todo add a image

***

## Test case 5.4, Upload a file that is over 2 Mb in size
User sign in and upload a image over 2 Mb in size

### Input:
 * Test case 1.1
 * Test case 1.7
 * Select a file to upload that is over 2 Mb in size
 * Press button "Upload Image".
 
### Output:
 * Feedback: "Sorry, your file is too large." is shown
 * A form for upload a image is shown
 
// Todo add a image

***

## Test case 6.1, List images when navigating to page 
All uploaded images are shown as a list when navigating to page.

### Input:
 * Test case 1.1
 
### Output:
 * A form for login is shown
 * A list with available images is shown
 * Todays date and time is shown in correct format.
 
// Todo add a image
***

## Test case 6.2, List images when signed in
All uploaded images are shown as a list when navigating to page.

### Input:
 * Test case 1.1
 * Test case 1.7
 
### Output:
 * A list with available images is shown
 
// Todo add a image
***

## Test case 6.3, Images are not shown when on register page
No uploaded images are shown when navigating to register page.

### Input:
 * Test case 1.1
 * Test case 4.1
 
### Output:
 * A form for Registration of a new user is shown
 * No images are shown
 
// Todo add a image
***