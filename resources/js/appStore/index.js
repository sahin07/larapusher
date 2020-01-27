
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
            }
    },
    actions:{

        login(context,payload){
            context.commit('login',payload);
        },

    },
    mutations:{
        login(state,payload){

            User.responseAfterLogin(payload);
            state.isLoggedIn=true;
            state.token = payload.access_token;
            state.username= payload.user;
            state.UserId=payload.userID;

        },

        deleteQuestion(state,slug){
            return new Promise((res,rej)=>{
                axios.delete(`/api/question/${slug}`,{
                    headers:{
                        Authorization:`Bearer ${state.token}`
                    }
                })
                .then((res)=>{
                   return res('succesfully Deleted');
                }).catch((err)=>{
                    return res(err)
                });
            })
        }

    }

}


