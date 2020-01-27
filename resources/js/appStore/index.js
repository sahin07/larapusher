
import Store from './../Helper/Storage'
import User from './../Helper/User'



export default {

    state:{
       token:Store.getToken(),
       username:User.getName(),
       isLoggedIn:User.isLoggedIn(),
       UserId:User.id()
    },
    getters:{
            getUserId(){
                return state.userID
            },
            getToken(sate){
                return state.token
            }
    },
    actions:{

        login(context,payload){
            context.commit('login',payload);
        },

        deleteQuestion({ commit, state },slug){
            return new Promise((resolve,reject)=>{
                axios.delete(`/api/question/${slug}`,{
                    headers:{
                        Authorization:`Bearer ${state.token}`
                    }
                })
                .then((res)=>{
                    resolve('succesfully Deleted');
                }).catch((err)=>{
                     reject(err);
                });
            })
        }

    },
    mutations:{
        login(state,payload){

            User.responseAfterLogin(payload);
            state.isLoggedIn=true;
            state.token = payload.access_token;
            state.username= payload.user;
            state.UserId=payload.userID;

        },



    }

}


