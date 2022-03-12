import {Crud} from './crud.js';
import {renderData} from './getData.js';
const btn = document.querySelector('#submitData');

function clearForm({
    us,
    pass,
    rol,
    email,
}){
    us.value = "";
    pass.value = "";
    rol.selectedIndex = 0;
    email.value = "";
}

btn.addEventListener('click',()=>{
    const username = document.querySelector('#username');
    const password = document.querySelector('#password');
    const rol = document.querySelector('#cmbRol');
    const email = document.querySelector('#email');
    const regex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    if (username.value == '' || password.value == ''|| rol.value == '' || email.value == ''){
        alert("Los campos no pueden estar vacios");
    }else if(!regex.test(email.value)){
        alert("Correo no valido");
    }else{
        const UserData = {
            username:username.value,
            password:password.value,
            rol:rol.value,
            email:email.value,
            status:'A',
        }
        Crud.createUser(UserData);
        clearForm({
            us:username,
            pass:password,
            rol:rol,
            email:email,
        });
            renderData();
            
        }
});
