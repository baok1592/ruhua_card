<script>
	import https from './common/http/axios.js'
	import httpApi from './common/httpApi.js'
	import {
		XcxToken
	} from '@/common/xcx_token.js'
	import {
		WxToken
	} from '@/common/wx_token.js'

	var xcxtoken = new XcxToken();
	var wxtoken = new WxToken();

	export default {
	
		data() {
			return {
				code: "",
				cid: "",
				uid: "",
				
			}
		},
		onLaunch: async function() {
			// #ifdef MP-WEIXIN
			 await this.xcx() //小程序获取token 
			
			wx.showShareMenu();
			// #endif

			// #ifdef H5 
			//微信公众号获取token -必须是认证的服务号  
			wxtoken.verify('userinfo'); //静默获取openid	
			
			// #endif
		},
		onShow: function(options) {

		},
		methods: {
			xcx() {
				return new Promise((cback, reject) =>{
					const that = this;
					uni.login({
						provider: 'weixin'
					}).then(res => {
						var code = res[1].code;
						console.log('code:', code);
						https.post(httpApi.home.token, {
							code
						}).then(res => {
							wx.setStorageSync('token', res.data.token);
						})
					})
				})
			},
			
		},
		onHide: function() {

		}
	}
</script>

<style lang="scss">
	@import "uview-ui/index.scss";
	@import url('@/assets/styles/iconfont.css');
	@import url('@/common/bootstrap.min.css');
	/*每个页面公共css */
</style>
