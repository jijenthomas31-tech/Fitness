document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById("toggleBtn");
    const navLinks = document.getElementById("navLinks");
    const toggleIcon = toggleBtn.querySelector("i");

    toggleBtn.addEventListener("click", function () {
        navLinks.classList.toggle("active"); 
        toggleIcon.classList.toggle("fa-bars"); 
        toggleIcon.classList.toggle("fa-xmark"); 
    });
});


function calculateBMI() {
            let weight = document.getElementById("weight").value;
            let height = document.getElementById("height").value;
            
            if (weight === "" || height === "") {
                document.getElementById("result").innerHTML = "Please enter valid values";
                return;
            }
            
            let bmi = weight / ((height / 100) * (height / 100));
            let category = "";
            
            if (bmi < 18.5) {
                category = "Underweight";
            } else if (bmi >= 18.5 && bmi < 24.9) {
                category = "Normal weight";
            } else if (bmi >= 25 && bmi < 29.9) {
                category = "Overweight";
            } else {
                category = "Obese";
            }
            
            document.getElementById("result").innerHTML = `BMI: ${bmi.toFixed(2)} - ${category}`;
        }



 (function () {
        const userLoggedIn = sessionStorage.getItem("loggedIn");
        const restrictedPages = ["workout.html", "feedback.html", "bmi.html"];
        const currentPage = window.location.pathname.split("/").pop();

        if (!userLoggedIn && restrictedPages.includes(currentPage)) {
            window.location.replace("signup.php");
        }
    })();