import Vuex from 'vuex'

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
		SELECT_FIRST(state){
			state.selected = 0
		},
		ADD_CONTENT(state, payload){
			state.contents.push(payload)
		}
	},
	actions: {
		fetch_contents({ commit }) {
			console.log('Executing "fetch_content"');
			commit('START_LOADING');
			axios
				.get(apiUrl)
				.then(result => {
					console.log('Get contents : Success!');
					let auxContents = [...result.data.data];
					commit('END_LOADING')
					commit('SET_CONTENTS',auxContents)
				})
				.catch(err => {
					console.log('Get contents : Failed!');
					console.log(err);
				});
		},
		insert_content({ commit }, payload){
			console.log('Executing "insert_content"');
			axios.post(apiUrl,payload)
			.then(result =>{
				console.log('Content creation Success!',result.data.data);
				commit('ADD_CONTENT',result.data.data)
			}).catch(err => {
				console.log('Content creation Failed!',err);
			});

		}

	}
});

export default store;