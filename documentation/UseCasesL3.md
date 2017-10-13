# UC5 Upload Image
## Preconditions
A user is authenticated. Ex. UC1, UC3

## Main scenario
 1. Starts when a user wants to upload an image.
 2. The system present a choice for uploading a image when user is signed in.
 3. User choice image to upload.
 4. System uploads image and stores it in the folder `/uploads`.

## Alternate Scenarios
 * 4a. Image could not be uploaded.
   1. System presents an error message
   2. Step 2 in main scenario

# UC6 List uploaded images
## Preconditions
A user can upload an image. Ex. UC5

## Main scenario
 1. Starts when a user navigates to page.
 2. The system present a list of images stored in the folder `/uploads/`.

## Alternate Scenarios
 * 2a. Image could not be uploaded.
   1. No images are shown if the folder with uploaded images is empty.
 