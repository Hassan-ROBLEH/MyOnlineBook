'use strict' // Mode strict du JavaScript

const addClass = 'col-12 m12 form-control success';

// Validator
function checkIfEmpty(field) {
    if(isEmpty(field.value.trim())) {
        setInvalid(field,  `${field.name.charAt(0).toUpperCase() + field.name.substr(1).toLowerCase()} ne peut pas être vide`);
        return true;
    } else {
        setValid(field);
        return false;
    }
}

function checkIfNoSelected(field) {
    if(isEmpty(field.options[field.selectedIndex].value)) {
        setInvalid(field, 'Veuillez selectionner une categorie dans la liste')
        return true;
    } else {
        setValid(field);
        return false;
    }
}

function isEmpty(value) {
    if(value === '') {
        return true;
    } else {
        return false;
    }
}

function setInvalid(input, message) {
    const formControl = input.parentElement;
    const small = formControl.querySelector('small');
    formControl.classList.add('error');
    formControl.classList.remove('success');
    small.innerText = message;
}

function setValid(input) {
    const formControl = input.parentElement;
    formControl.classList.remove('error');
    formControl.classList.add('success');
}

function checkIfOnlyLetters(field) {
    if(/[a-zA-Z]+$/.test(field.value) && field.value.length >= 2) {
        setValid(field)
        return true;
    } else {
        setInvalid(field, `${field.name} doit être uniquement de lettres et contenir au moins 2 caractères`);
        return false;
    }
}

function lengthC(field, min, max) {
    if(field.value.length >= min && field.value.length < max) {
        setValid(field);
        return true;
    } else if (field.value.length < min) {
        setInvalid(field, `${field.name} doit contenir au moins ${min} caractères`);
        return false;
    } else {
        setInvalid(field, `${field.name} doit comporter entre ${min} et ${max}`)
    }
}

function containsCharacters(field) {
    let regEx;
    regEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return matchWithRegEx(regEx, field, 'Veuillez saissir une adresse mail valide');
}

function matchWithRegEx(regEx, field, message) {
    if (field.value.match(regEx)) {
        setValid(field);
        return true;
    } else {
        setInvalid(field, message);
        return false;
    }
}