class Token {


    //  isValid(token) {
    //     let payload = this.payload(token);
    //     if (payload) {
    //         return payload.iss == "http://localhost/api/auth/login" || "http://localhost/api/auth/signUp" ? true : false;
    //     }

    //     return false;
    // }

    // payload(token) {
    //     let tokenString = token ? token.split('.')[1]:'';
    //     return tokenString ? JSON.parse(atob(tokenString)): {sub:''} ;
    // }

}

export default Token = new Token();
