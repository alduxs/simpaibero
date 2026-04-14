let imgenPrincipal = document.getElementsByClassName("imagen-pincipal");

if (imgenPrincipal.length > 0) {
    let idFirstSlide = imgenPrincipal[0]["id"];
    let numberIdArray = idFirstSlide.split("-");

    let slideActivo = numberIdArray[2];

    /* THUMBS --------------------------------- */
    let thumbs = document.querySelectorAll(".imagen-thumb");

    let anchoThumb = thumbs[0].clientWidth;
    let altoThumb = anchoThumb; // 30px for gap

    thumbs.forEach((thumb) => {
        thumb.style.height = altoThumb + "px";

        thumb.addEventListener("click", function () {
            let thumbId = this.id;
            let numberIdArrayThumb = thumbId.split("-");
            let slideActivoThumb = numberIdArrayThumb[1];
            let elementHide = document.getElementById(
                "imagen-principal-" + slideActivo,
            );
            elementHide.style.display = "none";
            slideActivo = slideActivoThumb;
            let elementShow = document.getElementById(
                "imagen-principal-" + slideActivo,
            );
            elementShow.style.display = "block";
        });
    });
}
