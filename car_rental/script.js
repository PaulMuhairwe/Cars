document.addEventListener("DOMContentLoaded", function() {
    loadCarList();
});

function loadCarList() {
    const carListContainer = document.getElementById("car-list");
    carListContainer.innerHTML = "<p>Loading...</p>";

    // Make AJAX request to fetch car data
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "get_cars.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                const cars = JSON.parse(xhr.responseText);
                displayCars(cars);
            } else {
                carListContainer.innerHTML = "<p>Error loading cars</p>";
            }
        }
    };
    xhr.send();
}

function displayCars(cars) {
    const carListContainer = document.getElementById("car-list");
    carListContainer.innerHTML = "";
    cars.forEach(function(car) {
        const carItem = document.createElement("div");
        carItem.classList.add("car-item");
        carItem.innerHTML = `
            <h3>${car.brand} ${car.model}</h3>
            <p>Year: ${car.year}</p>
            <p>Price per Day: $${car.price_per_day}</p>
            <button onclick="reserveCar(${car.car_id})">Reserve</button>
        `;
        carListContainer.appendChild(carItem);
    });
}

function reserveCar(carId) {
    window.location.href = `reservation.php?car_id=${carId}`;
}
