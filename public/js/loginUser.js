import {Crud} from './crud.js';
function clearForm({
    us,
    pass,
}){
    us.value = "";
    pass.value = "";
}
const btnLogin = document.querySelector('.login');

btnLogin.addEventListener('click',()=>{
    const username = document.querySelector('#username');
    const password = document.querySelector('#password');
    const User = {
        username:username.value,
        password:password.value,
    };
    Crud.validateLogin(User);
    clearForm({
        us:username,
        pass:password,
    });
});


