import {Api_url} from './config'
import Vue from 'vue'
import  https from './http/axios.js'

class XcxToken {
	constructor() {
		this.tokenUrl = Api_url + 'auth/get_xcx_token';
		this.verifyUrl = Api_url + 'auth/token_verify';
		this.getInfo = Api_url + 'user/info';
	}
	
	async _getinfo(){
		let Switch = uni.getStorageSync('switch')
		console.log(Switch)
		if(Switch.login_mode == '1'){
			await http.get('/user/info').then(res=>{
				if(res.data.code == 2 || res.data.code == 1 ){
					uni.setStorageSync('user_mode',res.data)
				}
			})
		}else{
			uni.removeStorageSync('user_mode')
		}
		
	}
	//初始化登陆
	async verify() {  
		console.log('开始获取token')
		var that = this;
		var token = uni.getStorageSync('token'); //获取缓存
		if (!token) {
			//向微信api拿code，再向tp的api拿token
			await this.getTokenFromServer();
		} else {
			await this._veirfyFromServer(token); //验证token是否过期，过期调用.getTokenFromServer函数获取
		}
	}
	//验证token
	_veirfyFromServer(token) {
		var that = this;
		uni.request({
			url: that.verifyUrl,
			method: 'POST',
			data: {
				token: token
			},
			success: function(res) {
				var valid = res.data.isValid;
				if (!valid) {
					that.getTokenFromServer();
				}
			}
		})
	}
	//获取Token
	async getTokenFromServer() {
		var that = this;
		console.log('x1')
		await uni.login({
			provider: 'weixin',
			success: function(res) {
				console.log('login:',res)
				uni.request({
					url: that.tokenUrl,
					method: 'POST',
					data: {
						code: res.code
					},
					success: function(res) {
						console.log('x2',res)
						uni.setStorageSync('token', res.data.token);
						that._getinfo()
					}
				})
			}
		})
	}
}
export {
	XcxToken
};


