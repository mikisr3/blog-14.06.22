								

								// const file = document.querySelector('#file');

								// file.addEventListener('change', (e) => {

								//   // Get the selected file
								//   const [file] = e.target.files;

								//   // Get the file name and size
								//   const { name: fileName, size } = file;

								//   // Convert size in bytes to kilo bytes
								//   const fileSize = (size / 1000).toFixed(2);

								//   // Set the text content
								//   const fileNameAndSize = `${fileName} - ${fileSize}KB`;

								//   document.querySelector('.file-name').textContent = fileNameAndSize;
								// });


								var clicked = true;
window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    var sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        //  if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //      document.body.classList.toggle('sb-sidenav-toggled');
        // }

       // console.log(sidebarToggle.src);


        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
            if(clicked){

                sidebarToggle.src = "http://localhost/blog/assets/images/posts/open.jpg";

                clicked = false;


            }else{

                 sidebarToggle.src = "http://localhost/blog/assets/images/posts/hide.jpg";

                 clicked = true;


            }
            
        });
    }

});


// var header = document.getElementById("links");
// var btns = header.getElementsByClassName("btn");
// console.log(btns);


// for (var i = 0; i < btns.length; i++) {
//   btns[i].addEventListener("click", function() {
//   var current = document.getElementsByClassName("active");
  
//     current[0].className = current[0].className.replace(" active", "");
  
//   this.className += " active";
//   });
// }

const listItems = document.querySelectorAll('.alt');


listItems.forEach(li => {

  li.addEventListener('click', () => {

   
     document.querySelectorAll(".alt").forEach(x => x.className = "alt");

     li.classList.toggle('alt-background');
     

    // li.style.backgroundColor = "red";
  
  });
});


$('.list-group a').click(function () {
    var eid = $(this).attr("id");

    
    var $frm = $('#event-notify-form');
    //set the value of the hidden element
     $frm.find('input[name="CatId"]').val(eid);
    //submit the form
    // $frm.submit();
});


    // var a= document.getElementById('inputPane').value;

    // a = a.replace(/\s/g, "");

    // document.getElementById('inputPane').innerHTML = a;

	























							   

      