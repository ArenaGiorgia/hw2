//TODO:VALIDAZIONE DEL FORM

let checkcf;
//CONTROLLA SE IL CF è GIà PRESENTE NEL DB
function OnResponseCf(response)
{
    return response.json();

}
function OnJsonCf (json)
{
    console.log(json);
    checkcf = json["exists"];
    console.log("check"+checkcf);
}

function CheckIfExistCf(event)
{
    const form = document.forms['registrazione'];
    const token=document.querySelector('#csrf')
    fetch("registrazione/CheckCf", {'method': 'POST','headers':{'X-CSRF-TOKEN': token.content }, 'body': new FormData(form)}).then(OnResponseCf).then(OnJsonCf);
}

function CheckSignUp(event) {
    //DICHIARAZIONE DEL VETTORE DEGLI ERRORI
    let errori = [];
    //VALIDAZIONE DEL NOME E COGNOME
    const nome = document.querySelector('.nome input');
    const cognome = document.querySelector('.cognome input');
    if (!/^[a-zA-Z]+$/.test(nome.value)) {
        event.preventDefault();
        nome.classList.add('error');
        errori.push("Nome non valido");

    } else {
        nome.classList.remove('error');
    }
    if (!/^[a-zA-Z]+$/.test(cognome.value)) {
        event.preventDefault();
        cognome.classList.add('error');
        errori.push("Cognome non valido");
    } else {
        cognome.classList.remove('error');
    }
    //VALIDAZIONE DEL EMAIL
    const email = document.querySelector('.email input');
    console.log(email);
    if (!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email.value)) {
        event.preventDefault();
        email.classList.add('error');
        errori.push("Email non valida");
    } else {
        email.classList.remove('error');
    }
    //VALIDAZIONE DEL CF
    const cf = document.querySelector('.cf input');
    console.log(cf.value.length);
    console.log("nel submit" + checkcf);
// /^[A-Z]{6}\d{2}[A-Z]\d{2}[A-Z]\d{3}[A-Z]$/i QUESTA è LA REGEX PER IL CODICE FISCALE

    if (!/^[A-Z]{6}\d{2}[A-Z]\d{2}[A-Z]\d{3}[A-Z]$/i.test(cf.value)) {
        event.preventDefault();
        cf.classList.add('error');
        errori.push("Cf non valido deve essere di 16 caratteri  es: MRARSS80A01C351N");
    }
    else if(checkcf===true)
    {
        event.preventDefault();
        cf.classList.add('error');
        errori.push("Cf già in uso!");
    }
    else {
        cf.classList.remove('error');
    }
    //VALIDAZIONE PASSWORD
    const password = document.querySelector('.password input');
    const r_password = document.querySelector('.confirm_password input');
    if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/.test(password.value)) {
        event.preventDefault();
        console.log("scritta male");
        password.classList.add('error');
        r_password.classList.add('error');
        errori.push("La password deve contenere almeno un carattere minuscolo almeno uno maiuscolo almeno un numero e deve essere almeno di 8 caratteri");
    } else {
        password.classList.remove('error');
        r_password.classList.remove('error');
    }
    if (r_password.value !== password.value) {
        event.preventDefault();
        console.log("le pass sono !=")
        r_password.classList.add('error');
        errori.push("Le due password non corrispondo");
    } else {
        r_password.classList.remove('error');

    }
//VALIDAZIONE DEL RADIO
    const genere = document.querySelectorAll('.genere input');
    const span = document.querySelector('.genere span');
    let show = true;
    span.classList.add("hidden");
    for (gen of genere) {
        console.log(gen);
        if (gen.checked) {

            show = false;

        }
    }
    if (show) {
        event.preventDefault();
        span.classList.remove('hidden');
        errori.push("Attenzione, seleziona un campo M o F");
    }



//STAMPA DEGLI ERRORI
    if (errori) {
        const div =document.querySelector('#error_display');
        console.log(div);
        div.innerHTML = "";
        for (let err of errori) {

            console.log(err);
            const p = document.createElement('li');
            p.textContent = err;
            div.appendChild(p);
        }
        div.classList.remove("hidden");

    }

}


document.forms['registrazione'].addEventListener('submit', CheckSignUp);
document.forms['registrazione']['cf'].addEventListener('blur',CheckIfExistCf);
