document.addEventListener('DOMContentLoaded', function() {
    const roundTripRadio = document.getElementById('roundTrip');
    const oneWayRadio = document.getElementById('oneWay');
    const returnDateInput = document.getElementById('return');

    roundTripRadio.addEventListener('change', function() {
        returnDateInput.disabled = false;
    });

    oneWayRadio.addEventListener('change', function() {
        returnDateInput.disabled = true;
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const slideTrack = document.querySelector('.slide-track');
    const slides = document.querySelectorAll('.slide');

    slides.forEach(slide => {
        const clone = slide.cloneNode(true);
        slideTrack.appendChild(clone);
    });

    const totalSlides = slides.length;
    slideTrack.style.width = `${1000 * totalSlides * 2}px`; // Double the width to include clones

    const scroll = new LocomotiveScroll({
        el: document.querySelector('[data-scroll-container]'),
        smooth: true,
        lerp : 0.1
    });

    scroll.update();
    document.onreadystatechange = function () {
        if (document.readyState === 'complete') {
            setTimeout(function() {
                document.getElementById('load').style.display = "none";
                document.getElementById('contents').style.visibility = "visible";
            }, 2400);
        }
    };
    var typed = new Typed(".auto-type",{
        strings:["Cheapest" , "Fastest" ],
        typeSpeed: 140,
        backSpeed:160,
        loop:true
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const cities = ["Mumbai", "Delhi", "Bangalore", "Kolkata", "Chennai", "Hyderabad", "Jamnagar", "Pune", "Ahmedabad", "Goa", "Surat", "Vadodara", "Jaipur", "Lucknow", "Indore", "Nagpur", "Patna", "Bhopal", "Coimbatore", "Vijayawada", "Visakhapatnam", "Guwahati", "Mangalore", "Trivandrum", "Madurai", "Rajkot", "Udaipur", "Varanasi", "Raipur", "Chandigarh", "Dehradun"];
    
    const originInput = document.getElementById('origin');
    const destinationInput = document.getElementById('destination');
    
    const originSuggestions = document.getElementById('origin-suggestions');
    const destinationSuggestions = document.getElementById('destination-suggestions');
    
    function filterCities(inputValue) {
        return cities.filter(city => city.toLowerCase().startsWith(inputValue.toLowerCase()));
    }

    function showSuggestions(inputElement, suggestionsElement, filteredCities) {
        suggestionsElement.innerHTML = '';
        if (filteredCities.length === 0) {
            suggestionsElement.style.display = 'none';
            return;
        }
        filteredCities.forEach(city => {
            const div = document.createElement('div');
            div.classList.add('suggestion-item');
            div.textContent = city;
            div.addEventListener('click', function() {
                inputElement.value = city;
                suggestionsElement.style.display = 'none';
            });
            suggestionsElement.appendChild(div);
        });
        suggestionsElement.style.display = 'block';
    }

    originInput.addEventListener('input', function() {
        const inputValue = originInput.value;
        const filteredCities = filterCities(inputValue);
        showSuggestions(originInput, originSuggestions, filteredCities);
    });

    destinationInput.addEventListener('input', function() {
        const inputValue = destinationInput.value;
        const filteredCities = filterCities(inputValue);
        showSuggestions(destinationInput, destinationSuggestions, filteredCities);
    });

    // Hide suggestions when clicking outside
    document.addEventListener('click', function(event) {
        if (!originSuggestions.contains(event.target) && !originInput.contains(event.target)) {
            originSuggestions.style.display = 'none';
        }
        if (!destinationSuggestions.contains(event.target) && !destinationInput.contains(event.target)) {
            destinationSuggestions.style.display = 'none';
        }
    });
});



