// Function to make the alert for successful creation/editing/deleting of a project fade out after two seconds

if (document.getElementById('alert-message')) {

    const alertMessage = document.getElementById('alert-message');
    
    alertMessage.style.opacity = 1;
    
    setTimeout(function() {
        
        alertMessage.style.opacity = 0;
    },2000);
}