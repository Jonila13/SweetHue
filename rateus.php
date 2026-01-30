<?php
include_once 'Database.php';
include_once 'reviews.php';

$db = new Database();
$conn = $db->getConnection();
$reviewsObj = new Reviews($conn);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $stars = intval($_POST['rating'] ?? 0);
    $feedback = trim($_POST['feedback'] ?? '');

    if ($stars < 1 || $stars > 5 || empty($feedback)) {
        echo "invalid";
        exit;
    }

    echo $reviewsObj->addReview($stars, $feedback) ? "success" : "error";
    exit;
}

if (isset($_GET['action']) && $_GET['action'] === 'getReviews') {
    header('Content-Type: application/json');
    echo json_encode($reviewsObj->getReviews());
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>SweetHue | Rate Us</title>

<link rel="stylesheet" href="rateUs.css">
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container">
    <h1>Rate SweetHue ⭐</h1>
    <p class="subtitle">Tell us how sweet your experience was?</p>

    <div class="rate-box">
        <div class="stars">
            <span data-value="1">★</span>
            <span data-value="2">★</span>
            <span data-value="3">★</span>
            <span data-value="4">★</span>
            <span data-value="5">★</span>
        </div>

        <textarea id="feedback" placeholder="Leave your feedback here..."></textarea>
        <button id="submitBtn">Submit Feedback</button>
    </div>

    <div id="reviews" class="reviews"></div>
</div>

<script>
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

function loadReviews() {
    fetch("rateUs.php?action=getReviews")
        .then(res => res.json())
        .then(data => {
            const reviewsDiv = document.getElementById("reviews");
            reviewsDiv.innerHTML = "";

            data.forEach(r => {
                const div = document.createElement("div");
                div.className = "review";
                div.innerHTML = `
                    <strong>⭐ ${r.stars}/5</strong>
                    <p>${r.feedback}</p>
                    <small>${r.created_at}</small>
                `;
                reviewsDiv.appendChild(div);
            });
        });
}

loadReviews();

button.addEventListener("click", () => {
    const feedback = document.getElementById("feedback").value.trim();

    if (selectedRating === 0 || feedback === "") {
        alert("Please select stars and write feedback!");
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
            document.getElementById("feedback").value = "";
            selectedRating = 0;
            stars.forEach(s => s.classList.remove("active"));
            loadReviews();
        } else {
            alert("Server response: " + data);
        }
    });
});
</script>

</body>
</html>
