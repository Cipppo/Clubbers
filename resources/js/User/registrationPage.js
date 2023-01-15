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
            username.style = 'display: none';
            usernameTag.style = 'display: none';
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
            nextButton.innerHTML = "Alright, let's go on!"
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
            nextButton.innerHTML = "And now ?"
            break
        case 4:
            regTitle.innerHTML = "Your Clubbers Identity"
            regDescription.innerHTML = "This is your last step to enter the Clubbers world!"
            email.style = 'display: none';
            emailTag.style = 'display: none';
            phone.style = 'display: none';
            phoneTag.style = 'display: none';
            username.style = 'display: flex';
            usernameTag.style = 'display: flex';
            password.style = 'display: flex';
            passwordTag.style = 'display: flex';
            confirmPasswordTag.style = 'display: flex';
            confirmpassword.style = 'display: flex';
            submitButton.style = 'display: flex';
            nextButton.style = 'display: none';
    }
}

function validateMail(input) {

    var validRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  
    if (input.value.match(validRegex)) {  
        return true;
    } else {
        //Need to fix that 
        nextButton.disable = true;
        return false;
    }
}

function checkPassword(pwd, confirmpwd){
    //Need to set styles in order to make the user understand what's happening
    if(pwd == confirmpwd){
        return true;
    }else{
        return false;
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
let username = document.getElementById('username');

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
let usernameTag = document.getElementById('username-tag');

let submitButton = document.getElementById('sendall');
let nextButton = document.getElementById('next');

let regTitle = document.getElementById('regTitle');
let regDescription = document.getElementById('description');




nextButton.addEventListener('click', function(e){
    step = step + 1;
    updateForm();
});

email.addEventListener('keyup', function(e){
    validateMail(email);
});

confirmpassword.addEventListener('keyup', function(e){
    console.log(checkPassword(password.value, confirmpassword.value));
})


updateForm()