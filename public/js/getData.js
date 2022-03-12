
import {Crud} from './crud.js';


function renderData(){
    Crud.readUsers()
        .then(users=>{
            let tbody = document.querySelector('.body');
            tbody.innerHTML="";
            let body="";
          
            users.forEach((user, i) => {
                body+=`<tr id="${i +1}">
                <td>${i +1}</td><td>${user.username}</td>
                <td>${user.email}</td>
                <td>${user.rol}</td>
                <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-primary btn-sm edit" data-id="${user.id}">
                        <i class="fa-solid fa-pencil"></i>
                    </button>
                    <button type="button" class="btn btn-primary delete" data-id="${user.id}">
                         <i class="fa-solid fa-trash "></i>
                    </button>
                    <button type="button" class="btn btn-primary view" data-id="${user.id}">
                        <i class="fa-solid fa-eye"></i>
                    </button>
                </div>
             
                </td></tr>`
            });
            tbody.innerHTML=body;
            initDelete();
            initEdit(users);
            seeMore(users);
        })
}

function initDelete(){
    const btns = document.querySelectorAll('.delete');
            btns.forEach(btn =>{
                btn.addEventListener('click',()=>{
                    const id = btn.getAttribute('data-id');
                    Crud.deleteUser(id);
                    renderData();
                });
            });
}

function initEdit(users){
    const btns = document.querySelectorAll('.edit');
    btns.forEach(btn =>{
        btn.addEventListener('click',()=>{
            btn.setAttribute("data-bs-toggle","modal");
            btn.setAttribute("data-bs-target","#edit");
            const id = btn.getAttribute('data-id');
            const us = document.querySelector('#usernameEd');
            const em = document.querySelector('#emailEd');
            const rol = document.querySelector('#rolEd');
            const aux = users.find(user=>user.id ==id);
            us.value = aux.username;
            em.value = aux.email;
            if(aux.rol==='administrator'){
                rol.selectedIndex = 1;
            }else if(aux.rol==='guest'){
                rol.selectedIndex = 2;
            }
            const updateBtn = document.querySelector('#updateBtn');
            updateBtn.addEventListener('click',()=>{
                const username = document.querySelector('#usernameEd');
                const rol = document.querySelector('#rolEd');
                const email = document.querySelector('#emailEd');
                aux.username = username.value;
                aux.rol = rol.value;
                aux.email = email.value;
                const regex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
                if(regex.test(aux.email)){
                    Crud.updateUser(aux);
                    renderData();
                }else{
                    alert("El correo ingresado no es valido");
                }
                
                
                
            });
            
            
        });
    });
}

function seeMore(users){
    const btns = document.querySelectorAll('.view');
    btns.forEach(btn =>{
        btn.addEventListener('click',()=>{
            btn.setAttribute("data-bs-toggle","modal");
            btn.setAttribute("data-bs-target","#see");
            const id = btn.getAttribute('data-id');
            const us = document.querySelector('#username1');
            const em = document.querySelector('#email1');
            const rol = document.querySelector('#rol1');
            const st = document.querySelector('#status');
            const create = document.querySelector('#created');
            const update = document.querySelector('#updated');
            const aux = users.find(user=>user.id ==id);
            us.value = aux.username;
            em.value = aux.email;
            create.value = aux.created_at;
            update.value = aux.updated_at;
            if(aux.rol==='administrator'){
                rol.selectedIndex = 1;
            }else if(aux.rol==='guest'){
                rol.selectedIndex = 2;
            }
            if(aux.status==='A'){
                st.selectedIndex = 1;
            }else if(aux.status==='I'){
                st.selectedIndex = 2;
            }
            
            
        });
    });
}




export {renderData};