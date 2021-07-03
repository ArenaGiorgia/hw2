let check;
//CONTROLLA SE IL CF è GIà PRESENTE NEL DB
function OnResponseCf(response)
{
    return response.json();

}
function OnJsonCf (json)
{
    console.log(json);
    check = json["exists"];
    console.log("check"+check);
}

function Check(event)
{
    const form = document.forms['login'];
    const token=document.querySelector('#csrf')
    fetch("login/CheckCred", {'method': 'POST','headers':{'X-CSRF-TOKEN': token.content }, 'body': new FormData(form)}).then(OnResponseCf).then(OnJsonCf);
}
function CheckTot(event){
    let errori=[];
    if(check===false)
    {
        event.preventDefault();
        errori.push("Credenziali non valide!Riprova inserendo le credenziali corrette!");
    }
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

document.forms['login'].addEventListener('submit', CheckTot);
document.forms['login']['cf'].addEventListener('blur',Check);
document.forms['login']['password'].addEventListener('blur',Check);
