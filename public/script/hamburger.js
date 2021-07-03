function showmenu(event){

    const div= document.createElement('div');
    document.body.classList.add('no_scroll');
    const link= document.querySelectorAll('#menu a');
    const modal= document.querySelector('#modal');
    const logout=document.querySelector('#logout');
    modal.classList.remove('hidden');
    for(let alink of link)
    {
        div.appendChild(alink);
    }
    div.appendChild(logout);
    modal.appendChild(div);
}

function nascondimenu(event){
    const modal= document.querySelector('#modal');
    const menu=document.querySelector('#menu');
    const nav=document.querySelector('nav');
    const link= document.querySelectorAll('#modal div a');
    const logout=document.querySelector('#logout');
    document.body.classList.remove('no_scroll');
    modal.classList.add('hidden');
    for(let alink of link)
    {
        menu.appendChild(alink);
    }

    nav.appendChild(logout);
    modal.innerHTML="";


}


document.querySelector("#menutendina").addEventListener('click',showmenu);
document.querySelector("#modal").addEventListener('click',nascondimenu);