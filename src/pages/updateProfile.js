// Change profile picture when file is uploaded
const profilePictureInput = document.getElementById('profile-picture-input');
const profilePictureImage = document.getElementById('profile-picture-image');

// Get the default image source
const defaultProfilePicture = profilePictureImage.src;

profilePictureInput.addEventListener('change', (event) => {
    const file = event.target.files[0];
    
    // Check if a file was selected
    if (file) {
        const reader = new FileReader();
        
        reader.addEventListener('load', (readerEvent) => {
            // Set the image source to the uploaded file
            profilePictureImage.src = readerEvent.target.result;
        });
        
        reader.readAsDataURL(file);
    }
    else {
        // Reset the image source to the default image
        profilePictureImage.src = defaultProfilePicture;
    }
});