document.addEventListener("DOMContentLoaded", function() {
    const reservationForm = document.getElementById("reservation-form");
    reservationForm.addEventListener("submit", function(event) {
        event.preventDefault();
        const formData = new FormData(reservationForm);
        const startDate = formData.get("start_date");
        const endDate = formData.get("end_date");
        const carId = formData.get("car_id");

        if (startDate && endDate && carId) {
            // Make AJAX request to handle reservation
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "reservation.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            alert("Reservation successful!");
                            window.location.href = "index.php";
                        } else {
                            alert("Reservation failed. Please try again later.");
                        }
                    } else {
                        alert("Reservation failed. Please try again later.");
                    }
                }
            };
            xhr.send(`start_date=${startDate}&end_date=${endDate}&car_id=${carId}`);
        } else {
            alert("Please fill in all required fields.");
        }
    });
});
