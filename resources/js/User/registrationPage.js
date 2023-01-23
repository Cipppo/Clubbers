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
            profilePicFile.style = 'display: none';
            picError.style = 'display: none';
            fileInputTag.style = 'display:none';
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
            profilePicFile.style = 'display:flex';
            fileInputTag.style = 'display: flex';
            nextButton.style = 'display: none';
    }
}

function validateMail(input) {

    var validRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  
    if (input.value.match(validRegex)) {  
        console.log("valido");
        return true;
    } else {
        return false;
    }
}

function checkPassword(pwd, confirmpwd){
    //Need to set styles in order to make the user understand what's happening
    if(pwd == confirmpwd && pwd != ""){
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
let propic = document.getElementById('propic');
let picError = document.getElementById('error-message');

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
let profilePicFile = document.getElementById('choose-file');
let propicPreview = document.getElementById('proPicPreview');
let fileInputTag = document.getElementById('FileInputLabel');

let submitButton = document.getElementById('sendall');
let nextButton = document.getElementById('next');

let regTitle = document.getElementById('regTitle');
let regDescription = document.getElementById('description');



function validateStep(step){
    let debug = 1;
    if(debug == 0){
        switch(step){
            case 1:
                if(firstName.value == "" || surname.value == ""){
                    return false;
                }else{
                    return true
                }
            case 2:
                if(birth.value == "" || city.value == ""){
                    return false;
                }else{
                    return true;
                }
            case 3:
                if((email.value == "" || phone.value == "")){
                    return false;
                }else{
                    return true;
                }
        }
    }else{
        return true;
    }
}

nextButton.addEventListener('click', function(e){
    if(validateStep(step)){
        step = step + 1;
        updateForm();
    }
});

email.addEventListener('keyup', function(e){
    validateMail(email);
});

confirmpassword.addEventListener('keyup', function(e){
    console.log(checkPassword(password.value, confirmpassword.value));
});



function validatePic(file){
    /*
    const fileReader = new FileReader();
    fileReader.readAsDataURL(file);
    fileReader.addEventListener("load", function(e){
        const image = new Image();
        image.src = e.target.result;
        image.addEventListener("load", function(e){
            const {height, width} = image;
            console.log(height);
            console.log(width);
            if(height <= 100 && width <= 100){
                const image = new Image();
                image.src = e.target.result
                propicPreview.style.display = "block";
                propicPreview.innerHTML = '<img src="' + this.result + '" />';
            }else{
                picError.style.display = "flex";
            }
        });
    });
    */
}


profilePicFile.addEventListener('change', function(e){



    const files = profilePicFile.files[0];
    let checkDim = validatePic(files);
    console.log(checkDim);
    //validateProPicSize(files);
    
    if(files){
        const fileReader = new FileReader();
        fileReader.readAsDataURL(files);
        fileReader.addEventListener("load", function(e){
            propicPreview.style.display = "block";
            propicPreview.innerHTML = '<img class="mt-8 content-center" id="propic" alt="Avatar" src="' + this.result + '" />';
        })
    }
    

});



updateForm()