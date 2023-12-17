var imgPreview = document.getElementById('image_preview');

var articleImage = document.getElementById('article_img');
var addForm = document.getElementById('add_form');
var articleTitle = document.getElementById('article_title');
var articleDesc = document.getElementById('article_desc');
var articleCategory = document.getElementById('category');

var descError = document.getElementById('error-desc');
var titleError = document.getElementById('error-title');
var imgError = document.getElementById('error-img');
var catError = document.getElementById('error-cat');

var titleRegx = new RegExp(/^[-@.,?\/#&+\w\s:;\’\'\"\`]{30,500}$/);

articleImage.addEventListener("change", function () {
  var file = this.files[0];

  if (file) {
    var reader = new FileReader();
    reader.addEventListener("load", function () {
      imgPreview.setAttribute("src", this.result);
    });
    reader.readAsDataURL(file);
  }
});

addForm.addEventListener("keyup", function (e) {
  var image = document.getElementById('article_img');
  if (articleDesc.value == '' || articleDesc.value == null) {
    e.preventDefault();
    descError.innerHTML = "Isi artikel tidak boleh kosong !";
  }
  else if (articleDesc.value.length < 1000) {
    e.preventDefault();
    descError.innerHTML = "Isi artikel minimal terdiri dari 1000 karakter";
  }
  else {
    descError.innerHTML = "";
  }

  if (image.validity.valueMissing) {
    e.preventDefault();
    imgError.innerHTML = "Unggah gambar";
  } else {
    imgError.innerHTML = "";
  }

  if (articleCategory.value == "0") {
    e.preventDefault();
    catError.innerHTML = "Pilih kategori";
  } else {
    catError.innerHTML = "";
  }

  if (articleTitle.value == '' || articleTitle.value == null) {
    e.preventDefault();
    titleError.innerHTML = "Judul tidak boleh kosong !";
  }
  else if (!titleRegx.test(articleTitle.value)) {
    e.preventDefault();
    titleError.innerHTML = "Judul minimal terdiri dari 30 karakter."
  }
  else {
    titleError.innerHTML = "";
  }
});

addForm.addEventListener("submit", function (e) {
  if (articleDesc.value == '' || articleDesc.value == null) {
    e.preventDefault();
    descError.innerHTML = "Isi artikel tidak boleh kosong !";
  }
  else if (articleDesc.value.length < 1000) {
    e.preventDefault();
    descError.innerHTML = "Isi artikel minimal terdiri dari 1000 karakter";
  }
  else {
    descError.innerHTML = "";
  }

  if (articleImage.validity.valueMissing) {
    e.preventDefault();
    imgError.innerHTML = "Pilih gambar";
  } else {
    imgError.innerHTML = "";
  }

  if (articleCategory.value == "0") {
    e.preventDefault();
    catError.innerHTML = "Pilih kategori";
  } else {
    catError.innerHTML = "";
  }

  if (articleTitle.value == '' || articleTitle.value == null) {
    e.preventDefault();
    titleError.innerHTML = "Judul tidak boleh kosong !";
  }
  else if (!titleRegx.test(articleTitle.value)) {
    e.preventDefault();
    titleError.innerHTML = "Judul minimal lebih dari 30 karakter"
  }
  else {
    titleError.innerHTML = "";
  }
});

addForm.addEventListener("change", function (e) {
  if (articleDesc.value == '' || articleDesc.value == null) {
    e.preventDefault();
    descError.innerHTML = "Isi artikel tidak boleh kosong !";
  }
  else if (articleDesc.value.length < 1000) {
    e.preventDefault();
    descError.innerHTML = "Isi artikel minimal terdiri dari 1000 karakter";
  }
  else {
    descError.innerHTML = "";
  }

  if (articleImage.validity.valueMissing) {
    e.preventDefault();
    imgError.innerHTML = "Pilih gambar";
  } else {
    imgError.innerHTML = "";
  }

  if (articleCategory.value == "0") {
    e.preventDefault();
    catError.innerHTML = "Pilih kategori";
  } else {
    catError.innerHTML = "";
  }

  if (articleTitle.value == '' || articleTitle.value == null) {
    e.preventDefault();
    titleError.innerHTML = "Judul tidak boleh kosong !";
  }
  else if (!titleRegx.test(articleTitle.value)) {
    e.preventDefault();
    titleError.innerHTML = "Judul minimal terdiri dari 30 karakter."
  }
  else {
    titleError.innerHTML = "";
  }
});