const deleteModalElement = document.getElementById("delete-modal");


if(deleteModalElement){
    const deleteModal = new bootstrap.Modal(deleteModalElement);

    const imageCont = document.getElementById('imageCont');
    const imageNameCont = document.getElementById('image-name');
    const btDeleteImage = document.getElementById('btDeleteImage');

    function confirmDeleteAction(imageId,imageName) {
        imageCont.src = `../../assets/productos/big/${imageName}`;
        imageNameCont.textContent = imageName;
        btDeleteImage.setAttribute('onclick', `setDeleteFormAction('${imageId}')`);

            deleteModal.show();
    }

    function setDeleteFormAction(imageId) {
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.action = `/image/${imageId}/destroy`;
        deleteForm.submit();
    }
}


