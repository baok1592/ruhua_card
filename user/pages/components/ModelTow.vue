<template>
	<view class="top">
		<view class="demo" v-if="teamp==1 || cid > 0">
			<view @click="handleColleague(c_id)" class="one">
				<view class="tow">
					<b>&#xe632;</b>
				</view>
			</view>
			<view @click="handlePhone(c_id)" class="one">
				<view class="tow"><b>&#xe608;</b></view>
			</view>
		</view>
		<view class="top-one">
			<view class="mode1">
				<button open-type='share' class="mode1-left size">分享名片</button>
			</view>
			<view class="mode1">
				<button v-if="cid<=0 " open-type="getPhoneNumber" @getphonenumber="bind"
					class="mode1-left size">联系我</button>
				<button v-else class="mode1-left size" @click="bind2">联系我</button>
			</view>
		</view>
	</view>
	</view>
</template>

<script>
	import WXBizDataCrypt from '@/common/WXBizDataCrypt.js'
	import https from '@/common/http/axios.js'
	import httpApi from '@/common/httpApi.js'
	export default {
		props: ['c_id'],
		data() {
			return {
				bleam: "",
				cid: "",
				teamp: "",
				phone: ""
			}
		},
		mounted() {

			// #ifdef MP-WEIXIN

			this.istoken()

			// #endif
			
		},
		methods: {
			istoken(){
				let token = uni.getStorageSync("token")
				if (token) {
					// #ifdef MP-WEIXIN
					
					
					this.get_user_info()
					// #endif
					
				}else {
					this.xcx()
				}
			},
			get_user_info() {
				
					this.$http.get(this.$api.home.UserInfo).then(res => {
						console.log()
						this.cid = res.data['c_id'];
						this.phone = res.data['u_phone']
					})
			
			},
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
						this.get_user_info()
					})
					
				})
			},
			handlePhone(id) {
				uni.navigateTo({
					url: "/pages/index/PhoneList/PhoneList?id=" + id
				})
				this.$forceUpdate();
			},
			handleColleague(id) {
				uni.navigateTo({
					url: "/pages/index/ModifyColleague/ModifyColleague?id=" + id
				})
			},
			bind(e) {

				let obj = {}
				obj.encryptedData = e.detail.encryptedData
				obj.iv = e.detail.iv
				obj.ccid = this.c_id
				this.obj = obj

				//然后在第三方服务端结合 session_key 以及 app_id 进行解密获取手机号
				this.$http.post(this.$api.home.getPone, obj).then(res => {
					this.teamp = res.data
					this.$forceUpdate();
				})
			},
			bind2() {
				uni.showToast({
					title: '您已经联系过了',
					icon: 'success'
				})
				console.log(this.phone)

			},
		},
	}
</script>

<style lang="scss" scoped>
	.demo {
		position: fixed;
		bottom: 50px;
		z-index: 200;
		right: 0;
		padding: 5px;
	}

	.top {
		display: flex;
		justify-content: center;
		align-items: center;
		height: 50px;
	}

	.top-one {
		margin-left: 10px;
		width: 100%;
		display: flex;
		justify-content: space-around;
		align-items: center;
	}

	.mode1 {
		display: flex;
		justify-content: center;
		align-items: center;
		margin-right: 10px;
		width: 25VM;
		height: 100%;
	}

	.mode1-left {
		display: flex;
		justify-content: center;
		align-items: center;
		border: 2px solid $bgcolro;
		border-radius: 5px;
		height: 40px;
		width: 150px;
	}

	.size {
		font-size: 18px;
		color: $bgcolro;
	}

	.mode1-rigt {
		display: flex;
		justify-content: center;
		align-items: center;
		background-color: $bgcolro;
		border-radius: 5px;
		height: 40px;
		width: 150px;
	}

	.size1 {
		font-size: 15px;
		color: #ffffff;
	}

	.one {
		display: flex;
		align-items: center;
		justify-content: center;
		margin-top: 10px;
		height: 50px;
		width: 50px;
		border-radius: 50%;
		border: 13px solid $bgcolro;
	}

	.tow {
		display: flex;
		align-items: center;
		justify-content: center;
		border-radius: 50%;
		width: 25px;
		height: 25px;
		background-color: #ffffff;
		font-size: 15px;
		color: #000000;
	}
</style>
