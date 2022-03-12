class Crud{
    static async createUser(UserData){
        try{
            const response = await fetch('http://127.0.0.1:8000/api/users/',{
                method:'POST',
                body: "data="+JSON.stringify(UserData),
                headers: {
                    'Content-Type': 'application/json',
                    'Content-Type': 'application/x-www-form-urlencoded',
                  },
                });
                const serverReponse = JSON.parse(await response.text());
                alert(serverReponse.message);
        }catch (err){
            console.log('fetch failed', err);
        }
        
    }

    static async validateLogin(User){
        try{
            const response = await fetch('http://127.0.0.1:8000/api/users/validate',{
                method:'POST',
                body: "data="+JSON.stringify(User),
                headers: {
                    'Content-Type': 'application/json',
                    'Content-Type': 'application/x-www-form-urlencoded',
                  },
                });
                const serverReponse = JSON.parse(await response.text());
                alert(serverReponse.message);
                if(serverReponse.success){
                    location.href = serverReponse.url;
                }
        }catch (err){
            console.log('fetch failed', err);
        }
    }

    static async readUsers(){
        try{
            const response = await fetch('http://127.0.0.1:8000/api/users/',{
                method:'GET',
            });
            const data = JSON.parse(await response.text());
            
            return data;
        
            
        }catch(err){
            console.log('fetch failed', err);
        }
        
    }

    static async updateUser(user){
        try{
            const response = await fetch(`http://127.0.0.1:8000/api/users/${user.id}`,{
                method:'PUT',
                body: "data="+JSON.stringify(user),
                headers: {
                    'Content-Type': 'application/json',
                    'Content-Type': 'application/x-www-form-urlencoded',
                  },
                });
               const serverReponse = JSON.parse(await response.text());
               alert(serverReponse.message);
                
        }catch (err){
            console.log('fetch failed', err);
        }
    }

    static async deleteUser(id){
        try{
            const response = await fetch(`http://127.0.0.1:8000/api/users/${id}`,{
                method:'DELETE',
            });
            const serverReponse = JSON.parse(await response.text());
            console.log(serverReponse);
        
            
        }catch(err){
            console.log('fetch failed', err);
        }
    }
}

export {Crud};


