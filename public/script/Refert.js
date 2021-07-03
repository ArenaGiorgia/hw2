fetch("referti/ShowReferti").then(OnResponseRef).then(OnJsonRef);
//TODO::farsi ritornare i referti di un certo paziente
function OnResponseRef(response)
{
    return response.json();
}
function OnJsonRef(json)
{
    console.log(json);
    const length = json.length;
    for (let i = 0; i < length; i++)
    {
        const main= document.querySelector("#main");
        const div= document.createElement("div");
        const img= document.createElement("img");
        const h2= document.createElement('h2');
        const p= document.createElement('p');
        const p1=document.createElement('p');
        const p2=document.createElement('p');
        const em=document.createElement('em');
        const em1=document.createElement('em');
        const em2=document.createElement('em');
        const link=document.createElement('a');
        h2.textContent=json[i].tipologia;
        h2.classList.add('tit_es');
        img.src="img/stethoscope-icon-2316460_960_720.png";
        img.classList.add("icona");
        em.textContent="Eseguito da : ";
        em.classList.add("em");
        em1.textContent="In data : ";
        em1.classList.add("em");
        em2.textContent="Esito : ";
        em2.classList.add("em");
        p.textContent=json[i].personale_medico;
        p1.textContent=json[i].data_effettuata;
        p2.textContent=json[i].descrizione;
        link.appendChild(p);
        link.classList.add('pointer');
        link.href="http://localhost/hw2/public/chisiamo";
        div.appendChild(img);
        div.appendChild(h2);
        div.appendChild(em);
        div.appendChild(link);
        div.appendChild(em1);
        div.appendChild(p1);
        div.appendChild(em2);
        div.appendChild(p2);

        main.appendChild(div);


    }

}
