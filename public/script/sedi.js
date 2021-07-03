fetch("sedi/ShowSedi").then(OnSediRes).then(OnJsonRes);

function OnSediRes(response) {

    return response.json();
}

function OnJsonRes(json) {
    console.log(json);
    const length = json.length;
    for (let i = 0; i < length; i++) {
        const main = document.querySelector("#main");
        const div = document.createElement("div");
        const h2 = document.createElement('h2');
        const img = document.createElement('img');
        const em = document.createElement('em');
        const a = document.createElement('a');

        h2.textContent = json[i].nome;
        h2.classList.add('sed');
        img.src = json[i].immlab;
        img.classList.add('immagini_principali');
        em.textContent ="Sede" + ":" +json[i].sede;
        em.classList.add('em');
        a.textContent = "INFO";
        a.classList.add('info');
        a.classList.add('pointer');

        div.appendChild(h2);
        div.appendChild(img);
        div.appendChild(em);
        div.appendChild(a);

        main.appendChild(div);
        a.addEventListener('click', ShowInfo);
    }
}


function ShowInfo(event) {
    const titolo = event.currentTarget.parentNode.children;
    console.log(titolo)

    if (titolo.item(0).textContent.toLowerCase() === "biolab") {
        event.currentTarget.target = "_blank";
        event.currentTarget.href = "https://www.google.it/maps/place/Via+Plebiscito,+Catania+CT/@37.5052588,15.0752591,18z/data=!4m5!3m4!1s0x1313e32851de2039:0xe270acf9c1acef4a!8m2!3d37.5049439!4d15.0775604";

    }
    if (titolo.item(0).textContent.toLowerCase() === "labtech") {
        event.currentTarget.target = "_blank";
        event.currentTarget.href = "https://www.google.it/maps/place/97100+Ragusa+RG/@36.9286831,14.685633,16z/data=!4m5!3m4!1s0x131199adbb2e54a9:0x27e898810ccef3ad!8m2!3d36.9269273!4d14.7255129";

    }
    if (titolo.item(0).textContent.toLowerCase() === "molecularlab") {
        event.currentTarget.target = "_blank";
        event.currentTarget.href = "https://www.google.com/maps/place/Messina+Centrale/@38.185457,15.5588333,17z/data=!3m1!4b1!4m5!3m4!1s0x13144e70acc0136f:0xce58fb183786559b!8m2!3d38.185457!4d15.561022";

    }
    if (titolo.item(0).textContent.toLowerCase() === "cliniclab") {
        event.currentTarget.target = "_blank";
        event.currentTarget.href = "https://www.google.com/maps/place/Palermo+PA/@38.1890095,13.3193062,15z/data=!4m5!3m4!1s0x1319e8c9814ed099:0xa0b042c233bd880!8m2!3d38.11569!4d13.3614868";

    }
}
