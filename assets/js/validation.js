'use strict'; // Mode strict du javaScript

// Menu responsive
const menu = document.getElementById('menu');
const menuIcon = document.querySelector(".menu-icon");
const overlay =  document.querySelector(".overlay");

// Input field
const email = document.getElementById('email');
const password = document.getElementById('password');
const firstName = document.getElementById('firstname');
const lastName = document.getElementById('name');

const name = document.getElementById("name");
const author = document.getElementById("author");
const description = document.getElementById("description");
const date = document.getElementById("date");
const category = document.getElementById("category");
const fileImage = document.getElementById("image");
const filePDF = document.getElementById("file");

// Form
const form = document.getElementById('form');
const loginForm = document.getElementById('login-form');
const addForm = document.getElementById('addBook');

function addMenu(e) {
    e.preventDefault();
    overlay.style.display = 'block';
    menu.classList.add('menu-show');
}

function removeMenu(e) {
    e.preventDefault();
    overlay.style.display = 'none';
    menu.classList.remove('menu-show');
}

// handle form
function validateEmail() {
    if(checkIfEmpty(email)) return;
    if(!containsCharacters(email)) return;
    return true;
}

function validatePassword() {
    if (checkIfEmpty(password)) return;
    if (!lengthC(password, 4, 12)) return;
    return true;
}

function validateFirstName() {
    if (checkIfEmpty(firstName)) return;
    if (!checkIfOnlyLetters(firstName)) return;
    return true;
}

function validateLastName() {
    if (checkIfEmpty(lastName)) return;
    if (!checkIfOnlyLetters(lastName)) return;
    return true;
}

function validateName() {
    if (checkIfEmpty(name)) return;
    if (!checkIfOnlyLetters(name)) return;
    return true;
}

function validateAuthor() {
    if (checkIfEmpty(author)) return;
    if (!checkIfOnlyLetters(author)) return;
    return true;
}

function validateCategory() {
    if (checkIfNoSelected(category)) return;
    return true;
}

function validateDate() {
    if (checkIfEmpty(date)) return;
    return true;
}

function validateDescription() {
    if (checkIfEmpty(description)) return;
    if (!checkIfOnlyLetters(description)) return;
    return true;
}

function validateFileImage() {
    if (checkIfEmpty(fileImage)) return;
    if (!checkIfOnlyLetters(fileImage)) return;
    return true;
}

function validateFilePDF() {
    if (checkIfEmpty(filePDF)) return;
    if (!checkIfOnlyLetters(filePDF)) return;
    return true;
}

/*************************************************************************************************/
/* ************************************** CODE PRINCIPAL *************************************** */
/*************************************************************************************************/
window.addEventListener('DOMContentLoaded', function () {

    menuIcon.addEventListener('click', addMenu);
    overlay.addEventListener('click', removeMenu);

    if(form) {
        email.addEventListener('keyup', validateEmail);
        password.addEventListener('keyup', validatePassword);
        firstName.addEventListener('keyup', validateFirstName);
        lastName.addEventListener('keyup', validateLastName);

        form.addEventListener('submit', function (event) {
            event.preventDefault();
            if (validateEmail() && validatePassword() && validateFirstName() && validateLastName()) {
                event.target.submit();
            }
        });
    } else if(loginForm) {
        email.addEventListener('keyup', validateEmail);
        password.addEventListener('keyup', validatePassword);

        loginForm.addEventListener('submit', function (event) {
            event.preventDefault();
            if(validateEmail() && validatePassword()) {
                event.target.submit();
            }

        });
    } else if(addForm) {
        name.addEventListener('keyup', validateName);
        author.addEventListener('keyup', validateAuthor);
        category.addEventListener('change', validateCategory);
        date.addEventListener('keyup', validateDate);
        description.addEventListener('keyup', validateDescription);
        fileImage.addEventListener('change', validateFileImage);
        filePDF.addEventListener('change', validateFilePDF);

        addForm.addEventListener('submit', function (event) {
            event.preventDefault();
            if(validateName() && validateAuthor() && validateCategory() && validateDate()
                && validateDescription() && validateFileImage() && validateFileImage()) {
                event.target.submit();
            }
        });
    } /*else {
        menuIcon.addEventListener('click', addMenu);
        overlay.addEventListener('click', removeMenu);
    }*/
})








