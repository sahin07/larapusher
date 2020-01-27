import Token from './Token';
import Storage from './Storage'


class User {

    async login(data) {
        return new Promise((resolve,reject)=>{
            axios.post('/api/auth/login', data)
            .then((res) => {
                resolve(res.data);
            })
            .catch((err) => {
                reject(err);
            })
        });

    }

    responseAfterLogin(res) {
        let accessToken = res.access_token;
        let UserName = res.user;
        let userId = res.userID;
        Storage.setToken(accessToken);
        Storage.setUser(UserName);
        Storage.setUserId(userId);

    }


    hasToken() {
        let payload = Storage.getToken();
        if (payload) {
            return payload ? true : false;
        }
        return false;
    }

    isLoggedIn() {
        return this.hasToken();
    }

    getName(){
        return Storage.getUser();
    }

    logOut(){
        Storage.clear();
    }

    id(){
       return Storage.getUserId();
    }

}

export default User = new User();
