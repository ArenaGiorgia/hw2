let isRefresh = false;

fetch("prenotazioni/ElencoPrenotazione").then(OnResponsePre).then(OnJsonPre);

function OnResponsePre(response) {
    return response.json();
}

function OnJsonPre(json) {
    console.log(json);
    const table = document.createElement('table');
    if (!isRefresh) table.classList.add('hidden');
    document.querySelector("#aprielenco").addEventListener('click', MostraTabella);
    const rigatitoli = document.createElement('tr');
    const esami = document.createElement('th');
    const prenotazione = document.createElement('th');
    const descrizione = document.createElement('th');
    esami.textContent = "ESAMI";
    prenotazione.textContent = "DATA PRENOTAZIONE";
    descrizione.textContent = "DESCRIZIONE";
    rigatitoli.appendChild(esami);
    rigatitoli.appendChild(prenotazione);
    rigatitoli.appendChild(descrizione);
    table.appendChild(rigatitoli);
    const length = json.length;
    for (let i = 0; i < length; i++) {
        const container = document.querySelector('#main');
        const rigatabella = document.createElement('tr');
        const cella1 = document.createElement('td');
        const cella2 = document.createElement('td');
        const cella3 = document.createElement('td');
        cella1.textContent = json[i].nome;
        cella2.textContent = json[i]["pivot"].dataprenotazione;
        cella3.textContent = json[i].descrizione;

        rigatabella.appendChild(cella1);
        rigatabella.appendChild(cella2);
        rigatabella.appendChild(cella3);
        table.appendChild(rigatabella);
        container.appendChild(table);


    }


}

function MostraTabella(event) {
    const tabella = document.querySelector('table');
    const img=document.querySelector('#ricarica_img');
    if (event.currentTarget.textContent.toLowerCase() === "elenco prenotazioni") {
        event.currentTarget.textContent = "CHIUDI ELENCO";
        tabella.classList.remove('hidden');
        img.classList.remove('hidden');
    } else {
        event.currentTarget.textContent = "ELENCO PRENOTAZIONI";
        tabella.classList.add('hidden');
        img.classList.add('hidden');
    }
}

document.querySelector('#ricarica_img').addEventListener('click', function () {
    const main = document.querySelector('#main');
    isRefresh = true;
    main.innerHTML = "";
    fetch("prenotazioni/ElencoPrenotazione").then(OnResponsePre).then(OnJsonPre);

})
