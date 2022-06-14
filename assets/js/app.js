// const MOON = '🌙';
// const SUN = '☀️';
const OUTSET = 'header_class';
const INSET = 'header_class1';
const DEFAULT_MODE = OUTSET;

var pathArray = window.location.pathname.split('/');

console.log(pathArray);

var btn = document.querySelector('#one');



switch(pathArray[2]){

    case '':

     btn = document.querySelector('#one')

    break;

    case 'about':

     btn = document.querySelector('#About')

    break;

    case 'posts':

     if(pathArray[3] === 'create'){btn = document.querySelector('#Create_Post');}

     else{btn = document.querySelector('#Blog');}

     

    break;

    case 'categories':

    if(pathArray[3] === 'create'){btn = document.querySelector('#Create_Category');}

        else{btn = document.querySelector('#Categories');}

    

    break;

    case 'users':

    if(pathArray[3] === 'register'){btn = document.querySelector('#Register');}
    else{btn = document.querySelector('#Login');}

        

    

    break;


}


init();

function init() {

    let storedMode = sessionStorage.getItem('mode');
    if (!storedMode) {
        storedMode = DEFAULT_MODE;
        sessionStorage.setItem('mode', DEFAULT_MODE);
    }
    setMode(storedMode);
}

function setMode(mode = DEFAULT_MODE) {

    if (mode === OUTSET) {
        
         btn.classList.remove(INSET);
        btn.classList.add(OUTSET);

    } else if (mode === INSET) {
        
        btn.classList.remove(OUTSET);
         btn.classList.add(INSET);
    }
}

btn.addEventListener('click', function () {

    let mode = sessionStorage.getItem('mode');
    if (mode) {
        let newMode = mode == OUTSET ? INSET : OUTSET;
        setMode(newMode);
        sessionStorage.setItem('mode', newMode);
    }
});