class Storage{

    setToken(token){
        localStorage.setItem('token', token);
    }

    setUser(user){
        localStorage.setItem('user', user);
    }

    setUserId(id){
        localStorage.setItem('id', id);
    }

    store(user,token){
        this.setToken(token);
        this.setUser(user);
    }

    clear(){
        localStorage.clear();
    }

    getToken(){
        return localStorage.getItem('token');
    }

    getUser(){
        return localStorage.getItem('user');
    }

    getUserId(){
        return localStorage.getItem('id');
    }


}

export default Storage = new Storage();
