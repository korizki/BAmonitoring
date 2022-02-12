// const tawal = document.getElementById('tawal').value;
// const takhir = document.getElementById('takhir').value;
const uploadForm = document.querySelector(".boxFormUpload");
const cancel = document.querySelector(".cancelUploadBtn");
cancel.addEventListener('click', function(){
  uploadForm.style.display="none";
});
const sideUpload = document.getElementById("upload");
sideUpload.addEventListener('click', function(){
  const uploadForm = document.querySelector(".boxFormUpload");
  uploadForm.style.display="block";
})

// Menghitung durasi problem 
function getDurasi(){
  const startTime = document.getElementById('start-time').value;
  const endTime = document.getElementById('end-time').value;
  const inputDurasi = document.getElementById('durasi');
  const start = Date.parse(startTime);
  const end = Date.parse(endTime);
  const durasi = (end - start) / 1000 / 60 / 60 ;
  inputDurasi.value = durasi.toFixed(2);
};

// memunculkan form input problem
function showForm(){
  const formMenu = document.querySelector('.outer-box');
  formMenu.style.display = 'block';
}
function hideForm(){
  console.log('clicked');
  const formMenu = document.querySelector('.outer-box');
  formMenu.style.display = 'none';
}

// Menampilkan detail problem
function showDetails(){
const detailProblem = document.getElementById('tabel-problem');
const actionText = document.getElementById('actionDetail');
if (actionText.innerHTML == 'Show'){
    detailProblem.style.display = 'block';
    actionText.innerHTML='Hide';
} else {
    detailProblem.style.display = 'none';
    actionText.innerHTML='Show';
}};

// Menampilkan detail unit
function showDetailUnit(){
  const detailUnit = document.getElementById('listUnit');
  const labelUnit = document.getElementById('actionUnit');
  if (labelUnit.innerHTML == 'Show'){
    detailUnit.style.display = 'block';
    labelUnit.innerHTML = 'Hide';
  } else {
    detailUnit.style.display = 'none';
    labelUnit.innerHTML = 'Show';
  }
}
// menampilkan detail kabel
function showDetailKabel(){
  const detailKabel = document.getElementById('list-kabel');
  const labelKabel = document.getElementById('actionKabel');
  if (labelKabel.innerHTML == 'Show'){
    labelKabel.innerHTML = 'Hide';
    detailKabel.style.display = 'block';
  } else {
    labelKabel.innerHTML = 'Show';
    detailKabel.style.display = 'none';
  }
}
// Menampilkan single line diagram
  var count = 0;
  function showSingleLine(){
    const singleLine = document.getElementById('singleline');
    if (count == 0){
      singleLine.style.display = 'block';
      count = 1;
    } else {
      singleLine.style.display = 'none';
      count = 0;
    }
  }
//event scroll
  window.onscroll = function(event){myfunction()}
  function myfunction(){
    if( document.documentElement.scrollTop >50){
      document.querySelector('.navbar').style.backgroundColor = 'white';
      document.querySelector('.navbar').style.borderBottom = '1px solid rgba(128, 128, 128, 0.309)';
      document.querySelector('.link').style.color = '#30475E';
      document.querySelector('.link2').style.color = '#30475E';
      document.querySelector('.link3').style.color = '#30475E';
      document.querySelector('.link4').style.color = '#30475E';
    } else {
      document.querySelector('.navbar').style.backgroundColor = 'transparent';
      document.querySelector('.navbar').style.borderBottom = 'none';
      document.querySelector('.link').style.color = 'white';
      document.querySelector('.link2').style.color = 'white';
      document.querySelector('.link3').style.color = 'white';
      document.querySelector('.link4').style.color = 'white';
    }
  }
// hide show edit btn menu
  
  document.getElementById('pageListrik').onscroll = function(event){
    hideshowfunction()
  }
  function hideshowfunction(){
    if (document.documentElement.scrollTop > 50){
      document.getElementById('editBtn').style.transform = 'translate(-75px, 30px)'
    } else {
      document.getElementById('editBtn').style.transform = 'translate(-150px, 30px)'
    }
  }
// Menampilkan edit tanggal
var btn = document.getElementById('editBtn');
btn = 0;    
function showEditDate(){
  const menu = document.getElementById('editMenu');
  if (btn == 0){
    menu.style.transform = 'translateX(0)';
    btn = 1;
  } else {
    menu.style.transform = 'translateX(-900px)';
    btn = 0;
  }
}
//hide login form 
  function hideLogin(){
    const area = document.querySelector('.loginBox');
    area.style.display = 'none';
  }
  function showLogin(){
    console.log('Timbul')
    const area = document.querySelector('.loginBox');
    area.style.display = 'block';
    document.getElementById('username').focus();
  }

// Show Filter Menu
function showFilterMenu(){
  const filterMenu = document.querySelector(".filterMenu");
  if (filterMenu.style.display == "none"){
    filterMenu.style.display = "block";
  } else if(filterMenu.style.display == "block"){
    filterMenu.style.display = "none";
  } else {
    filterMenu.style.display = "block";
  }
}

function sortProblemData(){
  document.querySelector("#load").click();
}

// dapatkan nama file pada kolom upload file 
function getName(){
  const upload = document.getElementById("uploadBtn");
  const nameinput = document.getElementById("fileName");
  nameinput.value = upload.value;
}
