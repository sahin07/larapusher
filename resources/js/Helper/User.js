import Token from './Token';
import Storage from './Storage'

class User {

    login(data) {
        axios.post('/api/auth/login', data)
            .then((res) => {
                this.responseAfterLogin(res);
            })
            .catch((err) => {
                console.log(err.response);
            })
    }

    responseAfterLogin(res) {
        let accessToken = res.data.access_token;
        let UserName = res.data.user;
        if (Token.isValid(accessToken)) {
            Storage.setToken(accessToken);
            Storage.setUser(UserName);
        }
    }


    hasToken() {
        let payload = Storage.getToken();
        if (payload) {
            return Token.isValid(payload) ? true : false;
        }
        return false;
    }

    isLoggedIn() {
        return this.hasToken();
    }

    getName(){
        return Storage.getUser();
    }

    id(){
        let payload = Storage.getToken();
        let token = Token.payload(payload);
        return token.sub;
    }

}

export default User = new User();
