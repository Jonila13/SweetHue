const stars = document.querySelectorAll(".stars span");
const button = document.getElementById("submitBtn");
let selectedRating = 0;

stars.forEach(star => {
    star.addEventListener("click", () => {
        selectedRating = star.getAttribute("data-value");
        stars.forEach(s => s.classList.remove("active"));
        for (let i = 0; i < selectedRating; i++) {
            stars[i].classList.add("active");
        }
    });
});

button.addEventListener("click", () => {
    const feedback = document.getElementById("feedback").value;

    if (selectedRating === 0 || feedback === "") {
        alert("Please select a rating and write feedback!");
        return;
    }

    const review = document.createElement("div");
    review.className = "review";
    review.innerHTML = `⭐ ${selectedRating}/5<p>${feedback}</p>`;

    document.getElementById("reviews").prepend(review);

    document.getElementById("feedback").value = "";
    selectedRating = 0;
    stars.forEach(s => s.classList.remove("active"));
});