
let zipCodeField = document.getElementById('zipcode');
let resultsContainer = document.getElementById('results-container');
let zoneFinder = document.getElementById('zone-finder');
var typingTimer = null;
var activated = false;

async function fetchZone(zip) {
    let response = await fetch(`https://phzmapi.org/${zip}.json`);
    let results = await response.json();

    return results;
}

async function displaySpinner() {
    resultsContainer.innerHTML = `
        <div class="card">
            <div class="card-body" id='results-container'>
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>`;
}

async function displayError() {
    resultsContainer.innerHTML = `
        <div class="alert alert-warning" role="alert">
        Please enter a valid zip code.
        </div>
    `;
}

async function displayZone(zone) {
    let element = `
        <div class="card">
            <div class="card-body" id='results-container'>
                <h5 class="card-title">Your Growing Zone</h5>
                <div class="row">
                    <div class="col text-end">Zone:</div>
                    <div class="col text-start fw-bold">${zone.zone}</div>
                </div>
                <div class="row">
                    <div class="col text-end">Temp Range:</div>
                    <div class="col text-start fw-bold">${zone.temperature_range}</div>
                </div>
                <div class="row">
                    <div class="col text-end">Latitude:</div>
                    <div class="col text-start fw-bold">${zone.coordinates.lat}</div>
                </div>
                <div class="row">
                    <div class="col text-end">Longitude:</div>
                    <div class="col text-start fw-bold">${zone.coordinates.lon}</div>
                </div>
            </div>
        </div>`;

    resultsContainer.innerHTML = element;
}

async function getResults() {

    if (!activated) {
        zoneFinder.classList.add('activated');
    }

    await displaySpinner();

    let zipCode = zipCodeField.value;
    const zipCodeRegex = /^\d{5}$/;

    if (zipCodeRegex.test(zipCode)) {
        try {
            let result = await fetchZone(zipCode);
            displayZone(result);
        } catch(e) {
            console.error(e);
            displayError();
        }
    } else {
        displayError();
    }
}

zipCodeField.addEventListener('click', (e) => {
    e.target.select();
});

zipCodeField.addEventListener('keydown', async () => {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(async () => await getResults(), 750);
});


