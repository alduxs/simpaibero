

const deleteRelatedProductModal = document.getElementById('delete-related-product-modal');
const miModalProduct = new bootstrap.Modal(deleteRelatedProductModal);

const btDeleteRelatedProduct = document.getElementById('btDeleteRelatedProduct');




function confirmDeleteRelatedProduct(relatedProduct) {


    const relatedProductData = JSON.parse(relatedProduct);
    const relatedProductRegisterId = relatedProductData.relatedProductRegisterId;
    const relatedProductName = relatedProductData.productName;




    document.getElementById('related-product-register-name').textContent = relatedProductName;



    btDeleteRelatedProduct.setAttribute('onclick', `setDeleteRelatedProductAction('${relatedProductRegisterId}')`);

    miModalProduct.show();
}


function setDeleteRelatedProductAction(relatedProductRegisterId) {

    console.log(relatedProductRegisterId);


    const deleteRelatedProductForm = document.getElementById('deleteRelatedProductForm');
    deleteRelatedProductForm.action = `/related-product/${relatedProductRegisterId}/destroy`;
    deleteRelatedProductForm.submit();
}
