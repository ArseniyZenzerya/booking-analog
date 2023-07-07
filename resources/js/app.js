require('./bootstrap');


document.querySelectorAll('.class-open-block').forEach(item => {
    item.addEventListener('click', event => {
        showBlock1();
    })
    item.addEventListener('click', event => {
        showBlock();
    })
})
document.querySelectorAll('.class-open-form').forEach(item => {
    item.addEventListener('click', event => {
        showBlock2();
    })
})
document.querySelectorAll('.class-open-form2').forEach(item => {
    item.addEventListener('click', event => {
        showBlock3();
    })
})
document.querySelectorAll('.class-open-form3').forEach(item => {
    item.addEventListener('click', event => {
        showBlock4();
    })
})
document.querySelectorAll('.class-open-form4').forEach(item => {
    item.addEventListener('click', event => {
        showBlock5();
    })
})
document.querySelectorAll('.class-open-form5').forEach(item => {
    item.addEventListener('click', event => {
        showBlock6();
    })
})
document.querySelectorAll('.class-open-form6').forEach(item => {
    item.addEventListener('click', event => {
        showBlock7();
    })
})
document.querySelectorAll('.class-open-form7').forEach(item => {
    item.addEventListener('click', event => {
        showBlock8();
    })
})
document.querySelectorAll('.class-open-form8').forEach(item => {
    item.addEventListener('click', event => {
        showBlock9();
    })
})
document.querySelectorAll('.class-open-form9').forEach(item => {
    item.addEventListener('click', event => {
        showBlock10();
    })
})
function showBlock1(){

    if (document.getElementById("block-menu-profile-obj").style.display == 'flex') {
        document.getElementById("block-menu-profile-obj").style.display = "none";
    }
    else {
        document.getElementById("block-menu-profile-obj").style.display = "flex";
    }
}


function showBlock(){
    if (document.getElementById("block-menu-profile").style.display == 'flex') {
        document.getElementById("block-menu-profile").style.display = "none";
    }
    else {
        document.getElementById("block-menu-profile").style.display = "flex";
    }

}

function showBlock2(){
    if (document.getElementById("block-form-modal").style.display === 'none'){
        document.getElementById("block-form-modal").style.display = "flex";
        document.getElementById("element-setting-prof-field-first").style.width = "80%";
        document.getElementById("element-setting-prof-text-first").style.display = "none";
        document.getElementById("element-setting-prof-change-first").style.display = "none";
        document.getElementById("element-setting-prof-change-first").style.width = "0";
    }
    else{
        document.getElementById("block-form-modal").style.display = "none";
        document.getElementById("element-setting-prof-field-first").style.width = "70%";
        document.getElementById("element-setting-prof-change-first").style.display = "flex";
        document.getElementById("element-setting-prof-change-first").style.width = "0";
        document.getElementById("element-setting-prof-text-first").style.display = "flex";

    }
}

function showBlock3(){
    if (document.getElementById("block-form-modal2").style.display === 'none'){
        document.getElementById("block-form-modal2").style.display = "flex";
        document.getElementById("element-setting-prof-field-second").style.width = "80%";
        document.getElementById("element-setting-prof-text-second").style.display = "none";
        document.getElementById("element-setting-prof-change-second").style.display = "none";
        document.getElementById("element-setting-prof-change-second").style.width = "0";
    }
    else{
        document.getElementById("block-form-modal2").style.display = "none";
        document.getElementById("element-setting-prof-field-second").style.width = "70%";
        document.getElementById("element-setting-prof-change-second").style.display = "flex";
        document.getElementById("element-setting-prof-change-second").style.width = "0";
        document.getElementById("element-setting-prof-text-second").style.display = "flex";

    }
}

