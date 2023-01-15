let step = 1;



function updateForm(){
    switch(step){
        case 1:
            birth.style = 'display: none';
            birthTag.style = 'display: none';
            city.style = 'display: none';
            cityTag.style = 'display: none';
            email.style = 'display: none';
            emailTag.style = 'display: none';
            phone.style = 'display: none';
            phoneTag.style = 'display: none';
            password.style = 'display: none';
            passwordTag.style = 'display: none';
            confirmpassword.style = 'display: none';
            confirmPasswordTag.style = 'display: none';
            submitButton.style = 'display: none';
            break
        case 2:
            regTitle.innerHTML = "Some private data";
            regDescription.innerHTML = "Don't worry, we're not gonna sell it"
            firstName.style = 'display: none';
            firstNameTag.style = 'display: none';
            surname.style = 'display: none';
            surnameTag.style = 'display: none';
            birth.style = 'display:flex';
            birthTag.style = 'display:flex';
            city.style = 'display:flex';
            cityTag.style = 'display: flex';
            break
        case 3:
            regTitle.innerHTML = "How can we reach you ?";
            regDescription.innerHTML = "It sounds to be an optional field, it's not lol"
            birth.style = 'display: none';
            birthTag.style = 'display: none';
            city.style = 'display: none';
            cityTag.style = 'display: none';
            email.style = 'display: flex';
            emailTag.style = 'display: flex';
            phone.style = 'display: flex';
            phoneTag.style = 'display: flex';
            break
    }
}

let firstName = document.getElementById('name');
let surname = document.getElementById('surname');
let birth = document.getElementById('birth');
let city = document.getElementById('city');
let email = document.getElementById('email');
let phone = document.getElementById('phone');
let password = document.getElementById('password');
let confirmpassword = document.getElementById('confirm-password');

//Di base la struttura potrebbe essere: 
//1 Nome cognome -> Conosciamoci !
//2 Data di nascita e citta' di residenza -> Qualche dato personale
//3 Email e telefono -> Come possiamo raggiungerti ?
//4 Nome utente password e propic -> La tua identita' da Clubber !


let firstNameTag = document.getElementById('name-tag');
let surnameTag = document.getElementById('surname-tag');
let birthTag = document.getElementById('birth-tag');
let cityTag = document.getElementById('city-tag');
let emailTag = document.getElementById('mail-tag');
let phoneTag = document.getElementById('phone-tag');
let passwordTag = document.getElementById('password-tag');
let confirmPasswordTag = document.getElementById('confirm-password-tag');

let submitButton = document.getElementById('sendall');
let nextButton = document.getElementById('next');

let regTitle = document.getElementById('regTitle');
let regDescription = document.getElementById('description');




nextButton.addEventListener('click', function(e){
    step = step + 1;
    updateForm();
});

updateForm()