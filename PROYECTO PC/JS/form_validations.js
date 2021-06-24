const form = document.getElementById('registration-form');
const nombre = document.getElementById('form-name');
const lastname = document.getElementById('form-lastname');
const email = document.getElementById('form-email');
const password = document.getElementById('form-psw-1');
const password2 = document.getElementById('form-psw-2');
const termsAndCon = document.getElementById('terms-and-conditions');

form.addEventListener('submit', e => {
    if (checkInputs() == true) {
        e.preventDefault();
    }
});

function checkInputs() {
    const emailValue = email.value.trim();
    const nameValue = nombre.value.trim();
    const lastnameValue = lastname.value.trim();
    const passwordValue = password.value.trim();
    const passwordLength = password.value.length;
    const password2Value = password2.value.trim();
    var errores = false;
    let emailRegEx = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    let nameRegEx = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
	
    if(nameValue == '') {
        setErrorFor(nombre, 'Ingrese el Nombre');
        errores = true;
    } else if (!nameRegEx.test(nombre.value)) {
        setErrorFor(nombre, 'El nombre no es válido')
        errores = true
    } else {
        setSuccessFor(nombre);
    }

    if(lastnameValue == '') {
        setErrorFor(lastname, 'Ingrese el Apellido')
        errores = true;
    } else if (!nameRegEx.test(lastname.value)) {
        setErrorFor(lastname, 'El apellido no es válido')
        errores = true
    } else {
        setSuccessFor(lastname);
    }

	if(emailValue === '') {
        setErrorFor(email, 'Ingrese el E-Mail');
        errores = true;
    }else if (!emailRegEx.test(email.value)){
        setErrorFor(email, 'El email no es válido');
        errores = true;
	} else {
		setSuccessFor(email);
	}
	
	if(passwordValue === '') {
        setPswErrorFor (password, 'Ingrese una contraseña');
        errores = true;
    } else if (passwordLength < 6) {
        setPswErrorFor(password, 'La contraseña es muy corta.')
        errores = true
    } else if (passwordLength > 20) {
        setPswErrorFor(password, 'La contraseña es muy larga.')
        errores = true
	} else {
		setPswSuccessFor(password);
	}
	
	if(password2Value === '') {
        setPswErrorFor(password2, 'Repita la contraseña');
        errores = true;
	} else if (passwordValue !== password2Value) {
        setPswErrorFor(password2, 'Las contraseñas no coinciden');
        errores = true;
    } else if (passwordLength < 6) {
        setPswErrorFor(password, '')
        errores = true
    } else if (passwordLength > 20) {
        setPswErrorFor(password, '')
        errores = true
	} else {
		setPswSuccessFor(password2);
    }

    /*if (termsAndCon.checked === false) {
        setErrorFor(termsAndCon, 'error')
        errores = true;
    }*/

    return errores;
}

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-control error';
	small.innerText = message;
}

function setPswErrorFor(input, message) {
	const formControl = input.parentElement.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-control error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
    formControl.className = 'form-control success';
}

function setPswSuccessFor(input) {
	const formControl = input.parentElement.parentElement;
    formControl.className = 'form-control success';
}

function visibilityBtn_1() {
    if (password.type === 'password') {
        password.type = 'text';
    } else {
        password.type = 'password';
    }
}

function visibilityBtn_2() {
    if (password2.type === 'password') {
        password2.type = 'text';
    } else {
        password2.type = 'password';
    }
}