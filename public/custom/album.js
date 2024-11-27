

$(document).ready(function () {
    $(document).on('click', '.mobile-card', function (e) {
        e.preventDefault()
        let id = $(this).data('id')

        const album = document.getElementById("album-" + id);
        lightGallery(album, {
            plugins: [],
            selector: 'a',  // Select only `a` tags inside the container
        });

    })
})

console.log('welcome');
