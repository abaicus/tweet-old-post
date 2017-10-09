/* global ropApiSettings */

import Vue from 'vue'
import Vuex from 'vuex'
import VueResource from 'vue-resource'

Vue.use( Vuex )
Vue.use( VueResource )

export default new Vuex.Store( {
	state: {
		page: {
			debug: true,
			logs: '### Here starts the log \n\n',
			view: 'accounts'
		},
		auth_in_progress: false,
		displayTabs: [
			{
				name: 'Accounts',
				slug: 'accounts',
				isActive: true
			},
			{
				name: 'General Settings',
				slug: 'settings',
				isActive: false
			},
			{
				name: 'Post Format',
				slug: 'post',
				isActive: false
			},
			{
				name: 'Custom Schedule',
				slug: 'schedule',
				isActive: false
			},
			{
				name: 'Logs',
				slug: 'logs',
				isActive: false
			}
		],
		availableServices: [],
		authenticatedServices: [],
		activeAccounts: []
	},
	getters: {
		getServices ( state ) {
			return state.availableServices
		},
		getActiveAccounts ( state ) {
			return state.activeAccounts
		}
	},
	mutations: {
		logMessage ( state, data ) {
			let message = data
			let type = ''

			if ( data.constructor === Array ) {
				message = data[0]
			}

			if ( data.length === 2 ) {
				type = data[1]
			}

			if ( type === '' || type === undefined ) {
				type = 'notice'
			}

			let status = '[' + type.toUpperCase() + ']'

			if ( state.page.debug === true ) {
				console.log( message )
			}
			message = status.concat( ' ' ).concat( message )
			state.page.logs = state.page.logs.concat( message + '\n' )
		},
		setTabView ( state, view ) {
			for ( var tab in state.displayTabs ) {
				state.displayTabs[tab].isActive = false
				if ( state.displayTabs[tab].slug === view ) {
					state.displayTabs[tab].isActive = true
					state.page.view = view
				}
			}
		},
		updateAuthProgress ( state, data ) {
			if ( state.auth_in_progress === true ) {
				state.auth_in_progress = false
			}
		},
		updateAvailableServices ( state, data ) {
			state.availableServices = data
		},
		updateAuthenticatedServices ( state, data ) {
			state.authenticatedServices = data
		},
		updateActiveAccounts ( state, data ) {
			state.activeAccounts = data
		}
	},
	actions: {
		fetchAvailableServices ( { commit } ) {
			Vue.http( {
				url: ropApiSettings.root,
				method: 'POST',
				headers: { 'X-WP-Nonce': ropApiSettings.nonce },
				params: { 'req': 'available_services' },
				responseType: 'json'
			} ).then( function ( response ) {
				commit( 'updateAvailableServices', response.data )
				commit( 'logMessage', ['Fetching available services.', 'success'] )
			}, function () {
				commit( 'logMessage', ['Error retrieving available services.', 'error'] )
			} )
		},
		getServiceSignInUrl ( { commit }, data ) {
			console.log( 'Recived', data )
			return new Promise( ( resolve, reject ) => {
				Vue.http( {
					url: ropApiSettings.root,
					method: 'POST',
					headers: {'X-WP-Nonce': ropApiSettings.nonce},
					params: {'req': 'service_sign_in_url'},
					body: data,
					responseType: 'json'
				} ).then( function ( response ) {
					resolve( response.data )
				}, function ( error ) {
					reject( error )
					commit( 'logMessage', ['Error retrieving active accounts.', 'error'] )
				} )
			} )
		},
		fetchAuthenticatedServices ( { commit } ) {
			Vue.http( {
				url: ropApiSettings.root,
				method: 'POST',
				headers: { 'X-WP-Nonce': ropApiSettings.nonce },
				params: { 'req': 'authenticated_services' },
				responseType: 'json'
			} ).then( function ( response ) {
				commit( 'updateAuthenticatedServices', response.data )
			}, function () {
				commit( 'logMessage', ['Error retrieving authenticated services.', 'error'] )
			} )
		},
		fetchActiveAccounts ( { commit } ) {
			Vue.http( {
				url: ropApiSettings.root,
				method: 'POST',
				headers: { 'X-WP-Nonce': ropApiSettings.nonce },
				params: { 'req': 'active_accounts' },
				responseType: 'json'
			} ).then( function ( response ) {
				commit( 'updateActiveAccounts', response.data )
			}, function () {
				commit( 'logMessage', ['Error retrieving active accounts.', 'error'] )
			} )
		},
		updateActiveAccounts ( { commit }, data ) {
			if ( data.action === 'update' ) {
				Vue.http( {
					url: ropApiSettings.root,
					method: 'POST',
					headers: { 'X-WP-Nonce': ropApiSettings.nonce },
					params: { 'req': 'update_accounts' },
					body: data,
					responseType: 'json'
				} ).then( function ( response ) {
					commit( 'updateActiveAccounts', response.data )
				}, function () {
					commit( 'logMessage', ['Error when trying to update active accounts.', 'error'] )
				} )
			} else if ( data.action === 'remove' ) {
				Vue.http( {
					url: ropApiSettings.root,
					method: 'POST',
					headers: { 'X-WP-Nonce': ropApiSettings.nonce },
					params: { 'req': 'remove_account' },
					body: data,
					responseType: 'json'
				} ).then( function ( response ) {
					commit( 'updateActiveAccounts', response.data )
				}, function () {
					commit( 'logMessage', ['Error when trying to remove and update active accounts.', 'error'] )
				} )
			} else {
				console.log( 'No valid action specified.' )
			}
		},
		authenticateService ( { commit }, data ) {
			Vue.http( {
				url: ropApiSettings.root,
				method: 'POST',
				headers: { 'X-WP-Nonce': ropApiSettings.nonce },
				params: { 'req': 'authenticate_service' },
				body: data,
				responseType: 'json'
			} ).then( function ( response ) {
				commit( 'updateAuthenticatedServices', response.data )
				commit( 'updateAuthProgress', false )
				commit( 'logMessage', ['Service authenticated: ' + data.service, 'success'] )
			}, function () {
				commit( 'logMessage', ['Error retrieving authenticated services.', 'error'] )
			} )
		},
		removeService ( { commit }, data ) {
			Vue.http( {
				url: ropApiSettings.root,
				method: 'POST',
				headers: { 'X-WP-Nonce': ropApiSettings.nonce },
				params: { 'req': 'remove_service' },
				body: data,
				responseType: 'json'
			} ).then( function ( response ) {
				console.log( response.data )
				commit( 'updateAuthenticatedServices', response.data )
			}, function () {
				commit( 'logMessage', ['Error when trying to remove and update authenticated services.', 'error'] )
			} )
		}
	}
} )
