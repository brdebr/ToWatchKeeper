import Vuex from 'vuex'
import { ContentsEventsBus } from '../components/Contents/ContentsEventsBus';

let apiUrl = 'http://localhost:8000/api/contents';

const store = new Vuex.Store({
	state: {
		contents: [],
		loading: false,
		selected: 0,
	},
	getters: {
		contents: state => state.contents,
		loading: state => state.loading,
		selected: state => state.selected,
	},
	mutations: {
		SET_CONTENTS(state, payload) {
			state.contents = payload
		},
		START_LOADING(state) {
			state.loading = true
		},
		END_LOADING(state){
			state.loading = false
		},
		ADD_CONTENT(state, payload){
			state.contents.push(payload)
		},
		DELETE_CONTENT(state, payload){
			state.contents.find((el, index )=> {
				if(payload === el.id){
					state.contents.splice(index,1)
					return el.id;
				}
			})
		}
	},
	actions: {
		fetch_contents({ commit }) {
			console.log('Executing "fetch_content" from VUEX!');
			commit('START_LOADING');
			axios
				.get(apiUrl)
				.then(result => {
					console.log('Get contents : Success!');
					let auxContents = [...result.data.data];
					commit('END_LOADING')
					commit('SET_CONTENTS',auxContents)
					ContentsEventsBus.displayContent(auxContents[0]);
				})
				.catch(err => {
					console.log('Get contents : Failed!');
					console.log(err);
				});
		},
		insert_content({ commit }, payload){
			console.log('Executing "insert_content" from VUEX!');
			axios.post(apiUrl,payload)
			.then(result =>{
				console.log('Content creation Success!',result.data.data);
				commit('ADD_CONTENT',result.data.data)
				ContentsEventsBus.clearCreate(result.data.data);
				ContentsEventsBus.displayContent(result.data.data);
			}).catch(err => {
				console.log('Content creation Failed!',err);
			});
			
		},
		delete_content({ commit },payload){
			console.log('Executing "delete_content" from VUEX!');
			console.log('apiUrl + payload',apiUrl + payload);
			axios
			.delete(apiUrl +"/"+ payload)
			.then(result => {
			  console.log('Content deleted : Success!');
			  console.log(result.data);
			  commit('DELETE_CONTENT',payload)
			  ContentsEventsBus.displayContent(this.state.contents[0]);
			})
			.catch(err => {
			  console.log('Content deleted : Failed!');
			  console.log(err);
			});
		}

	}
});

export default store;