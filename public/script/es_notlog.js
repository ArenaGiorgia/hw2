fetch("esami/ShowEsami").then(OnResponseEsami).then(creazione_contenuti);

function OnResponseEsami(response) {
    return response.json();
}

function creazione_contenuti(json) {
    console.log(json);
    const length = json.length;
    for (let i = 0; i < length; i++) {

        const container = document.querySelector('#main');

        const div_container = document.createElement('div');
        div_container.dataset.id_tipologia = json[i].id_tipologia;

        const imm = document.createElement('img');
        const titolo = document.createElement('h4');
        const desc = document.createElement('p');
        const mostra_altro = document.createElement('h6');

        titolo.textContent = json[i].nome;
        div_container.dataset.titolo = json[i].nome;
        imm.src = json[i].img;
        desc.textContent = json[i].descrizione;
        mostra_altro.textContent = "dettagli";
        mostra_altro.addEventListener("click", mostraDettagli);

        desc.classList.add('hidden');


        imm.classList.add('immagini_principali');

        container.appendChild(div_container);

        div_container.appendChild(titolo);

        div_container.appendChild(imm);
        div_container.appendChild(desc);
        div_container.appendChild(mostra_altro);

    }

}
function ricercaElementi(event) {
    const elements = document.querySelectorAll("#main div h4");
    for (let elem of elements) {
        if (elem.textContent.toLowerCase().search(event.currentTarget.value.toLowerCase()) === -1) {

            elem.parentElement.classList.add('hidden');
        } else {
            if (elem.parentElement.classList.contains("hidden"))

                elem.parentElement.classList.remove("hidden");

        }

    }
}
function mostraDettagli(event) {

    const contenitore = event.currentTarget.parentNode.children;
    console.log(contenitore);
    if (event.currentTarget.textContent.toLowerCase() === "dettagli") {
        event.currentTarget.textContent = "nascondi";
        contenitore.item(2).classList.remove('hidden');
    } else {
        event.currentTarget.textContent = "dettagli";
        contenitore.item(2).classList.add('hidden');
    }
}

document.querySelector("#ric").addEventListener('keyup', ricercaElementi);
