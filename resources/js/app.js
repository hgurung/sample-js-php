const { default: axios } = require('axios');
require('./bootstrap');
// Dom elements
const errorsDiv = document.querySelector('.errors');
const successDiv = document.querySelector('.success');
const form = document.getElementById('createPostForm');
let formSubmit = function(e) {
    e.preventDefault();
    removeErrorAndSuccessDiv();
    let id = document.getElementById('id').value;
    let value = document.getElementById('value').value;
    let crsfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    axios.post('/store', {
        "_token": crsfToken,
        id,
        value,
    }).then(function(response) {
        handleSuccessMessage(response.data);
    }).catch(function (error) {
        handleErrors(error);
    });
}
// Form submit listener events
if (form) {
    form.addEventListener('submit', formSubmit);
}
// Handle Errors
function handleErrors(error) {
    let div = document.createElement('div');
    div.className = 'alert alert-danger';
    let errorString = '';
    if (error.response && error.response.status === 422) {
        for (const [key, value] of Object.entries(error.response.data.errors)) {
            errorString += `<p class="error-text">${value}</p>`;
        }
    } else {
        errorString += '<p class="error-text">Internal Server Error. Please try again.</p>';
    }
    div.innerHTML = errorString;
    errorsDiv.appendChild(div);
}
// Succes response message
function handleSuccessMessage(response) {
    let pElement = document.createElement('p');
    pElement.className = 'alert alert-success';
    pElement.innerHTML = `Successfully stored ID: ${response.data.id} and Value: ${response.data.value}`;
    successDiv.appendChild(pElement);
    form.reset();
}

// Removing if success message and error message after submit button clicked
function removeErrorAndSuccessDiv() {
    errorsDiv.innerHTML = '';
    successDiv.innerHTML = '';
}
// For changing class + Get datasets from dom elements
const navbarElement = document.getElementsByClassName("navbar-menu");
const changeClass = function() {
    const className = this.getAttribute("data-class-name");
    document.getElementById("navBar").className = `navbar navbar-expand-lg navbar-light ${className}`;
};
Array.from(navbarElement).forEach(function(element) {
    element.addEventListener('click', changeClass, false);
});

// Copy to clipboard
const copyBtnElement = document.getElementsByClassName("copy-btn");
const copyToClipboard = function() {
    const rowData = this.getAttribute("data-data");
    let textArea = document.createElement("textarea");
    textArea.value = rowData;
    // Avoid scrolling to bottom
    textArea.style.top = "0";
    textArea.style.left = "0";
    textArea.style.position = "fixed";
    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();
    try {
        let successful = document.execCommand('copy');
        let msg = successful ? 'successful' : 'unsuccessful';
        console.log('Fallback: Copying text command was ' + msg);
    } catch (err) {
        console.error('Fallback: Oops, unable to copy', err);
    }
    document.body.removeChild(textArea);
};
Array.from(copyBtnElement).forEach(function(element) {
    element.addEventListener('click', copyToClipboard, false);
});