function showBlock4(){
    if (document.getElementById("block-form-modal3").style.display === 'none'){
        document.getElementById("block-form-modal3").style.display = "flex";
        document.getElementById("element-setting-prof-field-third").style.width = "80%";
        document.getElementById("element-setting-prof-text-third").style.display = "none";
        document.getElementById("element-setting-prof-change-third").style.display = "none";
        document.getElementById("element-setting-prof-change-third").style.width = "0";
    }
    else{
        document.getElementById("block-form-modal3").style.display = "none";
        document.getElementById("element-setting-prof-field-third").style.width = "70%";
        document.getElementById("element-setting-prof-change-third").style.display = "flex";
        document.getElementById("element-setting-prof-change-third").style.width = "0";
        document.getElementById("element-setting-prof-text-third").style.display = "flex";

    }
}
function showBlock5(){
    if (document.getElementById("block-form-modal4").style.display === 'none'){
        document.getElementById("block-form-modal4").style.display = "flex";
        document.getElementById("element-setting-prof-field-fourth").style.width = "80%";
        document.getElementById("element-setting-prof-text-fourth").style.display = "none";
        document.getElementById("element-setting-prof-change-fourth").style.display = "none";
        document.getElementById("element-setting-prof-change-fourth").style.width = "0";
    }
    else{
        document.getElementById("block-form-modal4").style.display = "none";
        document.getElementById("element-setting-prof-field-fourth").style.width = "70%";
        document.getElementById("element-setting-prof-change-fourth").style.display = "flex";
        document.getElementById("element-setting-prof-change-fourth").style.width = "0";
        document.getElementById("element-setting-prof-text-fourth").style.display = "flex";

    }
}
function showBlock6(){
    if (document.getElementById("block-form-modal5").style.display === 'none'){
        document.getElementById("block-form-modal5").style.display = "flex";
        document.getElementById("element-setting-prof-field-fifth").style.width = "80%";
        document.getElementById("element-setting-prof-text-fifth").style.display = "none";
        document.getElementById("element-setting-prof-change-fifth").style.display = "none";
        document.getElementById("element-setting-prof-change-fifth").style.width = "0";
    }
    else{
        document.getElementById("block-form-modal5").style.display = "none";
        document.getElementById("element-setting-prof-field-fifth").style.width = "70%";
        document.getElementById("element-setting-prof-change-fifth").style.display = "flex";
        document.getElementById("element-setting-prof-change-fifth").style.width = "0";
        document.getElementById("element-setting-prof-text-fifth").style.display = "flex";

    }
}
function showBlock7(){
    if (document.getElementById("block-form-modal6").style.display === 'none'){
        document.getElementById("block-form-modal6").style.display = "flex";
        document.getElementById("element-setting-prof-field-sixth").style.width = "80%";
        document.getElementById("element-setting-prof-text-sixth").style.display = "none";
        document.getElementById("element-setting-prof-change-sixth").style.display = "none";
        document.getElementById("element-setting-prof-change-sixth").style.width = "0";
    }
    else{
        document.getElementById("block-form-modal6").style.display = "none";
        document.getElementById("element-setting-prof-field-sixth").style.width = "70%";
        document.getElementById("element-setting-prof-change-sixth").style.display = "flex";
        document.getElementById("element-setting-prof-change-sixth").style.width = "0";
        document.getElementById("element-setting-prof-text-sixth").style.display = "flex";

    }
}
function showBlock8(){
    if (document.getElementById("block-form-modal7").style.display === 'none'){
        document.getElementById("block-form-modal7").style.display = "flex";
        document.getElementById("element-setting-prof-field-seventh").style.width = "80%";
        document.getElementById("element-setting-prof-text-seventh").style.display = "none";
        document.getElementById("element-setting-prof-change-seventh").style.display = "none";
        document.getElementById("element-setting-prof-change-seventh").style.width = "0";
    }
    else{
        document.getElementById("block-form-modal7").style.display = "none";
        document.getElementById("element-setting-prof-field-seventh").style.width = "70%";
        document.getElementById("element-setting-prof-change-seventh").style.display = "flex";
        document.getElementById("element-setting-prof-change-seventh").style.width = "0";
        document.getElementById("element-setting-prof-text-seventh").style.display = "flex";

    }
}
function showBlock9(){
    if (document.getElementById("block-form-modal8").style.display === 'none'){
        document.getElementById("block-form-modal8").style.display = "flex";
        document.getElementById("element-setting-prof-field-eight").style.width = "80%";
        document.getElementById("element-setting-prof-text-eight").style.display = "none";
        document.getElementById("element-setting-prof-change-eight").style.display = "none";
        document.getElementById("element-setting-prof-change-eight").style.width = "0";
    }
    else{
        document.getElementById("block-form-modal8").style.display = "none";
        document.getElementById("element-setting-prof-field-eight").style.width = "70%";
        document.getElementById("element-setting-prof-change-eight").style.display = "flex";
        document.getElementById("element-setting-prof-change-eight").style.width = "0";
        document.getElementById("element-setting-prof-text-eight").style.display = "flex";

    }
}
function showBlock10(){
    if (document.getElementById("block-form-modal9").style.display === 'none'){
        document.getElementById("block-form-modal9").style.display = "flex";
        document.getElementById("element-setting-prof-field-ninth").style.width = "80%";
        document.getElementById("element-setting-prof-text-ninth").style.display = "none";
        document.getElementById("element-setting-prof-change-ninth").style.display = "none";
        document.getElementById("element-setting-prof-change-ninth").style.width = "0";
    }
    else{
        document.getElementById("block-form-modal9").style.display = "none";
        document.getElementById("element-setting-prof-field-ninth").style.width = "70%";
        document.getElementById("element-setting-prof-change-ninth").style.display = "flex";
        document.getElementById("element-setting-prof-change-ninth").style.width = "0";
        document.getElementById("element-setting-prof-text-ninth").style.display = "flex";

    }
}
// .element-setting-prof-field{
//     width: 70%;
// }
// .element-setting-prof-change{
//     width: 10%;
// }
