fetch("chisiamo/Chisiamo").then(OnReStaff).then(OnJsonStaff);


function OnReStaff(response) {
    return response.json();

}

function OnJsonStaff(json) {
    console.log(json);
    const length = json.length;
    for (let i = 0; i < length; i++) {
        const main = document.querySelector("#main");
        const div = document.createElement("div");
        const img= document.createElement("img");
        const nome=document.createElement("h1");
        const ruolo=document.createElement("h2");
        const tel=document.createElement("p");
        img.src=json[i].immagine;
        img.classList.add('immagini_principali');
        nome.textContent=json[i].nomecmp;
        ruolo.textContent=json[i].ruolo;
        ruolo.classList.add('sed');
        tel.textContent=json[i].ntel;
        div.appendChild(img);
        div.appendChild(nome);
        div.appendChild(ruolo);
        div.appendChild(tel);
        main.appendChild(div);

    }
}
