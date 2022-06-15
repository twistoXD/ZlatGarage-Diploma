let showImage = document.getElementById('showImage')
let fileImage = document.getElementById('image')
let deletePost = document.getElementById('deletePost')


//Загрузка файла на страницу
if (fileImage) {
    fileImage.addEventListener("change", function (event) {
        let target = event.target
        if (target.files[0] && target.files[0].type.includes('image')) {
            showImage.src = URL.createObjectURL(target.files[0]);
        }
    })
}


