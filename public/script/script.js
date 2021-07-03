//creazione dei contenuti
fetch("esami/ShowEsami").then(OnResponseEsami).then(creazione_contenuti);

function OnResponseEsami(response) {
    return response.json();
}

function creazione_contenuti(json) {
    const length = json.length;
    for (let i = 0; i < length; i++) {

        const container = document.querySelector('#main');

        const div_container = document.createElement('div');
        div_container.dataset.id_tipologia = json[i].id_tipologia;

        const imm = document.createElement('img');
        const titolo = document.createElement('h4');
        const desc = document.createElement('p');
        const mostra_altro = document.createElement('h6');
        const icona = document.createElement('img')

        titolo.textContent = json[i].nome;
        div_container.dataset.titolo = json[i].nome;
        imm.src = json[i].img;
        desc.textContent = json[i].descrizione;
        mostra_altro.textContent = "dettagli";
        mostra_altro.addEventListener("click", mostraDettagli);
        icona.src = "img/outline_add_black_24dp.png"
        icona.addEventListener("click", aggiungiPreferiti);
        desc.classList.add('hidden');

        icona.classList.add('icona');
        imm.classList.add('immagini_principali');

        container.appendChild(div_container);

        div_container.appendChild(titolo);
        div_container.appendChild(icona);
        div_container.appendChild(imm);
        div_container.appendChild(desc);
        div_container.appendChild(mostra_altro);

    }

}


//TODO::FUNZIONE CHE MOSTRA I DETTAGLI
function mostraDettagli(event) {

    const contenitore = event.currentTarget.parentNode.children;
    if (event.currentTarget.textContent.toLowerCase() === "dettagli") {
        event.currentTarget.textContent = "nascondi";
        contenitore.item(3).classList.remove('hidden');
    } else {
        event.currentTarget.textContent = "dettagli";
        contenitore.item(3).classList.add('hidden');
    }
}


//TODO::FUNZIONE CHE MOSTRA I PREFERITI

function aggiungiPreferiti(event) {
    const notchoosed="http://localhost/hw2/public/img/outline_add_black_24dp.png";
    const choosed = "http://localhost/hw2/public/img/outline_remove_black_24dp.png";
    const container = event.currentTarget.parentNode;
    if (event.currentTarget.src === notchoosed) {
        const preferiti = document.querySelector('#preferiti');
        preferiti.classList.remove('hidden');
        container.querySelector('.icona').src = choosed;
        preferiti.appendChild(container);
        const elementi = event.currentTarget.parentNode.parentNode.parentNode.children;
        console.log(elementi);
        elementi.item(1).classList.remove('hidden');
        elementi.item(2).classList.remove('hidden');
        elementi.item(3).classList.remove('hidden');
        if (document.querySelector('#main').children.length === 0) {
            elementi.item(4).classList.add('hidden');
            elementi.item(5).classList.add('hidden');
        }
    } else if (event.currentTarget.src === choosed) {
        const main = document.querySelector('#main');
        container.querySelector('.icona').src = notchoosed;
        main.appendChild(container);
        const elementi = event.currentTarget.parentNode.parentNode.parentNode.children;
        elementi.item(4).classList.remove('hidden');
        elementi.item(5).classList.remove('hidden');
        if (document.querySelector('#preferiti').children.length === 0) {
            elementi.item(1).classList.add('hidden');
            elementi.item(2).classList.add('hidden');
            elementi.item(3).classList.add('hidden');
        }
    }
}

//funzione ricerca contenuti

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

function aggiungiPrenotazioni(event) {
    let array = [];

    const preferiti = document.querySelectorAll('#preferiti div');
    for (let i = 0; i < preferiti.length; i++) {
        const id = preferiti[i].dataset.id_tipologia;
        const nome = preferiti[i].dataset.titolo;
        array.push({

                "id_tipologia": id,
                "nome": nome
            }
        );
    }
    let json = JSON.stringify(array);
    json = btoa(json);
    fetch("prenotazioni/addPrenotazioni?json=" + json).then(promise => promise.json()).then(json => {
        location.assign(json)
    });
}

document.querySelector("#ric").addEventListener('keyup', ricercaElementi);
document.querySelector("#prenota").addEventListener('click', aggiungiPrenotazioni);
