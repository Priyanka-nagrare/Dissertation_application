let slideIndex = 0;
showSlides();

function showSlides() {
    const slides = document.querySelectorAll(".slide");
    for (const slide of slides) {
        slide.style.opacity = "0";
        slide.style.visibility = "hidden";
    }
    slideIndex++;
    if (slideIndex > slides.length) { slideIndex = 1; }
    slides[slideIndex - 1].style.opacity = "1";
    slides[slideIndex - 1].style.visibility = "visible";
    setTimeout(showSlides, 3000); // Change image every 3 seconds
}
document.querySelector('.prev').addEventListener('click', () => changeSlide(-1));
document.querySelector('.next').addEventListener('click', () => changeSlide(1));

function changeSlide(n) {
    slideIndex += n - 1;
    showSlides();
}

// JavaScript to handle theme switching
document.addEventListener('DOMContentLoaded', function () {
    const checkbox = document.getElementById('checkbox');
    const videoSource = document.getElementById('videoSource'); // Get the video source element

    checkbox.addEventListener('change', function(event) {
        if (event.target.checked) {
            document.documentElement.style.setProperty('--bg-color', '#1d1d21');
            document.documentElement.style.setProperty('--text-color', '#ffffff');
            document.documentElement.style.setProperty('--link-color', '#ff8c00');
            document.documentElement.style.setProperty('--span-color', '#4d998f');
            videoSource.src = "/KF7029-test/assets/images/black.mp4"; // Set source to black video
        } else {
            document.documentElement.style.setProperty('--bg-color', '#ffffff');
            document.documentElement.style.setProperty('--text-color', '#000000');
            document.documentElement.style.setProperty('--link-color', '#bad47f');
            document.documentElement.style.setProperty('--span-color', '#808080');
            videoSource.src = "/KF7029-test/assets/images/white.mp4"; // Set source to white video
        }
        videoSource.parentNode.load(); // Reload the video element to update the source
    });
});

function switchTab(tabNumber) {
    const tabContents = document.querySelectorAll(".hometab-content");
    tabContents.forEach(function(content) {
        content.style.display = "none";
    });

    document.getElementById("hometab-content-" + tabNumber).style.display = "block";
}

switchTab(1); // Initialize first tab open  {HOME PAGE TILL HERE DO NOT DISTURB THE ABOVE (WARNING FOR MYSELF)}

const toggleBtn =document.querySelector('.toggle_btn')
const toggleBtnIcon =document.querySelector('.toggle_btn i')
const dropDownMenu =document.querySelector('.dropdown_menu')

toggleBtn.onclick = function(){
  dropDownMenu.classList.toggle('open')
  const isOpen = dropDownMenu.classList.contains('open')

  toggleBtnIcon.classList = isOpen
  ? 'fa-solid fa-xmark'
  : 'fa-solid fa-bars'
}