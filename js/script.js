document.getElementById("loginForm").addEventListener("submit", function (e) {
  e.preventDefault(); // Prevent default GET submission

  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;

  // Create a FormData object
  const formData = new FormData();
  formData.append("username", username);
  formData.append("password", password);

  // Send POST request
  fetch("php/auth.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        window.location.href = data.redirect; // Redirect to dashboard
      } else {
        alert(data.message || "Login failed");
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      alert("An error occurred. Please try again.");
    });
});
