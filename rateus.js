let selectedRating = 0;
const stars = document.querySelectorAll(".stars span");
const button = document.getElementById("submitBtn");

stars.forEach(star => {
    star.addEventListener("click", () => {
        selectedRating = parseInt(star.dataset.value);

        stars.forEach(s => s.classList.remove("active"));
        for (let i = 0; i < selectedRating; i++) {
            stars[i].classList.add("active");
        }
    });
});

button.addEventListener("click", () => {
    const feedback = document.getElementById("feedback").value.trim();

    if (selectedRating === 0 || feedback === "") {
        alert("Select stars and write feedback!");
        return;
    }

    const formData = new FormData();
    formData.append("rating", selectedRating);
    formData.append("feedback", feedback);

    fetch("rateUs.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.text())
    .then(data => {
        data = data.trim(); 
        if (data === "success") {
            alert("Thank you for your feedback ❤️");

            document.getElementById("feedback").value = "";
            selectedRating = 0;
            stars.forEach(s => s.classList.remove("active"));
        } else {
            alert("Server response: " + data);
        }
    });
});