<template>
	<view class="top">

		
			<view class="models">

				<view class="demo1" @click="get_colleague_phone(collegue_id)">
					<text class="one">&#xe62a;</text>
					<b class="font-size">打电话</b>
					
				</view>
				<view class="demo2	">
					<b class="view">|</b>
				</view>
				<view class="demo1	">
					<u-modal v-model="show">
						<u-gap height="40" bgColor="#ffffff"></u-gap>
							<img class="img" :src="wxurl" />
							<u-gap height="40" bgColor="#ffffff"></u-gap>
							<view style="margin:0auto;">扫一扫加微信</view>
							<u-gap height="40" bgColor="#ffffff"></u-gap>
					</u-modal>
				</view>
				
				<view class="demo1" @click="get_wx(collegue_id)">
					<text class="one">&#xe605;</text>
					<b class="font-size">加微信</b>
					
				</view>
				
				
			</view>
		

	</view>
</template>

<script>
	export default {
		data() {
			return {
				show:false,
				phone: "",
				id: "",
				wxurl: ""
			}
		},
		
		onLoad() {
			this.get_colleague_phone(collegue_id);
			this.viewMapLocation(longitude, latitude, address);
		},
		props: ['collegue_id', 'sys_data'],
		methods: {
			get_colleague_phone(id) {
				this.$http.get(this.$api.home.get_colleague + id).then(res => {
					this.wxurl = res.data.wechart_eurl
					
					uni.makePhoneCall({
						phoneNumber: res.data.c_phone
					})
				})
			},
			get_wx(id) {
				this.$http.get(this.$api.home.get_colleague + id).then(res => {
					this.wxurl = res.data.wechart_eurl
					this.show=true;
				})
			},
			
			viewMapLocation(longitude, latitude, address) {
				let longitud = Number(longitude);
				let latitud = Number(latitude);
				// 获取定位信息
				uni.getLocation({
					type: 'wgs84', //返回可以用于uni.openLocation的经纬度
					// 用户允许获取定位
					success: function(res) {
						console.log(res, '经纬度')
						if (res.errMsg == "getLocation:ok") {
							console.log(latitud)
							console.log(longitud)
							uni.openLocation({
								// 传入你要去的纬度
								latitude: latitud,
								// 传入你要去的经度
								longitude: longitud,
								// 传入你要去的地址信息 不填则为空
								address: address,
								// 缩放大小
								scale: 18,
								success: function() {
									console.log('success');
								}
							});
						}
					},
					// 用户拒绝获取定位后 再次点击触发
					fail: function(res) {
						console.log(res)
						if (res.errMsg == "getLocation:fail auth deny") {
							uni.showModal({
								content: '检测到您没打开获取信息功能权限，是否去设置打开？',
								confirmText: "确认",
								cancelText: '取消',
								success: (res) => {
									if (res.confirm) {
										uni.openSetting({
											success: (res) => {
												console.log('确定');
											}
										})
									} else {
										console.log('取消');
										return false;
									}
								}
							})
						}
					}
				});

			}
		}
	}
</script>

<style scoped>
	.top {
		display: flex;
		justify-content: center;
		align-items: center;
		height: 50px;
	}

	.demo {
		width: 100%;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.demo2 {
		display: flex;
		align-items: center;
		width: 6%;
		
	}

	.models {
		display: flex;
		width: 95%;
		justify-content: center;
		
	}

	.demo1 {
		display: flex;
		width: 42%;
		justify-content: center;
		text-align: center;
		
	}

	.font-size {
		
		margin-left: 3px;
		width: 60px;

	}

	.view {
		font-size: 15px;
		margin-left: 15px;
	}

	.one {
		width: 40px;
		font-size: 20px;
		margin-left: 5px;
	}
	
	img{
		
		width: 200px;
		height: 200px;
	}

	.tow {
		font-size: 20px;
	}
</style>
